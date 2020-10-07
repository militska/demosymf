<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
    * @Route("/", name="homepage")
     */
    public function number(): Response
    {
        $response = new Response();

        $response->setContent("Hi!");

        return $response;
    }
}