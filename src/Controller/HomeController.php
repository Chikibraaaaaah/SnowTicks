<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $alerts = [];

    private $articles = [];

    private $user;

    #[Route("/", name: "home", methods: ["GET"])]
    public function show()
    {
        return $this->render("home.twig");
    }

    #[Route("/about", name: "about")]
    public function about()
    {
        echo "Yo";
    }

    #[Route("/test", name: "test")]
    public function test()
    {
     return $this->redirectToRoute("about");
    }


}