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
    #[Route('/membre/inscription', name: 'inscription')]
    public function inscription(): Response
    {
        return $this->render('membre/inscription.html.twig');
    }
}
