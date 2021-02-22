<form class="form" name="formcadastro" id="formcadastro" action="<?php echo DIRPAGE.'cadastro/cadastrar'; ?>" method="post">

    Nome: <input type="text" name="nome" id="nome"><br>
    Sexo:<select type="text" name="sexo" id="sexo">
    <option value="">Selecione</option>
        <option value="Masculino">Masculino</option>
        <option value="Feminino">Feminino</option>
    </select><br>
    Cidade: <input type="text" name="cidade" id="cidade"><br>
    <input type="submit" value="Cadastro">
</form>

<br><br><br><br><br>







<br><br><br><br><br><br><br>
<h1>SELEÇÃO DE DADOS</h1>
<form class="form" name="formselect" id="formselect" action="<?php echo DIRPAGE.'cadastro/seleciona'; ?>" method="post">

    Nome: <input type="text" name="nome" id="nome"><br>
    Sexo:<select type="text" name="sexo" id="sexo">
        <option value="">Selecione</option>
        <option value="Masculino">Masculino</option>
        <option value="Feminino">Feminino</option>
    </select><br>
    Cidade: <input type="text" name="cidade" id="cidade"><br>
    <input type="submit" value="Pesquisar">
</form>

<!-- sera responsavel por receber a tabela de pesquisa-->
<!--#aqui q vai aparecer o ajax(reflex)-->
<div class="resultado" style="widht:100%;height: 300px;background: pink;">


</div>

<br><br>
<hr>
<br><br>
<h1>Formulário de atualizações</h1>
<div class="resultadoFormulario"></div>