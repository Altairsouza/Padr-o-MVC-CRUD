<?php
namespace App\Controller;

use Src\Classes\ClassRender;
use Src\interfaces\InterfaceView;
use App\Model\ClassCadastro;

class ControllerCadastro extends ClassCadastro{

    protected $id;
    protected $nome;
    protected $sexo;
    protected $cidade;

    use \Src\Traits\TraitUrlParser;

  public function __construct()
  {
      if(count($this->parseUrl())==1){//AQUI TB FAZ PARTE DO REFLEX DO AJAX, ENTAO SE A ATUALIZAÇÃO FOR SO NO CADASTRO PROCEDIMENTO É FEITO
     $render=new ClassRender();
    $render->setTitle("Cadastro");
      $render->setDescription("Faça seu cadastro.");
      $render->setKeywords("cadastro de clientes, cadastro");
      $render->setDir("cadastro");
      $render->renderLayout();
  }
  }
    #recVariavei vai receber as variaveis
  private function recVariaveis(){

      if(isset($_POST['id'])){
          $this->id=$_POST['id'];}


      if(isset($_POST['nome'])){
        $this->nome=filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
      }

      if(isset($_POST['sexo'])){
          $this->sexo=filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_SPECIAL_CHARS);
      }

      if(isset($_POST['cidade'])){
          $this->cidade=filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
      }

  }


  #chamar o metodo de cadastro da classCadastro
 public function cadastrar(){
    $this->recVariaveis();
    $this->cadastroClientes($this->nome, $this->sexo, $this->cidade);
    echo "Cadastro efetuado com sucesso!";
 }


 #SELECIONAR E EXIBIR OS DADOS DO BANCO DE DADOS
    public function seleciona()
    {
        $this->recVariaveis();
        $b=$this->selecionaClientes($this->nome, $this->sexo, $this->cidade);

        echo "
        <form name='formdeletar' id='formdeletar' action='".DIRPAGE."cadastro/deletar' method='post'>
        <table class='table'>
        <tr>
            <td>Ação</td>
            <td>nome</td>
            <td>sexo</td>
            <td>cidade</td>
            </tr>
        ";
        foreach($b as $c){
            echo"
            <tr>
            <td><input type='checkbox' id='id' name='id[]' value='$c[id]'> <img class='ImageEdit' rel='$c[id]' src='".DIRIMG."edite.png' alt='Editar'></td>
            <td>$c[nome]</td>
            <td>$c[sexo]</td>
            <td>$c[cidade]</td>
            </tr>
            
            ";
        }
        echo "
        </table>
        <input type='submit' value='deletar'>
        </form>
        
        ";
    }



    #deletar dados do DB
    public function deletar(){
      $this->recVariaveis();
      foreach($this->id as $iddeletar){
          $this->deletarClientes($iddeletar);
      }

}

#puxando dados do DB
    public function puxaDB($id){
    $this->recVariaveis();
        $b=$this->selecionaClientes($this->nome, $this->sexo, $this->cidade);

        foreach($b as $c){
            if($c['id']== $id){
                $nome=$c['nome'];
                $sexo=$c['sexo'];
                $cidade=$c['cidade'];
            }
        }

        echo "
        <form class='form' name='formAtualizar' id='formAtualizar' action='".DIRPAGE."cadastro/atualizar' method='post'>
<input type='hidden' name='id' id='id' value='$id'><br>
Nome: <input type='text' name='nome' id='nome' value='{$nome}'><br>
Sexo:<select type='text' name='sexo' id='sexo'>
    <option value='$sexo'>Selecione</option>
    <option value='Masculino'>Masculino</option>
    <option value='Feminino'>Feminino</option>
</select><br>
Cidade: <input type='text' name='cidade' id='cidade' value='$cidade'><br>
<input type='submit' value='Atualizar'>
</form>
        
        ";
    }

#atualizar dados dos clientes
public function atualizar(){
    $this->recVariaveis();
    $this->atualizaClientes($this->id, $this->nome,$this->sexo,$this->cidade);
    echo "Usuário Atualizado com Sucesso!";
}

}