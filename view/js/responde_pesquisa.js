var select = document.querySelector('input'),
    form = document.querySelector('form');

form.addEventListener('submit', validateAndSubmit, false);

function validateAndSubmit(event) 
{
  // Prevenindo o comportamento padrão.

  event.preventDefault();

  var notaCordialidade = formAvaliaMiddle.notaCordialidade.value;
  var notaDominio = formAvaliaMiddle.notaDominio.value;
  var notaTempestividade = formAvaliaMiddle.notaTempestividade.value;

  if(notaCordialidade < 1 || notaDominio < 1 || notaTempestividade < 1)
  {
    alert('Os três quesitos devem ser avaliados.');
    return false;
  }
  else 
  {
    form.submit();
    // alert('Alteração feita com sucesso!');
  }
}

