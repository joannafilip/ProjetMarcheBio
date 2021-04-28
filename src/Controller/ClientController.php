<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    #[Route('/client/produitsAchetes', name: 'produitsAchetes')]
    public function produitsAchetes(): Response
    {
        return $this->render('client/produitsAchetes.html.twig');
    }
}
