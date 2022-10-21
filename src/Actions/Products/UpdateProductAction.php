<?php


namespace App\Actions\Products;

use App\Actions\Action;
use App\Entities\Product;
use App\Entities\ProductRepository;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UpdateProductAction extends Action
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
     * @OA\Put(
     *     path="/v1/updateProduct/{Id}",
     *     tags={"products"},
     *     summary="Updated product",
     *     description="update a product by id",
     *     operationId="updateProduct",
     *     @OA\Parameter(
     *         name="Id",
     *         in="path",
     *         description="Id product that to be updated",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid Id product supplied"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found"
     *     ),
     *     @OA\RequestBody(
     *         description="Updated product object",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     )
     * )
     */
    public function __invoke(Request $request, Response $response, $id): Response
    {
        $data = $request->getParsedBody();

        $this->productRepository->update($id, $data);

        $response->getBody()->write("Product update succesfully");

        return $response
            ->withHeader('Content-Type', 'application/json');
    }
}
