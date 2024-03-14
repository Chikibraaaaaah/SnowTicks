<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $alerts = [];

    private $articles = [];

    private $user;

    #[Route("/")]
    public function homepage()
    {

        $truc = 5;

        return $this->render('base.html.twig', [
            
        ]);
    }
}