<?php
// AcceuilController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AcceuilController extends AbstractController
{
    /**
     * @Route("/", name="acceuil")
     */
    public function index(Request $request)
    {
        // Récupérer le résultat de la dernière requête (si elle a été exécutée)
        $resultat = $this->get('last_query')->getResult();

        // Si une recherche a été effectuée, afficher les résultats
        if ($request->getMethod() === 'GET' && isset($resultat)) {
            return $this->render('acceuil/resultats.html.twig', [
                'resultats' => $resultat,
            ]);
        }

        // Si la requête est une méthode POST (par exemple, un formulaire a été soumis), exécuter la requête
        if ($request->getMethod() === 'POST') {
            // Récupérer les données du formulaire
            $donnees = $request->request->all();

            // Exécuter la requête avec les données du formulaire
            $resultat = $this->get('last_query')->execute($donnees);

            // Mettre à jour le résultat de la dernière requête
            $this->get('last_query')->setResult($resultat);

            // Afficher les résultats
            return $this->render('acceuil/resultats.html.twig', [
                'resultats' => $resultat,
            ]);
        }

        // Si la requête est une méthode GET (par exemple, un visiteur accède à l'url de la page d'accueil), afficher le formulaire de recherche
        return $this->render('acceuil/recherche.html.twig', [
            'form' => $this->createForm(RechercheType::class)->createView(),
        ]);
    }
}