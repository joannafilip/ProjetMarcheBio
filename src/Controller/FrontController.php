<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Publication;
use App\Repository\PublicationRepository;
use App\Repository\UserRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

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
    public function produits(PaginatorInterface $paginator, Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository(Publication::class);
        $publications = $paginator->paginate(
            $rep->findAll(),
            $request->query->getInt('page', 1), 6);
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
    public function produit($id, Request $request, PublicationRepository $repo, SessionInterface $session): Response
    {
        $publication = $repo->find($id);
        //add to basket handling

        $basket = $session->get('basket', []);

        if ($request->isMethod('POST')) {
            $basket[$publication->getId()] = $publication;
            $session->set('basket', $basket);
        }

        $isInBasket = array_key_exists($publication->getId(), $basket);

        return $this->render('/front/produit.html.twig', [
            'publication' => $publication,
            'inBasket' => $isInBasket
        ]);
    }
}
