<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TrickRepository;

class HomeController extends AbstractController
{
    private $alerts = [];

    private $Tricks = [];

    private $user;

    #[Route("/", name: "app_home")]
    public function home(): Response
    {
       return $this->render('home.twig', [
           "user" => $this->user,
           "title" =>"Bienvenue sur SnowTicks",
       ]);
    }
}