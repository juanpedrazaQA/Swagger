<?php

namespace App\Actions\Products;

use App\Actions\Action;
use App\Entities\Product;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class GetProductBySlugAction extends Action
{
    protected $productRepository;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        /**
         * @var \App\Entities\ProductRepository
         */
        $this->productRepository = $this->entityManager
            ->getRepository(Product::class);
    }

     /**
     * @OA\Get(
     *     path="/v1/products/{slug}",
     *     tags={"products"},
     *     summary="Find product by slug",
     *     description="Returns a single product",
     *     operationId="getProductBySlug",
     *     @OA\Parameter(
     *         name="slug",
     *         in="path",
     *         description="slug of product to return",
     *         required=true,
     *         @OA\Schema(
     *             type="string",      
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Product"),
     *         
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid slug supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found"
     *     )
     * )
     *
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request  RequestInterface
     * @param \Psr\Http\Message\ResponseInterface      $response ResponseInterface
     * 
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke(Request $request, Response $response, $slug): Response
    {
        /**
         * Product domain
         * 
         * @var \App\Entities\Product
         */
        $product = $this->productRepository->getBySlug($slug);

        $response->getBody()->write($product->toJSON());

        return $response
            ->withHeader('Content-Type', 'application/json');
    }
}
