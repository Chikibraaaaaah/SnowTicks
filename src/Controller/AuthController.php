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


    #[Route('/auth/register', name: 'app_auth_register', methods: ['GET'])]
    public function register(): Response
    {
        return $this->render('auth/auth.twig', [
            "title" => "Connectez-vous en 3 clics",
            "method" => "login",
            "user" => []
        ]);
    }

    #[Route('/auth/create', name: 'app_auth_create', methods: ['POST'])]
    public function create(Request $request): Response
    {

        dd($request);


        die();
    }


}
