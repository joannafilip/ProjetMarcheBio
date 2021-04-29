<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MembreController extends AbstractController
{
    #[Route('/membre/login', name: 'login')]
    public function login(): Response
    {
        return $this->render('membre/login.html.twig');
    }
    #[Route('/membre/inscription/client', name: 'inscriptionClient')]
    public function inscription(): Response
    {
        return $this->render('membre/inscriptionClient.html.twig');
    }
    #[Route('/membre/profil', name: 'profil')]
    public function profil(): Response
    {
        return $this->render('membre/profil.html.twig');
    }
}
