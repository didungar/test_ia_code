<?php
// src/Controller/MyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class MyController extends AbstractController
{
    public function index(Request $request)
    {
        // Initialisation de la pile
        $stack = array();
        
        // Gestion du formulaire
        if ($request->isMethod('post')) {
            $formData = $request->get('form');
            
            // Si l'utilisateur a appuyé sur la touche "C", réinitialiser la pile
            if (isset($formData['key']) && $formData['key'] === 'c') {
                $stack = array();
            } else {
                // Sinon, ajouter l'élément à la pile
                array_push($stack, $formData['value']);
            }
        }
        
        // Affichage de la pile
        return $this->render('index.html.twig', [
            'stack' => $stack,
        ]);
    }
}