<?php
namespace Src\Classes;

use Src\Traits\TraitUrlParser;

class ClassRoutes{
    use TraitUrlParser;

    private $rota;

    #método de retorno da rota
    public function getRota(){
        $url=$this->parseUrl();
        $I=$url[0];

        //aqui é a url amigavel, aonde vou transformar os meus controllers ex: controllerPertinent=Pertinent
        $this->rota=array(
        ""=>"ControllerHome",
        "home"=>"ControllerHome",
        "sitemap"=>"ControllerSitemap",
        "carro"=>"ControllerCarros",
        "contato"=>"ControllerContato",
        "cadastro"=>"ControllerCadastro"
        );
        if(array_key_exists($I,$this->rota)){
        if(file_exists(DIRREQ."app/controller/{$this->rota[$I]}.php")) {

            return $this->rota[$I];
        }else{
            return "ControllerHome";
        }
        }else{
        return "Controller404";
    }
}
}