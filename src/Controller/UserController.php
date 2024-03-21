<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UserRepository;

class UserController extends AbstractController
{

    private $user = [];

    private $repository;


    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }


    #[Route('/user', name: 'app_user', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }


    #[Route('/user', name: 'app_user_get_by_email', methods: ['POST'])]
    public function getByEmail()
    {


        $email = $_POST['email'];
        $user = $this->repository->findOneBy(["email" => $email]);
        var_dump($user);

        die();


    }




}
