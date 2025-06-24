<?php
// /app/controllers/FormController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\PlayerRepository;

class FormController extends AbstractController
{
    private $playerRepository;

    public function __construct(PlayerRepository $playerRepository)
    {
        $this->playerRepository = $playerRepository;
    }

    public function submitFormAction(Request $request)
    {
        // Get the form data from the request
        $formData = $request->get('form');

        // Validate the data (optional)
        $errors = $this->validateForm($formData);
        if (!empty($errors)) {
            return new Response(json_encode(['error' => 'Invalid form data']), 400);
        }

        // Save the data to the database
        try {
            $player = $this->playerRepository->createPlayer($formData['name'], $formData['email']);
            return new Response(json_encode(['success' => 'Player created successfully']), 201);
        } catch (\Exception $e) {
            return new Response(json_encode(['error' => 'Error creating player: ' . $e->getMessage()]), 500);
        }
    }

    private function validateForm($formData)
    {
        // Implement your form validation logic here
        // For example, you could check if the email is in a valid format
        if (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
            return ['email' => 'Invalid email'];
        }
        return [];
    }
}