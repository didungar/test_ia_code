<?php
// src/Controller/HistoryController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class HistoryController extends AbstractController
{
    /**
     * @Route("/history", name="history")
     */
    public function index(Request $request, EntityManagerInterface $entityManager)
    {
        // Récupérer les opérations enregistrées dans la base de données
        $operations = $entityManager->getRepository('App\Entity\Operation')->findAll();

        // Afficher les opérations dans le template HTML
        return $this->render('history/index.html.twig', [
            'operations' => $operations,
        ]);
    }
}