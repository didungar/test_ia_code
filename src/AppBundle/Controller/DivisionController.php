<?php
// src/AppBundle/Controller/DivisionController.php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DivisionController extends Controller
{
    /**
     * @Route("/divide/{a}/{b}", name="division")
     */
    public function divideAction(Request $request, $a, $b)
    {
        // Vérifier si les paramètres sont corrects
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new \InvalidArgumentException('Les paramètres doivent être des nombres');
        }

        // Diviser les deux nombre
        $resultat = $a / $b;

        return $this->render('division/index.html.twig', [
            'resultat' => $resultat,
        ]);
    }
}