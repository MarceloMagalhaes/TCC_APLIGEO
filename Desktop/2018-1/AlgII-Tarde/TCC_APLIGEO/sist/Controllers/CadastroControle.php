<?php
/**
 * Created by PhpStorm.
 * User: Marcelo
 * Date: 19/04/2018
 * Time: 16:33
 */

namespace Sist\Controllers;


use Core\BaseController;
use core\Container;

class CadastroControle extends BaseController
{
    public function index()
    {
        $this->setPageTitle('Cadastro');
        $model = Container::getModel("Cadastro");
        $this->view->cadastro = $model->All();
        $this->renderView('cadastro/index', 'layout');

    }

    public function show($id, $request){
        echo $id. "<br>";
        echo $request->get->nome;

    }

}