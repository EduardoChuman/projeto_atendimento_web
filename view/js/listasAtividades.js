var   _atividadesRotina;

$(document).ready(function () {

    carregaListaRotina();
    listaAtividadesRotina();


});


console.log("ola");



function carregaListaRotina() {

 
     $.ajax({
          method: "GET",
          url: "http://www.ceopc.hom.sp.caixa/api/public/atendimento_web.php/lista_atividades_rotina/",
          dataType: "json",
          // async: false
      }).done(function (json) {
  
        // _atividadesRotina = new Array;
        // _atividadesRotina = json;
        console.log(json);
        
                      
      }).fail(function (jqXHR, textStatus, errorThrown) {
  
          console.log("deu erro");
          alert('Problemas ao tentar salvar!\n' + jqXHR.status + ' ' + jqXHR.statusText + errorThrown);
  
      });
 }

 console.log(_atividadesRotina);

 


 