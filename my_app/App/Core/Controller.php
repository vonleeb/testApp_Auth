<?php


namespace App\Core;

use Aura\Session\SessionFactory;

class Controller
{
    public $view;
    public $session;
    public $entityManager;
    public $data = array();

    public function __construct()
    {
        $this->view = new View();
        $session_factory = new SessionFactory();
        $session = $session_factory->newInstance($_COOKIE);
        $this->session = $session->getSegment('controller');
        $this->data['message'] = $this->session->getFlash('message');
        $db = new DB();
        $this->entityManager = $db->getManager();
    }
}
