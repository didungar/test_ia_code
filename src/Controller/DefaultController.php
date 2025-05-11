<?php
// src/Controller/DefaultController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request): Response
    {
        // Traiter les résultats exacts
        $results = $this->getDoctrine()->getRepository('App:Result')->findAll();
        
        // Filtrer les résultats exacts selon les critères de recherche
        $filteredResults = $this->filterResults($results, $request->query->all());
        
        return $this->render('default/index.html.twig', [
            'results' => $filteredResults,
        ]);
    }
    
    /**
     * Filtre les résultats exacts selon les critères de recherche
     * 
     * @param array $results Les résultats à filtrer
     * @param array $criteria Les critères de recherche
     * @return array Les résultats filtrés
     */
    private function filterResults(array $results, array $criteria): array
    {
        // Filtre les résultats en fonction des critères de recherche
        foreach ($results as $key => $result) {
            if (!$this->isResultMatch($result, $criteria)) {
                unset($results[$key]);
            }
        }
        
        return array_values($results);
    }
    
    /**
     * Vérifie si un résultat correspond aux critères de recherche
     * 
     * @param object $result Le résultat à vérifier
     * @param array $criteria Les critères de recherche
     * @return bool Si le résultat correspond aux critères de recherche ou non
     */
    private function isResultMatch(object $result, array $criteria): bool
    {
        // Vérifie si les critères de recherche sont respectés par le résultat
        foreach ($criteria as $key => $value) {
            if (!$this->isCriterionMatch($result, $key, $value)) {
                return false;
            }
        }
        
        return true;
    }
    
    /**
     * Vérifie si un résultat correspond à un critère de recherche
     * 
     * @param object $result Le résultat à vérifier
     * @param string $key Le nom du critère de recherche
     * @param mixed $value La valeur attendue pour le critère de recherche
     * @return bool Si le résultat correspond au critère de recherche ou non
     */
    private function isCriterionMatch(object $result, string $key, $value): bool
    {
        // Vérifie si la valeur du résultat correspond à celle attendue pour le critère de recherche
        if (property_exists($result, $key)) {
            return $this->isValueMatch($result->{$key}, $value);
        }
        
        return false;
    }
    
    /**
     * Vérifie si une valeur correspond à une valeur attendue
     * 
     * @param mixed $value La valeur à vérifier
     * @param mixed $expectedValue La valeur attendue
     * @return bool Si la valeur correspond ou non à la valeur attendue
     */
    private function isValueMatch($value, $expectedValue): bool
    {
        // Vérifie si la valeur est un tableau et si la valeur attendue est également un tableau
        if (is_array($value) && is_array($expectedValue)) {
            return count(array_intersect($value, $expectedValue)) === count($expectedValue);
        }
        
        // Vérifie si la valeur est une chaîne de caractères et si la valeur attendue est également une chaîne de caractères
        if (is_string($value) && is_string($expectedValue)) {
            return mb_stripos($value, $expectedValue) !== false;
        }
        
        // Vérifie si la valeur est un entier et si la valeur attendue est également un entier
        if (is_int($value) && is_int($expectedValue)) {
            return $value === $expectedValue;
        }
        
        // Vérifie si la valeur est une date et si la valeur attendue est également une date
        if (is_object($value) && get_class($value) === 'DateTime') {
            return $this->isDateMatch($value, $expectedValue);
        }
        
        // Vérifie si la valeur est un booléen et si la valeur attendue est également un booléen
        if (is_bool($value) && is_bool($expectedValue)) {
            return $value === $expectedValue;
        }
        
        // Si le type de données n'est pas connu, on utilise une comparaison stricte
        return $value == $expectedValue;
    }
    
    /**
     * Vérifie si deux dates correspondent à la même date
     * 
     * @param \DateTimeInterface $date La date à vérifier
     * @param \DateTimeInterface $expectedDate La date attendue
     * @return bool Si les dates correspondent ou non
     */
    private function isDateMatch(\DateTimeInterface $date, \DateTimeInterface $expectedDate): bool
    {
        return $date->format('Y-m-d') === $expectedDate->format('Y-m-d');
    }
}