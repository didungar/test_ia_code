<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class MyController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function myAction()
    {
        // Récupération du résultat de la requête SQL
        $result = $this->entityManager->getRepository('App:MyEntity')->findAll();

        return $this->render('my/template.html.twig', [
            'result' => $result
        ]);
    }
}