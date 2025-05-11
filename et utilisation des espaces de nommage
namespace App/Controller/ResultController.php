<?php
// namespace et utilisation des espaces de nommage
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ResultController extends Controller
{
    /**
     * @Route("/result", name="result")
     */
    public function index(Request $request)
    {
        // récupération des données envoyées par le formulaire
        $data = $request->get('data');

        // traitement des données et génération du résultat
        $result = $this->handleData($data);

        // affichage du résultat
        return new Response($result);
    }

    /**
     * Traite les données envoyées par le formulaire
     *
     * @param array $data Données envoyées par le formulaire
     *
     * @return string Résultat du traitement des données
     */
    public function handleData($data)
    {
        // code pour traiter les données et générer le résultat
        // exemple :
        $result = 'résultat de l\'opération';

        return $result;
    }
}