<?php
// src/Controller/YourController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;

class YourController extends AbstractController
{
    public function yourAction(Request $request): Response
    {
        // Create a form builder
        $form = $this->createFormBuilder()
            ->add('name', TextType::class, [
                'label' => 'Name',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Submit',
            ])
            ->getForm();

        // Handle the form submission
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Get the submitted data
            $data = $form->getData();

            // Check if the name field is empty
            if (empty($data['name'])) {
                // Set an error message on the form
                $form->get('name')->addError(new FormError('Please enter your name'));
            } else {
                // Do something with the submitted data
                $name = $data['name'];

                // ...
            }
        }

        return $this->render('your/template.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}