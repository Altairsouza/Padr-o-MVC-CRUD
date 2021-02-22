<?php
namespace App\Model;

use App\Model\ClassConexao;

class ClassCadastro extends ClassConexao{

    private $Db;

    #Cadastrará os clientes no sistema
    protected function cadastroClientes($nome , $sexo , $cidade)
    {
        $id=0;
        $this->Db=$this->conexaoDB()->prepare("insert into teste values(:id , :nome , :sexo , :cidade)");
        $this->Db->bindParam(":id",$id,\PDO::PARAM_INT);
        $this->Db->bindParam(":nome",$nome,\PDO::PARAM_STR);
        $this->Db->bindParam(":sexo",$sexo,\PDO::PARAM_STR);
        $this->Db->bindParam(":cidade",$cidade,\PDO::PARAM_STR);
        $this->Db->execute();
    }



    #Acesso ao banco de dados com seleção
    public function selecionaClientes($nome , $sexo , $cidade)

    {

        $nome='%'.$nome.'%';
        $sexo='%'.$sexo.'%';
        $cidade='%'.$cidade.'%';
        $BFetch=$this->Db=$this->conexaoDB()->prepare("select * from teste where nome like :nome and sexo like :sexo and cidade like :cidade");
        $BFetch->bindParam(":nome",$nome,\PDO::PARAM_STR);
        $BFetch->bindParam(":sexo",$sexo,\PDO::PARAM_STR);
        $BFetch->bindParam(":cidade",$cidade,\PDO::PARAM_STR);
        $BFetch->execute();

        $i=0;
        while($Fetch=$BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i]=['id'=>$Fetch['id'],'nome'=>$Fetch['nome'] ,'sexo'=>$Fetch['sexo'],'cidade'=>$Fetch['cidade']];
            $i++;

        }
        return $Array;
    }

    #deletar direto no banco
    protected function deletarClientes($id){
        $BFetch=$this->Db=$this->conexaoDB()->prepare("delete from teste where id=:id");
        $BFetch->bindParam(":id",$id,\PDO::PARAM_INT);
        $BFetch->execute();
    }



    #atualização direto no BD
    protected function atualizaClientes($id, $nome, $sexo, $cidade){
        $BFetch=$this->Db=$this->conexaoDB()->prepare("update teste set nome=:nome , sexo=:sexo , cidade=:cidade where id=:id");
        $BFetch->bindParam(":id",$id,\PDO::PARAM_INT);
        $BFetch->bindParam(":nome",$nome,\PDO::PARAM_STR);
        $BFetch->bindParam(":sexo",$sexo,\PDO::PARAM_STR);
        $BFetch->bindParam(":cidade",$cidade,\PDO::PARAM_STR);
        $BFetch->execute();
    }
}