<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;

class FormatResultController extends Controller
{
    /**
     * @Route("/format-result", name="format_result")
     */
    public function formatResult(Request $request)
    {
        // Récupérer les données à partir de la requête HTTP
        $data = json_decode($request->getContent(), true);

        // Formater les résultats en utilisant le Serializer
        $serializer = new Serializer(array(new ObjectNormalizer()));
        $formattedData = $serializer->normalize($data, null, array('format' => 'json'));

        // Renvoyer la réponse formatée au client HTTP
        return new Response($formattedData);
    }
}