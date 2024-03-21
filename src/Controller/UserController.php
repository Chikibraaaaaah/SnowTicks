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


    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }


    public function getByEmail()
    {
        $email = $this->user['email'];
        $user = $this->repository->findOneBy("email", $email);
        var_dump($user);

        die();


    }




}
