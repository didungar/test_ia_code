<?php
// src/Controller/HistoryController.php

namespace Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Entity\History;
use Repository\HistoryRepository;

class HistoryController extends Controller
{
    /**
     * @Route("/history", name="history")
     */
    public function indexAction(Request $request)
    {
        // Get the current user's history
        $user = $this->getUser();
        $history = $this->getDoctrine()->getRepository(History::class)->findBy(['user' => $user]);

        return $this->render('History:index.html.twig', [
            'history' => $history,
        ]);
    }

    /**
     * @Route("/history/add", name="history_add")
     */
    public function addAction(Request $request)
    {
        // Get the current user and create a new history entity
        $user = $this->getUser();
        $history = new History();
        $history->setUser($user);

        // Get the data from the request
        $data = $request->request->all();

        // Set the history fields
        $history->setType($data['type']);
        $history->setDescription($data['description']);
        $history->setAmount($data['amount']);
        $history->setDate(new \DateTime('now'));

        // Persist the entity and flush it to the database
        $em = $this->getDoctrine()->getManager();
        $em->persist($history);
        $em->flush();

        return $this->redirectToRoute('history');
    }
}