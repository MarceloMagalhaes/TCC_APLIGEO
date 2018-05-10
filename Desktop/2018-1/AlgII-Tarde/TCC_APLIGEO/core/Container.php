<?php
/**
 * User: Marcelo
 * Date: 19/04/2018
 * Time: 16:26
 */

namespace core;


class Container
{
    public static function newController($controller)
    {
        $controller = "Sist\\Controllers\\" .$controller;
        return new $controller;
    }

    public static function getModel($model)
    {
        $objModel = "\\Sist\\Models\\" . $model;
        return new $objModel(Database::getDataBase());
    }

    public static function pageNotFound()
    {
        if(file_exists(__DIR__ . "/../sist/Views/404.phtml")){
            return require_once __DIR__ . "/../sist/Views/404.phtml";
        }else{
            echo "Erro 404: Página não encontrada";
        }
    }

}
