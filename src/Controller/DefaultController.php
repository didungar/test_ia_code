<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UserRepository;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request)
    {
        // Mise en production du code pour afficher la liste des utilisateurs
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->render('default/index.html.twig', [
            'users' => $users,
        ]);
    }
}