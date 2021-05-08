<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Publication;
use App\Repository\PublicationRepository;
use App\Repository\UserRepository;

class FrontController extends AbstractController
{
    #[Route('/front/index', name: 'index')]
    public function index(PublicationRepository $repository)
    {
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
    public function producteurs(UserRepository $repository)
    {
        $producteurs = $repository->getProducteurs();
        $vars = ['producteurs' => $producteurs];
        return $this->render('front/producteurs.html.twig', $vars);
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
    #[Route('/front/produit/{id}', name: 'produit')]
    public function produit($id, PublicationRepository $repo): Response
    {
        $publication = $repo->find($id);

        return $this->render('front/produit.html.twig', ['publication' => $publication]);
    }
}
