<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MyController extends Controller
{
    /**
     * @Route("/my/form", name="my_form")
     */
    public function myForm(Request $request)
    {
        // Créer un formulaire avec un champ texte et un bouton submit
        $form = $this->createFormBuilder()
            ->add('name', TextType::class, array('label' => 'Nom'))
            ->add('submit', SubmitType::class, array('label' => 'Envoyer'))
            ->getForm();

        // Traiter le formulaire si la requête est de type POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Obtenir les données du formulaire
            $data = $form->getData();

            // Traiter le champ "name"
            if (empty($data['name'])) {
                // Le champ "name" est vide, afficher un message d'erreur
                $this->addFlash('danger', 'Le nom ne peut pas être vide');

                // Rediriger vers la page de formulaire avec les erreurs affichées
                return $this->redirectToRoute('my_form');
            } else {
                // Le champ "name" n'est pas vide, enregistrer les données dans la base de données
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($data);
                $entityManager->flush();

                // Afficher un message de confirmation et rediriger vers la page d'accueil
                $this->addFlash('success', 'Les données ont été enregistrées avec succès');
                return $this->redirectToRoute('homepage');
            }
        }

        // Retourner le formulaire si la requête n'est pas de type POST ou si le formulaire est invalide
        return $form;
    }
}