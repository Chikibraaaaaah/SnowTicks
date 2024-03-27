<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UserRepository;


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

        return $this->render('auth/auth.twig', [
            'controller_name' => 'AuthController',
        ]);
    }

    // #[Route('/auth', name: 'app_auth_register', methods: ['GET'])]
    // public function index(): Response
    // {

    //     return $this->render('auth/auth.twig', [
    //         'controller_name' => 'AuthController',
    //     ]);
    // }


    #[Route('/auth/create', name: 'app_auth_create', methods: ['POST'])]
    public function create()
    {


        $email = $_POST['email'];

        var_dump($email);


        $user = $this->repository->findBy(["email" => $email]);
        var_dump($user);

        die();


    }


    #[Route('/auth/signup', name: 'app_auth_signup', methods: ['GET'])]
    public function signup()
    {

        
        return $this->render('auth/signup.twig', [
            "user" => [],
            "title" => "Inscription" 
        ]);


    }
}
