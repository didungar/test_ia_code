<?php
// src/Controller/ContestRulesController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContestRulesController extends AbstractController
{
    /**
     * @Route("/contest-rules", name="contest_rules")
     */
    public function index(Request $request): Response
    {
        // Load the contest rules from a file or database
        $rules = [
            'Understanding the Contest Rules',
            'Read and understand the contest rules, take notes on the key points.',
            'En utilisant le fichier : None',
            'Assurez-vous de suivre les meilleures pratiques de développement et d\'utiliser les composants du framework Symfony lorsque cela est possible.',
            'Le code doit être clair, concis et bien documenté.'
        ];

        // Create a form to collect the user's notes
        $form = $this->createForm(ContestRulesType::class);

        // Handle the form submission
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                // Save the user's notes to a database or file
                $notes = $form->getData();
                // ... save the notes to a database or file ...

                return $this->redirectToRoute('contest_rules');
            }
        }

        // Render the template with the contest rules and form
        return $this->render('contest_rules/index.html.twig', [
            'rules' => $rules,
            'form' => $form->createView()
        ]);
    }
}