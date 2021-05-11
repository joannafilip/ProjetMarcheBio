<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

class ProducteurController extends AbstractController
{
    #[Route('/producteur', name: 'produitsPublies')]
    public function produitsPublies(): Response
    {
        $this->getUser();
        return $this->render('producteur/produitsPublies.html.twig');
    }
}
