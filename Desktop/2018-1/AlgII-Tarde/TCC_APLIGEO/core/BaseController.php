<?php
/**
 * Created by PhpStorm.
 * User: Marcelo
 * Date: 19/04/2018
 * Time: 20:11
 */

namespace Core;


abstract class BaseController
{
    protected $view;
    private $viewPath;
    private $layoutPath;
    private $pageTitle = null;

    public function __construct()
    {
        $this->view = new \stdClass;
    }

    protected function renderView($viewPath, $layoutPath = null)
    {
        $this->viewPath = $viewPath;
        $this->layoutPath = $layoutPath;
        if ($layoutPath)
        {
            $this->layout();
        }else{
            $this->content();
        }

    }

    protected function content()
    {
        if (file_exists(__DIR__ ."/../sist/Views/{$this->viewPath}.phtml"))
        {
            require_once __DIR__."/../sist/Views/{$this->viewPath}.phtml";
        }else{
            echo "Error: View path not found";
        }
    }
    protected function layout()
    {
        if (file_exists(__DIR__ ."/../sist/Views/{$this->layoutPath}.phtml"))
        {
            require_once __DIR__."/../sist/Views/{$this->layoutPath}.phtml";
        }else{
            echo "Error: layout path not found";
        }
    }

    protected function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;
    }

    protected function getPageTitle($separetor = null)
    {
        if($separetor){
            echo $this->pageTitle . " " .$separetor . " ";
        }else{
            echo $this->pageTitle;
        }
    }

}