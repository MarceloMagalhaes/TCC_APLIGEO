<?php


namespace Core;


class Rota
{
    private $rotas;
    public function _Construct(array $rotas){
        $this->setRotas($rotas);
        $this->run();
    }

    private function setRotas($rotas){
        foreach ($rotas as $rota){
            $explode = explode('@', $rota[1]);
            $r = [$rota[0], $explode[0], $explode[1]];
            $newRotas[]= $r;
        }
        $this->rotas = $newRotas;
    }

    private function getRequest()
    {
        $obj = new \stdClass;
        foreach ($_GET as $key=> $value)
        {
            $obj->get->$key = $value;
        }

        foreach ($_POST as $key=> $value)
        {
            $obj->post->$key = $value;
        }
        return $obj;
    }

    private function getUrl(){
        return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    }

    private function run(){
        $url = $this->getUrl();
        $urlArray = explode('/', $url);


        foreach ($this->rotas as $rota){
            $rotaArray = explode('/', $rota[0]);

            for ($i = 0; $i < count($rotaArray); $i++){
                if ((stripos($rotaArray[$i], "{")!==false) && (count($urlArray) == count($rotaArray))){
                    $rotaArray[$i] = $urlArray[$i];
                    $param[] = $urlArray[$i];
                }
                $rota[0] = implode($rotaArray, '/');

            }
            if($url == $rota[0]){
                $found = true;
                $controller = $rota[1];
                $action = $rota[2];
                break;
            }
        }
        if($found){
            $controller = Container::newController($controller);

            switch (count($param)){
                case 1:
                    $controller->$action($param[0], $this->getRequest());
                case 2:
                    $controller->$action($param[0], $param[1] , $this->getRequest());
                case 3:
                    $controller->$action($param[0], $param[1], $param[2], $this->getRequest());

                default:
                    $controller->$action($this->getRequest());
            }

        }else{
            Container::pageNotFound();
        }
    }
}