<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
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
    public function create(Request $request): Response
    {
        $user = new User();
        $user->setName('admin')
            ->setDescription("test user");


        $form = $this->createForm(UserType::class, $user);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_create');
        }


        return $this->render('user/create.html.twig', [
            'form' => $form->createView(),
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
