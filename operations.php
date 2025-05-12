<?php
// operations.php
$operations = array(
    'op1' => array('description' => 'Opération 1', 'date' => new \DateTime('2023-04-01')),
    'op2' => array('description' => 'Opération 2', 'date' => new \DateTime('2023-04-02')),
    'op3' => array('description' => 'Opération 3', 'date' => new \DateTime('2023-04-03'))
);

// src/Controller/OperationsController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class OperationsController extends AbstractController
{
    public function historyAction()
    {
        $operations = $this->get('operations'); // Récupère l'historique d'opérations depuis le fichier operations.php
        
        return $this->render('operations/history.html.twig', array(
            'operations' => $operations
        ));
    }
}