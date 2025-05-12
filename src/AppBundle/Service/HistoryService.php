<?php
// src/Service/HistoryService.php
namespace Service;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class HistoryService
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * Efface le historique de la session en utilisant l'ID de la session
     */
    public function clearHistory()
    {
        $this->session->remove('history');
    }
}