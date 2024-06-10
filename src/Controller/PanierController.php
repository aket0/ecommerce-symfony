<?php

namespace App\Controller;

use App\Repository\ProduitRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PanierController extends AbstractController
{

   
    #[Route('/panier', name: 'app_panier', methods: ['GET'])]
    public function index(SessionInterface $session, ProduitRepository $produitRepository): Response
    {
        $panier = $session -> get('panier',[]);
        //  dd($panier);
        // $panier = $session->get( 'panier', []);
        $panierWithData= [];
        $total=0;
        foreach( $panier as $id=>$quantity ){
            $produit = $produitRepository->find($id);
            $panierWithData[] = [
                'produit' => $produit,
                'quantity' =>$quantity
            ];
            $total += $produit->getPrix() * $quantity;
        }


        // dd($panierWithData);
       
        return $this->render('panier/index.html.twig', [
            'items'=>$panierWithData,
            'total'=>$total
        ]);
    }

    #[Route('/panier/add/{id}', name: 'app_panier_new', methods: ['GET'])]
    public function addToPanier(int $id, SessionInterface $session): Response
    {

        $panier = $session->get('panier',[]);
        if(!empty($panier[$id])){
            $panier[$id]++;

        }else{
            $panier[$id]=1;
        }
        $session ->set('panier', $panier);

        return $this->redirectToRoute('app_panier');
    }

    #[Route('/panier/remove/{id}', name: 'app_panier_produit_remove', methods: ['GET'])]
    public function removeToPanier($id, SessionInterface $session): Response
    {

    $panier = $session -> get('panier',[]);
    if(!empty($panier[$id])){
        if($panier[$id] > 1){
            $panier[$id]--;
        }
        else{
            unset($panier[$id]);
        }
    }
    $session->set('panier', $panier);
    return $this->redirectToRoute('app_panier');
    }

    #[Route('/panier/delete/{id}', name: 'app_panier_produit_delete', methods: ['GET'])]
    public function deletePanier($id, SessionInterface $session): Response
    {

    $panier = $session -> get('panier',[]);
    if(!empty($panier[$id])){
        unset($panier[$id]);
    }
    $session->set('panier', $panier);
    return $this->redirectToRoute('app_panier');
    }


    #[Route('/panier/remove', name: 'app_panier_remove', methods: ['GET'])]
    public function removePanier(SessionInterface $session): Response
    {

    $session->set('panier', []);
    return $this->redirectToRoute('app_panier');
    }
}
