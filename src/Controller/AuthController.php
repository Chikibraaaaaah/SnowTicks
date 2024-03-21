<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UserRepository;
use App\Entity\User;



class AuthController extends AbstractController
{

    protected $user = [];

    protected $repository;


    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }


    #[Route('/auth', name: 'app_auth', methods: ['GET'])]
    public function index(): Response
    {

        return $this->render('auth/index.html.twig', [
            'controller_name' => 'AuthController',
        ]);
    }

    #[Route('/auth', name: 'app_auth_create', methods: ['POST'])]
    public function create()
    {
        
        // $user = $this->repository->findOneBy(['email' => $_POST['email']]);
        // $this->user = $user;

        $user = $this->repository->find(1);

        
        var_dump($user);
        die();
        // if($user) {
        //     return $this->redirectToRoute('app_home');
        // };


    }
}
