<?php
// /models/User.php
namespace App\Model;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class User {
    // ...
    
    public function checkIfDataIsCompliant(Request $request, EntityManagerInterface $em) {
        // Vérifier si les données collectées sont conformes aux réglementations GDPR
        $data = $request->getContent();
        if ($em->isDataCompliant($data)) {
            return true;
        } else {
            throw new \Exception('Les données ne sont pas conformes aux réglementations GDPR');
        }
    }
}