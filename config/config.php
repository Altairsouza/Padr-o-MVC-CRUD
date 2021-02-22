<?php
#Arquivos diretórios raízes
#EXEMPLO http://localhost/($PastaInterna(sitenovo))/public/img
$PastaInterna="";#caso o nosso arquivo nao esteja no diretório raiz coloque um nome la(vai q tem varios projeto na raiz)

define('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}"); #vai ser o caminho absoluto das nossas paginas(caminho de vizualização da nossa url)

if(substr($_SERVER['DOCUMENT_ROOT'],-1)=='/') {#se a ultima letra do meu servidor se for igual a uma / ta ok e se nao tiver ele vai colocar, pra evitar erros pq as vezes no servidor online ele nao colocar a /
    define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}{$PastaInterna}");
}else{
    define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}/{$PastaInterna}");#caminho fisíco do nosso servidor. Exemplo a pasta xampp, aqui usa pra buscar aqui nas pastas
}

#diretórios Específicos
define('DIRIMG',DIRPAGE."public/img/");#AQUI É O CAMINHO ABSOLUTO PARA PASTA IMG
define('DIRICSS',DIRPAGE."public/css/");#css
define('DIRIJS',DIRPAGE."public/JS/");
define('DIRIADM',DIRPAGE."public/admin/"); #admin
define('DIRIAUDIO',DIRPAGE."public/audio/");#audio
define('DIRIDESIGN',DIRPAGE."public/design/");#design
define('DIRIFTS',DIRPAGE."public/fontes/");#fontes
define('DIRIVIDEO',"http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}public/video/");


#Acesso ao banco de dados
define('HOST',"localhost");
define('DB',"sistema");#sistema é o nome do banco de dados
define('USER',"root");
define('PASS',"");