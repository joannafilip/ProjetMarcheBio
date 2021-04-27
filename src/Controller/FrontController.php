<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    #[Route('/front/index', name: 'index')]
    public function index(): Response
    {
        return $this->render('front/index.html.twig');
    }
    #[Route('/front/produits', name: 'produits')]
    public function produits(): Response
    {
        return $this->render('front/produits.html.twig');
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
    #[Route('/front/login', name: 'login')]
    public function login(): Response
    {
        return $this->render('front/login.html.twig');
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
