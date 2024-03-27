<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UserRepository;
use App\Entity\User;


class AuthController extends AbstractController
{

    protected $user = [];

    protected $repository;

    private $alert = [];


    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }


    #[Route('/auth/register', name: 'app_auth_register', methods: ['GET'])]
    public function register(): Response
    {
        return $this->render('auth/register.twig', [
            "title" => "Connectez-vous en 3 clics",
            "method" => "register",
            "user" => []
        ]);
    }

    #[Route('/auth/login', name: 'app_auth_login', methods: ['POST'])]
    public function login(Request $request): Response
    {
        $user = $this->repository->findOneBy(["email" => $request->get("email")]);
        
        if($user == null){
            $this->alert = [
                "type" => "danger",
                "message" => "Email inconnu de nos services"
            ];
            $this->redirectToRoute("app_auth_signup");
            var_dump($request);
            die();
        }
        
        var_dump($user);
        die();
    }


    #[Route('/auth/signup', name: 'app_auth_signup', methods: ['GET'])]
    public function signup(Request $request): Response
    {

        return $this->render('auth/signup.twig', [
            "title" => "Rejoignez la commuuuuu",
            "user" => []
        ]);

    }




    #[Route('/auth/create', name: 'app_auth_create', methods: ['POST'])]
    public function create(Request $request): Response
    {

        // dd($request);

        var_dump($request->attributes);
        die();


        die();
    }


}
