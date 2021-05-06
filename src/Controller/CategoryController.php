<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PublicationRepository;

class CategoryController extends AbstractController
{
    #[Route('/category/legumes', name: 'legumes')]
    public function legumes(PublicationRepository $repository)
    {
        $produits = $repository->getLegumes();
        $vars = ['produits' => $produits];

        return $this->render('category/legumes.html.twig', $vars);
    }
    #[Route('/category/fruits', name: 'fruits')]
    public function fruits(PublicationRepository $repository)
    {
        $produits = $repository->getFruits();
        $vars = ['produits' => $produits];

        return $this->render('category/fruits.html.twig', $vars);
    }
    #[Route('/category/boulangerie', name: 'boulangerie')]
    public function boulangerie(PublicationRepository $repository)
    {
        $produits = $repository->getBoulangerie();
        $vars = ['produits' => $produits];

        return $this->render('category/boulangerie.html.twig', $vars);
    }
    #[Route('/category/cremerie', name: 'cremerie')]
    public function cremerie(PublicationRepository $repository)
    {
        $produits = $repository->getCremerie();
        $vars = ['produits' => $produits];

        return $this->render('category/cremerie.html.twig', $vars);
    }
    #[Route('/category/epicerie', name: 'epicerie')]
    public function epicerie(PublicationRepository $repository)
    {
        $produits = $repository->getEpicerie();
        $vars = ['produits' => $produits];

        return $this->render('category/epicerie.html.twig', $vars);
    }
    #[Route('/category/boissons', name: 'boissons')]
    public function boissons(PublicationRepository $repository)
    {
        $produits = $repository->getBoissons();
        $vars = ['produits' => $produits];

        return $this->render('category/boissons.html.twig', $vars);
    }
}
