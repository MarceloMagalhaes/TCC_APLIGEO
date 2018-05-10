<?php

namespace Sist\Controllers;


use Core\BaseController;

class HomeController extends BaseController
{


    public function index()
    {
        $this->setPageTitle('Home');
        $this->view->nome = "Marcelo Magalhaes";
        $this->renderView('home/index');
    }

}