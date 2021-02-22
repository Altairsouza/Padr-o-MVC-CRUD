<!--responsável por chamar o composer e o arquivo despachante-->
<?php
//aqui é o cabeçalho
header("Content-Type: text/html; charset=utf-8");
///*ta fazendo um requerição dos diretorios raiz  http://localhost/(caminho absoluto(iniio))*/
require_once("../config/config.php");
///*aqui estou chmando o composer*/
require_once("../src/vendor/autoload.php");


$Dispatch=new App\Dispatch();



?>







































































<!--use Src\Traits\TraitUrlParser;-->

<!--#aqui é pra ver se o traitUrlParser está funcionando. o q ele faz, ele transforma as '/' em array-->
<!--class teste{-->
<!--    use  TraitUrlParser;-->
<!--    public function __construct(){-->
<!--        $url=$this->parseUrl();-->
<!--        var_dump($url);-->
<!--    }-->
<!--}-->
<!--$new=new teste();-->









<!--#fazendo teste dos caminhos composer e dentro do app tem teste.php-->

<!--#use App\teste; /*já estou usando o App(caminho) criado no composer.json*/-->

<!--#$teste=new teste();-->