<?php

namespace App\Controller;
use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home', methods: ['GET'])]
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'produits' => $produitRepository->findAll(),
        ]);
    }

    #[Route('/home/produit/{id}/show', name: 'app_home_produit_show', methods: ['GET'])]
    public function show(Produit $produit): Response
    {
        return $this->render('home/show.html.twig', [
            'produit' => $produit
        ]);
    }
}
