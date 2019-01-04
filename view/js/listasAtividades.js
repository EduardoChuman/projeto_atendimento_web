$(document).ready(function () 
{
  carregarListaRotinasMiddle();
  carregarListaConsultriaMiddle();
});


console.log("ola");

function carregarListaRotinasMiddle() 
{
  $.ajax(
  {
    method: "GET",
    url: "http://www.ceopc.hom.sp.caixa/api/public/atendimento_web.php/lista_atividades_rotina/",
    dataType: "json",
    // async: false
  }).done(function (json) 
  {
    var str = "";
    $.each(json, function(id,rotina)
    {
      str += "<option value='" + rotina.ID + "'>" + rotina.NOME_ATIVIDADE + "</option>";
    });
    str = "<option disabled selected value>SELECIONE A ROTINA</option>" + str;
    $('#atividadesRotinaMiddle').html(str);
  }).fail(function (jqXHR, textStatus, errorThrown) 
  {
    console.log("deu erro");
    alert('Problemas ao tentar salvar!\n' + jqXHR.status + ' ' + jqXHR.statusText + errorThrown);
  });
}


function carregarListaConsultriaMiddle() 
{
  $.ajax(
  {
    method: "GET",
    url: "http://www.ceopc.hom.sp.caixa/api/public/atendimento_web.php/lista_atividades_consultoria/",
    dataType: "json",
    // async: false
  }).done(function (json) 
  {
    var str = "";
    $.each(json, function(id,consultoria)
    {
      str += "<option value='" + consultoria.ID + "'>" + consultoria.NOME_ATIVIDADE + "</option>";
    });
    str = "<option disabled selected value>SELECIONE A CONSULTORIA</option>" + str;
    $('#atividadesConsultoriaMiddle').html(str);
  }).fail(function (jqXHR, textStatus, errorThrown) 
  {
    console.log("deu erro");
    alert('Problemas ao tentar salvar!\n' + jqXHR.status + ' ' + jqXHR.statusText + errorThrown);
  });
}