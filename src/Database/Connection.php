<?php
// Connection.php
namespace App\Database;

use Doctrine\ORM\EntityManagerInterface;

class Connection {
  private $em;

  public function __construct(EntityManagerInterface $em) {
    $this->em = $em;
  }

  // Retourne une instance de la classe EntityManager
  public function getEntityManager() {
    return $this->em;
  }
}