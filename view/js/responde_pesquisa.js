



// avisa que o registro foi salvo antes de recarregar a página e impede cadastramento de registros sem avaliação;

function limpar() 
{ 
   document.getElementById("preenchimento_campos").innerHTML=""; 
} 



var select = document.querySelector('select'),
    form = document.querySelector('form');

form.addEventListener('submit', validateAndSubmit, false);

function validateAndSubmit(event) {
  // Prevenindo o comportamento padrão.

  event.preventDefault();

  let notaCordialidade = formAvaliaMiddle.notaCordialidade.value;
  let notaDominio = formAvaliaMiddle.notaDominio.value;
  let notaTempestividade = formAvaliaMiddle.notaTempestividade.value;

  if(notaCordialidade=="")

    {
    document.getElementById('preenchimento_campos').innerHTML += '<br> Por favor avaliar sobre a Cordialidade do atendimento';
    return false;
    }

  if (notaDominio=="")
    {
    document.getElementById('preenchimento_campos').innerHTML += '<br> Por favor avaliar sobre o Dominio do Analista durante o atendimento';
    return false;
    }

  if (notaTempestividade=="")
  {
    document.getElementById('preenchimento_campos').innerHTML += '<br> Por favor avaliar sobre a Tempestividade do atendimento';
    return false;
  } 

  else {
    form.submit();
    alert('Alteração feita com sucesso!');
  }
}

