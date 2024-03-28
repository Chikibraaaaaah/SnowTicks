<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TrickRepository;
use Monolog\DateTimeImmutable;

class HomeController extends AbstractController
{
    protected $alerts = [];

    protected $tricks = [];

    protected $user;

    protected $repository = null;





    public function __construct(TrickRepository $repository)
    {
        $this->repository = $repository;
    }


    #[Route("/", name: "app_home")]
    public function home(): Response
    {
        $this->tricks = $this->repository->findAll();

        return $this->render('home.twig', [
           "user" => $this->user,
           "title" =>"Bienvenue sur SnowTicks",
           "tricks" => $this->tricks,
           "alerts" => $this->alerts
        ]);
    }
}