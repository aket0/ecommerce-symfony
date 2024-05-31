<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        // Retourne un rendu de vue, par exemple index.html.twig
        return $this->render('index.html.twig');
    }

    #[Route('/header', name: 'header')]
    public function header(): Response
    {
        // Retourne un rendu de vue, par exemple header.html.twig
        return $this->render('header.html.twig');
    }
}
