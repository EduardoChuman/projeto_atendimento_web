<?php

    // VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
    ini_set('display_errors',1);

    // CHAMA OS ARQUIVOS DE VERIFICAÇÃO DE EXISTÊNCIA DAS CLASSES
    require_once("../../config_classes_globais.php");
    require_once("../controller/configAtendimentoWeb.php");

    // INSTANCIA OS OBJETOS DAS CLASSES EMPREGADO E REGISTRO ATENDIMENTO
    $entrevistado = new Empregado();
    $atendimento = new RegistroAtendimento();
    $empregadoCeopc = new Empregado();

    // RECEBE DADOS VIA GET E ATRIBUI AO OBJETO 
    $atendimento->setIdAtendimento($_GET['idAtendimento']);
    
    // CHAMA O MÉTODO QUE RESGATA OS DADOS DO ATENDIMENTO
    $atendimento->consultarAtendimento($atendimento->getIdAtendimento());
    
    // CHAMA O MÉTODO QUE RESGATA OS DADOS DO EMPREGADO CEOPC QUE REALIZOU O ATENDIMENTO 
    $empregadoCeopc->settarEmpregado($atendimento->getMatriculaCeopc());

  //   // VALIDA SE O ENTREVISTADO É A PESSOA ATENDIDA NA CONSULTORIA
  //   if ($entrevistado->getMatricula() != $_GET['matriculaAtendido']) 
  //   {
  //       header("location:http://www.geopc.mz.caixa/esteiracomex/sem_acesso.php");
		// exit;
  //   }

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Avaliação Atendimento CEOPC</title>

    <link href="bootstrap_4/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="bootstrap_4/fonts/glyphicons-halflings-regular.svg" rel="stylesheet"/>
    <link href="css/style.pesquisa.css" rel="stylesheet"/>
   
</head>


<header >
            <!-- <div class="toggler" id='toggler'>
                <div></div>
                <div></div>
                <div></div>
            </div> -->
            <span class="titulo-header-cinza">pesquisa atendimento ceopc </span>
           
            
            <img class="logoPersonalizado" src="images/caixa_corp_.jpg">
</header>

<body>

    <div class="container">
        
    <br/> <br/> <br/>
   
    <div class="imagemFundo img-fluid" alt="Responsive image"> 

        <div>
            <br/> <br/> <br/> <br/> 
            
            <div class="tituloTexto"> Informamos que seu feedback e totalmente anônimo </div>
            <br/> 
            <p class="paragrafo"> Como você avalia o atendimento recebido em XXXX, via XXX, <br/>
            pelo(a) empregado(a) do Middle Office COMEX XXXX <br/>
            em relação aos seguintes aspectos</p>
            
            <br/> <br/>
            <form>
            
            <div class="form-row">
                   
                <p class="paragrafo avaliacoes"> Cordialidade </p>
                    <div class="input-group col-2">
                        
                          <select class="custom-select" id="cordialidade">
                          <option selected>Avalie...</option>
                          <option value="1">Insuficiente</option>
                         <option value="2">Ruim</option>
                         <option value="3">Bom</option>
                         <option value="4">Ótimo</option>
                         <option value="5">Extraordinário</option>
                         </select>
                    </div>

                    <p class="paragrafo avaliacoes2"> Domíno Assunto </p>
                    <div class="input-group col-2">
                        
                          <select class="custom-select" id="dAssunto">
                          <option selected>Avalie...</option>
                          <option value="1">Insuficiente</option>
                         <option value="2">Ruim</option>
                         <option value="3">Bom</option>
                         <option value="4">Ótimo</option>
                         <option value="5">Extraordinário</option>
                         </select>
                    </div>

                    <p class="paragrafo avaliacoes2"> Tempestividade </p>
                    <div class="input-group col-2">
                        
                          <select class="custom-select" id="Tempestividade">
                          <option selected>Avalie...</option>
                          <option value="1">Péssimo</option>
                         <option value="2">Ruim</option>
                         <option value="3">Bom</option>
                         <option value="4">Ótimo</option>
                         <option value="5">Extraordinário</option>
                         </select>
                    </div>

                    <br/>  <br/> <br/><br/>
                    <p class="paragrafo avaliacoes"> Gostaria de deixar um comentário para o analista que te atendeu? </p>
                    <textarea class="observacoes" name='feedbackAtendido' cols='120' rows='6' placeholder='Insira suas observações aqui...'></textarea>
                    



            </div> <!-- form-row labels -->
            </form>

            
            
                
            
       
       
    </div><!-- imagem de fundo -->
    </div><!-- container -->

                                    
                                           
                      
</body>
</html>