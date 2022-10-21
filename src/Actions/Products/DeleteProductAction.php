<?php

namespace App\Actions\Products;

use App\Actions\Action;
use App\Entities\Product;
use App\Entities\ProductRepository;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class DeleteProductAction extends Action
{
    protected $productRepository;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        /**
         * @var ProductRepository
         */
        $this->productRepository = $this->entityManager
            ->getRepository(Product::class);
    }

    /**
     * @OA\Delete(
     *     path="/v1/deleteProduct/{Id}",
     *     tags={"products"},
     *     summary="Delete product",
     *     description="delete the product with the entered id",
     *     operationId="deleteProduct",
     *     @OA\Parameter(
     *         name="Id",
     *         in="path",
     *         description="The Id product that needs to be deleted",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid Id product supplied",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found",
     *     )
     * )
     */
    public function __invoke(Request $request, Response $response, $id): Response
    {
        /**
         * Product domain
         * 
         * @var \App\Entities\Product
         */
        $this->productRepository->destroy($id);

        $response->getBody()->write("Product deleted succesfully");

        return $response;
    }
}
