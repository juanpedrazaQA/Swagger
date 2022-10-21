<?php


namespace App\Actions\Products;

use App\Actions\Action;
use App\Entities\Product;
use App\Entities\ProductRepository;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CreateProductAction extends Action
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
     * @OA\Post(
     *     path="/v1/createProduct",
     *     tags={"products"},
     *     summary="Create product",
     *     description="generate a new product",
     *     operationId="createProduct",
     *     @OA\Response(
     *         response="200",
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     ),
     *     @OA\RequestBody(
     *         description="Create product object",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     )
     * )
     */
    public function __invoke(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();

        $this->productRepository->create($data);

        $response->getBody()->write("Product created succesfully");

        return $response
            ->withHeader('Content-Type', 'application/json');
    }
}
