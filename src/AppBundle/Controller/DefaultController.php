<?php
// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/decimals", name="decimals")
     */
    public function decimalsAction()
    {
        $number = 12345.6789;

        // Display the number with two decimal places
        $response = new Response();
        $response->setContent(number_format($number, 2));

        return $response;
    }
}