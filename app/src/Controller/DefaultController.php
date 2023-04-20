<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/app/{slug?}', name: 'app')]
    public function app(): Response
    {
        return $this->render('app.html.twig');
    }

    #[Route("api/helloworld/{name}", name="api_helloworld")]
    public function apiHelloWorld(string $name): Response
    {
        return new JsonResponse('hello' . $name)
    }
}
