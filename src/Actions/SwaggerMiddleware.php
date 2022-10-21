<?php

namespace App\Actions;

use App\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class SwaggerMiddleware extends Action
{
    

    /**
     * Handle swagger requests
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * 
     * @return ResponseInterface
     */
    public function handle(
        Request $request,
        Response $response,
    ) {
        return $this->view->render($response, '/swagger.php');
    }

    public function schema(Request $request, Response $response): Response
    {

        $newResponse = $response->withHeader('Content-Type', 'application/x-yaml');
        $newResponse->getBody()->write(file_get_contents(PUBLIC_PATH . '/openapi.yaml'));

        return $newResponse;
    }
}