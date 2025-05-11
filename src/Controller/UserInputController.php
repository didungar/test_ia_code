<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;

class UserInputController extends AbstractController
{
    public function handleUserInput(Request $request)
    {
        // Création d'un formulaire pour les champs "name" et "email"
        $form = $this->createFormBuilder()
            ->add('name', TextType::class, [
                'constraints' => [new NotBlank(['message' => 'Le champ nom est obligatoire'])]
            ])
            ->add('email', EmailType::class, [
                'constraints' => [new Email(['message' => 'Adresse email invalide'])]
            ])
            ->add('submit', SubmitType::class)
            ->getForm();

        // Traitement du formulaire
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Validation des champs "name" et "email"
            $data = $form->getData();

            if (!empty($data['name'])) {
                // Code à exécuter si le champ "name" est valide
                // Example : envoyer un message de réussite par email
                $this->sendEmail($data);
            } else {
                // Code à exécuter si le champ "name" n'est pas valide
                // Example : afficher un message d'erreur pour le champ "name"
                $form->get('name')->addError(new NotBlank(['message' => 'Le champ nom est obligatoire']));
            }

            if (!empty($data['email'])) {
                // Code à exécuter si le champ "email" est valide
                // Example : envoyer un message de réussite par email
                $this->sendEmail($data);
            } else {
                // Code à exécuter si le champ "email" n'est pas valide
                // Example : afficher un message d'erreur pour le champ "email"
                $form->get('email')->addError(new Email(['message' => 'Adresse email invalide']));
            }
        }

        return $this->render('user_input/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    private function sendEmail(array $data)
    {
        // Code pour envoyer un email avec les données du formulaire
        // Example : utiliser la classe "Swift_Mailer" de Symfony pour envoyer un email
        $message = Swift_Message::newInstance()
            ->setSubject('Nouveau message')
            ->setFrom($data['email'])
            ->setTo('info@example.com')
            ->setBody(
                'Nom : ' . $data['name'] . '<br>' .
                'Adresse email : ' . $data['email']
            );

        $mailer = Swift_Mailer::newInstance();
        $mailer->send($message);
    }
}