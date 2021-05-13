<?php

namespace App\Controller;
use App\Form\PublicationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Publication;
use Symfony\Component\HttpFoundation\Request;


class ProduitFormController extends AbstractController
{
    #[Route('/produit/form', name: 'produit_form')]
    public function index(Request $request): Response
    {
        $publication = new Publication();
        $form = $this->createForm(PublicationFormType::class, $publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($publication);
            $entityManager->flush();
        }
        return $this->render('produit_form/index.html.twig', [
            'publicationForm' => $form->createView(),
        ]);
    }
}
