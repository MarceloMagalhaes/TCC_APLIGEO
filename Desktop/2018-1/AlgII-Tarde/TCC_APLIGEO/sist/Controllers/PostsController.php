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


class PostsController extends BaseController
{
    public function index()
    {
        $this->setPageTitle('Cadastro');
       $model = Container::getModel("Cadastro");
       $this->view->cadastro = $model->All();
       $this->renderView('cadastro/index', 'layout');

    }

    public function show($id, $request){
        $model =Container::getModel("Post");
        $this->view->post = $model->find($id);
        $this->setPageTitle("{$this->view->post->title}");
        $this->renderView('cadastro/show','layout');

    }

}