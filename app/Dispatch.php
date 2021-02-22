<?php
namespace App;

use Src\Classes\ClassRoutes;
class Dispatch extends ClassRoutes{

    #atibutos
    private $Method;
    private $Param=[];
    private $Obj;


    public function getMethod()
    {
        return $this->Method;
    }
    public function setMethod($Method)
    {
        $this->Method = $Method;
    }





    public function getParam()
    {
        return $this->Param;
    }
    public function setParam($Param)
    {
        $this->Param = $Param;
    }





#metodo construtor
public function __construct()
{
    self::addController();# o nosso construtor vai nos redirecionar para o addcontroller
}

#metodo de adição de controller
private function addController(){
    $RotaController=$this->getRota();
    $NameSpace="App\\Controller\\{$RotaController}";
    $this->Obj=new $NameSpace;
#de acordo com as requisições dos usuarios e as rotas criadas ele cria a estancia da classe
# exemplo:     objs=new App\Controller\ControllerSitemap;
#então aqui ele já esta simplificando
#$this->obj=new $NameSpace
    if(isset($this->parseUrl()[1])){
        self::addMethod();
    }
}


#metodo de adição de metodo do controller
private function addMethod(){
    if(method_exists($this->Obj, $this->parseUrl()[1])){# esse parseUrl é pra transformar as /
        # em array. O array zero é o primeiro chamado, exemplo(home,sitemap etc) e a 1 esta dentro do site sendo o addmethod. cada barra vai sendo um caminho novo
    $this->setMethod("{$this->parseUrl()[1]}");
    self::addParam();
    call_user_func_array([$this->Obj,$this->getMethod()],$this->getParam());#função para chamar o array
    }

}



#metodo de adição de paremetros do controller
private function addParam(){

        $contarray=count($this->parseUrl());

        if($contarray > 2){
            foreach($this->parseUrl() as $key => $value){
                if($key > 1) {
                    $this->setParam($this->Param += [$key => $value]);
                }
            }

        }
    }
}