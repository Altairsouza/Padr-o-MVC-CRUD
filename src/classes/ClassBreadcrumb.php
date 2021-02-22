<?php
namespace Src\Classes;

class ClassBreadcrumb{
    use \Src\Traits\TraitUrlParser;

    #cria os bradrumbs do site(uma rota para o usuario esta vendo aonde ele está no mapda do site)
    public function addBreadcrumb(){#aqui ele vai contar as barras(parseurl)
    $contador=count($this->parseUrl());

    $arraylink[0]='';

        echo "<a href=".DIRPAGE.">home</a> >";

        for($i=0; $i< $contador; $i++){
        $arraylink[0].=$this->parseUrl()[$i].'/';
        echo "<a href=".DIRPAGE.$arraylink[0].">".$this->parseUrl()[$i]."</a>";

        if($i < $contador - 1){
            echo ">";
        }
    }
}
}
            
