<?php
// src/AppBundle/Controller/MyController.php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormError;

class MyController extends Controller
{
    public function myAction(Request $request)
    {
        // Créer un formulaire avec un champ de type texte
        $form = $this->createFormBuilder()
            ->add('name', TextType::class, array(
                'label' => 'Nom :',
            ))
            ->getForm();

        // Traiter la requête
        $form->handleRequest($request);

        // Vérifier si le formulaire a été soumis
        if ($form->isSubmitted()) {
            // Si le formulaire est invalide, ajouter un message d'erreur
            if (!$form->isValid()) {
                $error = new FormError('Veuillez saisir votre nom correctement.');
                $form['name']->addError($error);
            }
        }

        return $this->render('my/template.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}