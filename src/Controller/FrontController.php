<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Publication;
use App\Repository\PublicationRepository;

class FrontController extends AbstractController
{
    #[Route('/front/index', name: 'index')]
    public function index(PublicationRepository $repository)
    {
        // $em = $this->getDoctrine()->getManager();
        // $rep = $em->getRepository(Publication::class);
        $publicationsMax6 = $repository->produitMax6();
        $vars = ['publicationsMax6' => $publicationsMax6];
        return $this->render('front/index.html.twig', $vars);
    }
    #[Route('/front/produits', name: 'produits')]
    public function produits(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository(Publication::class);
        $publications = $rep->findAll();
        $vars = ['publications' => $publications];

        return $this->render('front/produits.html.twig', $vars);
    }
    #[Route('/front/producteurs', name: 'producteurs')]
    public function producteurs(): Response
    {
        return $this->render('front/producteurs.html.twig');
    }
    #[Route('/front/apropos', name: 'apropos')]
    public function apropos(): Response
    {
        return $this->render('front/apropos.html.twig');
    }

    #[Route('/front/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('front/contact.html.twig');
    }
    #[Route('/front/produit', name: 'produit')]
    public function produit(): Response
    {
        return $this->render('front/produit.html.twig');
    }
}
