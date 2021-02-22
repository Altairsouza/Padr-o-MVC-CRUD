$(document).ready(function(){

    var DIRPAGE="http://"+document.location.hostname+"/";//aqui é caminho absoluto do javascript

  $('#formselect').on('submit',function(event){
      event.preventDefault();//AQUI VAI SER O REFLEX VAI ATUALIZAR SEM MUDAR DE PAGINA
        var dados=$(this).serialize();//aqui é pra eveniar todos os dados pra mim(ou ususario)
    $.ajax({
        url: DIRPAGE+'cadastro/seleciona',//aqui é pra onde vai redirecionar o formulario htdocs/view/cadastro/main.php(resumidademente é pego do formulario dentro da main)
        method:'post',
        dataType:'html',
        data: dados,
        success: function(dados){
            $('.resultado').html(dados);// resultado está sendo pego da div.resultado dentro da main.php(se o resultado da certo essa div vai pareceber exibindo algo)
        }

    });

  });

  $(document).on('click','.ImageEdit',function(){
      var ImgRel=$(this).attr('rel');

      $.ajax({
          url: DIRPAGE+'cadastro/puxaDB/'+ImgRel,
          method: 'post',
          dataType: 'html',
          data: {'id':ImgRel},
          success:function(data){
              $('.resultadoFormulario').html(data);
          }
      })
  })
});