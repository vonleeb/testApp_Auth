<?php

namespace App\Controllers;

use App\Core\Controller;

class Main extends Controller
{
    public function index()
    {
        $this->view->render('main_view', 'template_view', $this->data);
    }
}
