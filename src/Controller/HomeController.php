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
    public function index(): Response
    {

       return $this->render('base.html.twig', [
           
       ]);
    }
}