<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="user")
     */
    public function index()
    {
        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();

        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'users' => $users
        ]);
    }


    /**
     * @Route("/create", name="user_create")
     */
    public function create(): Response
    {
        $doctrineManager = $this->getDoctrine()->getManager();

        $user = new User();
        $user->setName('admin')
            ->setPassword("123")
            ->setFullName("admin admin")
            ->setDescription("test user");


        $doctrineManager->persist($user);

        $doctrineManager->flush();

        return $this->render('user/create.html.twig', [
            'user' => $user,
        ]);

    }


    /**
     * @Route("/show", name="user_show")
     */
    public function show()
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find(5);

        if (!$user) {
            throw $this->createNotFoundException("User not found");
        }

        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }
}
