<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PublicationRepository;
use App\Form\ProduitSearchFormType;
use Knp\Component\Pager\PaginatorInterface;
use App\Entity\ProduitSearch;
use Symfony\Component\HttpFoundation\Request;

class ProduitsController extends AbstractController
{
    #[Route('/produits/produits', name: 'produits')]
    public function produits(PaginatorInterface $paginator, Request $request, PublicationRepository $repository): Response
    {
        $search = new ProduitSearch();
        $form = $this->createForm(ProduitSearchFormType::class, $search);
        $form->handleRequest($request);

    
        $publications = $paginator->paginate(
            $repository->findAllQuery($search),
            $request->query->getInt('page', 1), 6);
            $vars = ['publications' => $publications,
                    'form' => $form->createView()
        ];

        return $this->render('front/produits.html.twig', $vars);
    }
}
