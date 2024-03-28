<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Doctrine\ORM\EntityManagerInterface;
// use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UserRepository;
use App\Entity\User;


class AuthController extends AbstractController
{


    protected $em;

    protected $user = [];

    protected $repository;

    protected $alert = [];

    protected $session;


    public function __construct(UserRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
   
    }

    #[Route('/auth/register', name: 'app_auth_register', methods: ['GET'])]
    public function register(): Response
    {
        return $this->render('auth/register.twig', [
            "title" => "Connectez-vous en 3 clics",
            "method" => "register",
            "user" => [],
            "alert" => $this->alert
        ]);
    }

    #[Route('/auth/login', name: 'app_auth_login', methods: ['POST'])]
    public function login(Request $request): Response
    {
        $user = $this->repository->findOneBy(["email" => $request->get("email")]);
        
        if($user == null){
            $this->addFlash("danger", "Cet email n'existe pas");
            return $this->redirectToRoute("app_auth_signup");
        }
        
        $passwordCheck = password_verify($request->get("password"), $user->getPassword());

        if( $passwordCheck == false){
            $this->addFlash("danger", "Mot de passe incorrect");
            return $this->redirectToRoute("app_auth_login");
        }

        // $this->session = $request->getSession();
        // echo "<pre>"; var_dump($this->session);echo "</pre>";
        // die();


        // die();


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

        //TO DO 
        // Utiliser Symfony Security

        $user = $this->repository->findOneBy(["email" => $request->get("email")]);

        if($user){
            $this->addFlash("danger", "Cet email existe déja");
            return $this->redirectToRoute("app_auth_register");
        }

        $password = $request->get("password");
        $passwordCheck = $request->get("passwordCheck");

        if($password !== $passwordCheck){
            $this->addFlash("danger", "Le mot de passe n'est pas le même");
            return $this->redirectToRoute("app_auth_signup");
        }

        $newUser = new User();
        $newUser->setUserName($request->get("userName"));
        $newUser->setEmail($request->get("email"));
        $newUser->setPassword(password_hash($password, PASSWORD_BCRYPT));
        $newUser->setImg("./img/default.webp");
        $newUser->setRoles(["ROLE_USER"]);
        $newUser->setCreatedAt(new \DateTimeImmutable());
        $newUser->setUpdateAt(new \DateTimeImmutable());

        $this->em->persist($newUser);
   
        $this->em->flush();

        return $this->redirectToRoute("app_home");
    }


}
