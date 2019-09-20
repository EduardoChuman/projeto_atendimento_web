var _tabelaPizzaContagemAtendimentos;
var _perfilEmpregado;
var _celulaEmpregado;
var _eventualCelula;
var _eventualCeopc;
var _mesAtual;
var _mesPassado;
var _doisMesesAtras;
var _jsonPizzaAtendimentoRotinaConsultoria;
var _jsonContagemPorCanalAtendimento;
var _jsonMediaNotasPesquisa;
var _jsonListaAtendimentoRotina;
var _jsonListaAtendimentoConsultoria;
var _jsonAtendimentosPorDire;
var _jsonAtendimentoPorAssistente;
var _jsonPesquisasEnviadasRespondidasPorAssistente;
var _jsonListaFeedbackAtendimentos;


$(document).ready(function () 
{
    carregarApiAtendimentoMiddle();
    inicializarTodosOsDataTableIndicadores();
    exibirDataTableAtendimentoPorTipo("#exibirAtendimentoRotina", "#volumeAtendimentoRotina", _tabelaListaAtendimentoRotina);  
    exibirDataTableAtendimentoPorTipo("#exibirAtendimentoConsultoria", "#volumeAtendimentoConsultoria", _tabelaListaAtendimentoConsultoria); 
    // restringirPorLoteDadosNoDataTableTabelaAtendimentoPorAssistente();
    // selectCaseComPeriodos();
    // atualizaDadosDataTablePorLote();
    // atualizaDataTablePorLote();
});

function exibirDataTableAtendimentoPorTipo(_botao, _div, _tabela) 
{
    $(_botao).on("click", function () 
    {
        if ($(_div).hasClass("collapsed-box")) 
        {            
            $(`${_botao} i`).addClass("fa-minus")
            $(`${_botao} i`).removeClass("fa-plus")
            $(_div).removeClass("collapsed-box")
            _tabela.draw(false);
        } else {            
            $(`${_botao} i`).removeClass("fa-minus")
            $(`${_botao} i`).addClass("fa-plus")
            $(_div).addClass("collapsed-box")
        }
    });
}

function carregarApiAtendimentoMiddle() 
{
    $.ajax(
    {
        method: "GET",
        url: "http://www.ceopc.hom.sp.caixa/api/public/atendimento_web_relatorio_indicadores.php/indicadores_relatorio_atendimento_middle",
        // url: "../model/origemDados/queries/relatorio/json/indicadores_relatorio_atendimento_middle.json",
        dataType: "json",
    }
    ).done(function (json) 
    { 
        console.log(json);
        _jsonPizzaAtendimentoRotinaConsultoria = json[7].contagemPizzaAtendimentos
        _jsonContagemPorCanalAtendimento = json[1].contagemCanalAtendimento
        _jsonMediaNotasPesquisa = json[2].contagemPesquisasEnviadasPesquisasRespondidasMediaNotasGeral
        _jsonListaAtendimentoRotina = json[10].contagemAtendimentoRotinaPorNomeAtividade
        _jsonListaAtendimentoConsultoria = json[11].contagemAtendimentoConsultoriaPorNomeAtividade
        _jsonAtendimentosPorDire = json[0].contagemAtendimentosUfDire
        _jsonAtendimentoPorAssistente = json[5].contagemAtendimentosorAssistenteGeral
        _jsonPesquisasEnviadasRespondidasPorAssistente = json[3].contagemPesquisasEnviadasPesquisasRespondidasMediaNotasPorAssistenteGeral
        _jsonListaFeedbackAtendimentos = json[8].feedbackAtendidosGeral

        capturaDadosPerfilUsuario(json[12].dadosEmpregadoCeopc);
        // if (_perfilEmpregado == "GESTOR" || _celulaEmpregado == "TI" || _eventualCelula == "SIM" || _eventualCeopc == "SIM") 
        // {
            carregaDadosNosChartsAndDataTableGestores(json); 
        // } else {
        //     carregaDadosNosChartsAndDataTableEmpregados(json); 
        // }
    }
    ).fail(function (jqXHR, textStatus, errorThrown) 
    {
        console.log("deu erro");
        alert('Problemas ao tentar salvar!\n' + jqXHR.status + ' ' + jqXHR.statusText + errorThrown);
    });
}

function capturaDadosPerfilUsuario(json)
{
    _celulaEmpregado = json.nomeCelula;
    _perfilEmpregado = json.nivelAcesso;
    _eventualCelula = json.eventualCelula;
    _eventualCeopc = json.eventualCeopc;
}

function carregaDadosNosChartsAndDataTableGestores(json)
{
    atualizarDadosChartPizzaAtendimentoRotinaConsultoria(_jsonPizzaAtendimentoRotinaConsultoria);
    atualizarDataTablePizzaAtendimentoRotinaConsultoria(_jsonPizzaAtendimentoRotinaConsultoria);
    atualizarDadosChartPorCanalAtendimento(_jsonContagemPorCanalAtendimento);
    atualizarDataTablePorCanalAtendimento(_jsonContagemPorCanalAtendimento);
    atualizarDadosChartMediaNotasPesquisa(_jsonMediaNotasPesquisa);
    atualizarDataTableMediaNotasPesquisa(_jsonMediaNotasPesquisa);
    atualizarDataTableListaAtendimentoRotina(_jsonListaAtendimentoRotina);
    atualizarDataTableListaAtendimentoConsultoria(_jsonListaAtendimentoConsultoria);
    atualizarDataTableAtendimentosPorDire(_jsonAtendimentosPorDire);
    atualizarDataTableAtendimentoPorAssistente(_jsonAtendimentoPorAssistente);
    atualizarDataTablePesquisasEnviadasRespondidasPorAssistente(_jsonPesquisasEnviadasRespondidasPorAssistente);
    atualizarDataTableFeedbackAtendimentos(_jsonListaFeedbackAtendimentos);
}

// function carregaDadosNosChartsAndDataTableEmpregados(json)
// {
//     atualizarDadosChartPizzaAtendimentoRotinaConsultoria(json[7].contagemPizzaAtendimentos);
//     atualizarDataTablePizzaAtendimentoRotinaConsultoria(json[7].contagemPizzaAtendimentos);
//     atualizarDadosChartPorCanalAtendimento(json[1].contagemCanalAtendimento);
//     atualizarDataTablePorCanalAtendimento(json[1].contagemCanalAtendimento);
//     atualizarDadosChartMediaNotasPesquisa(json[2].contagemPesquisasEnviadasPesquisasRespondidasMediaNotasGeral);
//     atualizarDataTableMediaNotasPesquisa(json[2].contagemPesquisasEnviadasPesquisasRespondidasMediaNotasGeral);
//     atualizarDataTableListaAtendimentoRotina(json[10].contagemAtendimentoRotinaPorNomeAtividade);
//     atualizarDataTableListaAtendimentoConsultoria(json[11].contagemAtendimentoConsultoriaPorNomeAtividade);
//     atualizarDataTableAtendimentosPorDire(json[0].contagemAtendimentosUfDire);
//     atualizarDataTableAtendimentoPorAssistente(json[6].contagemAtendimentosPorAssistente);
//     atualizarDataTablePesquisasEnviadasRespondidasPorAssistente(json[4].contagemPesquisasEnviadasPesquisasRespondidasMediaNotasPorAssistente);
//     atualizarDataTableFeedbackAtendimentos(json[9].feedbackAtendidosAssistente);
// }

/*------------------------------------------------*/

function atualizarDadosChartMediaNotasPesquisa(json)
{
    chartData =
    {
        labels: ['Cordialidade', 'Domínio', 'Tempestividade'],
        datasets: [{
            data: [json[0].mediaCordialidade, json[0].mediaDominio, json[0].mediaTempestividade],
            backgroundColor: [
                'rgba(233, 129, 12, 0.4)',
                'rgba(50, 52, 53, 0.4)',
                'rgba(223, 210, 206, 0.9)'
            ],
            borderColor: [
                'rgba(233, 129, 12, 1)',
                'rgba(50, 52, 53, 1)',
                'rgba(223, 210, 206, 1)'
            ],
            borderWidth: 1
        }]
    },

    chartOptions = 
    {
        responsive: true,
        // showAllTooltips: true,
        legend: {
            display: false,
            position: 'bottom',
        },
        title: {
            display: false,
            text: 'Lote: ' + json[0].lote
        },
        animation: {
            animateScale: true,
            animateRotate: true
        },
        scales: {
            yAxes: [{
                ticks: {
                    min: 4.5,
                    stepSize: 0.05
                }
            }]
        }
    },

    chart = new Chart(document.getElementById('ChartMediaNotasPesquisa').getContext('2d'), 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: chartData,
        options: chartOptions,
        
    });
}

function atualizarDataTableMediaNotasPesquisa(json) 
{
    _tabelaMediaNotasPesquisa.clear().draw(false);
    if (json != undefined && json != "") 
    {
        _tabelaMediaNotasPesquisa.rows.add(json).draw(true);
    }
} 

/*------------------------------------------------*/

function atualizarDadosChartPizzaAtendimentoRotinaConsultoria(json)
{
    chartData =
    {
        labels: ['Rotina', 'Consultoria'],
        datasets: [{
            data: [json[0].rotina, json[0].consultoria],
            backgroundColor: [
                'rgba(233, 129, 12, 0.4)',
                'rgba(50, 52, 53, 0.4)',
            ],
            borderColor: [
                'rgba(233, 129, 12, 1)',
                'rgba(50, 52, 53, 1)',
            ],
            borderWidth: 1
        }]
    },

    chartOptions = 
    {
        responsive: true,
        // showAllTooltips: true,
        legend: {
            position: 'bottom',
        },
        title: {
            display: false,
            text: 'Lote: ' + json[0].lote
        },
        animation: {
            animateScale: true,
            animateRotate: true
        },
    },

    chart = new Chart(document.getElementById('ChartPizzaAtendimentoRotinaConsultoria').getContext('2d'), 
    {
        // The type of chart we want to create
        type: 'pie',

        // The data for our dataset
        data: chartData,
        options: chartOptions,
        
    });
}

function atualizarDataTablePizzaAtendimentoRotinaConsultoria(json) 
{
    _tabelaPizzaContagemAtendimentos.clear().draw(false);
    if (json != undefined && json != "") 
    {
        _tabelaPizzaContagemAtendimentos.rows.add(json).draw(true);
    }
} 

function atualizarDadosChartPorCanalAtendimento(json)
{
    chartData =
    {
        labels: ['E-mail', 'Lync', 'Telefone'],
        datasets: [{
            data: [json[0].email, json[0].lync, json[0].telefone],
            backgroundColor: [
                'rgba(233, 129, 12, 0.4)',
                'rgba(50, 52, 53, 0.4)',
                'rgba(223, 210, 206, 0.9)'
            ],
            borderColor: [
                'rgba(233, 129, 12, 1)',
                'rgba(50, 52, 53, 1)',
                'rgba(223, 210, 206, 1)'
            ],
            borderWidth: 1
        }]
    },

    chartOptions = 
    {
        responsive: true,
        // showAllTooltips: true,
        legend: {
            position: 'bottom',
        },
        title: {
            display: false,
            text: 'Lote: ' + json[0].lote
        },
        animation: {
            animateScale: true,
            animateRotate: true
        },
    },

    chart = new Chart(document.getElementById('ChartPorCanalAtendimento').getContext('2d'), 
    {
        // The type of chart we want to create
        type: 'pie',

        // The data for our dataset
        data: chartData,
        options: chartOptions,
        
    });
}

function atualizarDataTablePorCanalAtendimento(json) 
{
    _tabelaPorCanalAtendimento.clear().draw(false);
    if (json != undefined && json != "") 
    {
        _tabelaPorCanalAtendimento.rows.add(json).draw(true);
    }
}

function atualizarDataTableMediaNotasPesquisa(json) 
{
    _tabelaMediaNotasPesquisa.clear().draw(false);
    if (json != undefined && json != "") 
    {
        _tabelaMediaNotasPesquisa.rows.add(json).draw(true);
    }
}

function atualizarDataTableListaAtendimentoRotina(json) 
{
    _tabelaListaAtendimentoRotina.clear().draw(false);
    if (json != undefined && json != "") 
    {
        _tabelaListaAtendimentoRotina.rows.add(json).draw(true);
    }
}

function atualizarDataTableListaAtendimentoConsultoria(json) 
{
    _tabelaListaAtendimentoConsultoria.clear().draw(false);
    if (json != undefined && json != "") 
    {
        _tabelaListaAtendimentoConsultoria.rows.add(json).draw(true);
    }
}

function atualizarDataTableAtendimentosPorDire(json) 
{
    _tabelaAtendimentosPorDire.clear().draw(false);
    if (json != undefined && json != "") 
    {
        _tabelaAtendimentosPorDire.rows.add(json).draw(true);
    }
}

function atualizarDataTableAtendimentoPorAssistente(json) 
{
    _tabelaAtendimentoPorAssistente.clear().draw(false);
    if (json != undefined && json != "") 
    {
        _tabelaAtendimentoPorAssistente.rows.add(json).draw(true);
    }
}

function atualizarDataTablePesquisasEnviadasRespondidasPorAssistente(json) 
{
    _tabelaPesquisasEnviadasRespondidasPorAssistente.clear().draw(false);
    if (json != undefined && json != "") 
    {
        _tabelaPesquisasEnviadasRespondidasPorAssistente.rows.add(json).draw(true);
    }
}

function atualizarDataTableFeedbackAtendimentos(json) 
{
    _tabelaFeedbackAtendimentos.clear().draw(false);
    if (json != undefined && json != "") 
    {
        _tabelaFeedbackAtendimentos.rows.add(json).draw(true);
    }
}

/*------------------------------------------------*/

function inicializarTodosOsDataTableIndicadores() 
{
    _tabelaPizzaContagemAtendimentos = $('#tabelaPizzaContagemAtendimentos').DataTable(
    {
        scrollCollapse: true,
        paging: false,
        lengthChange: false,
        pageLength: 10,
        bSort: true,
        searching: false,
        order: [0, "desc"],
        bAutoWidth: true,
        responsive: true,
        bInfo: false,
        columns: 
        [
            { data: "lote", title: "Lote", class: "dt-center"},
            { data: "rotina", title: "Rotina", class: "dt-center"},
            { data: "consultoria", title: "Consultoria", class: "dt-center"}, 
            { data: "total", title: "Total", class: "dt-center"} 
        ]
    });

    _tabelaPorCanalAtendimento = $('#tabelaPorCanalAtendimento').DataTable(
    {
        scrollCollapse: true,
        paging: false,
        lengthChange: false,
        pageLength: 10,
        bSort: true,
        searching: false,
        order: [0, "desc"],
        bAutoWidth: true,
        responsive: true,
        bInfo: false,
        columns: 
        [
            { data: "lote", title: "Lote", class: "dt-center"},
            { data: "email", title: "E-mail", class: "dt-center"},
            { data: "lync", title: "Lync", class: "dt-center"}, 
            { data: "telefone", title: "Telefone", class: "dt-center"},
            { data: "total", title: "Total", class: "dt-center"} 
        ]
    });

    _tabelaMediaNotasPesquisa = $('#tabelaMediaNotasPesquisa').DataTable(
    {
        scrollCollapse: true,
        paging: false,
        lengthChange: false,
        pageLength: 10,
        bSort: true,
        searching: false,
        order: [0, "desc"],
        bAutoWidth: true,
        responsive: true,
        bInfo: false,
        columns: 
        [
            { data: "lote", title: "Lote", class: "dt-center"},
            { data: "pesquisaEnviadas", title: "Pesquisas Enviadas", class: "dt-center"},
            { data: "pesquisasRespondidas", title: "Pesquisas Respondidas", class: "dt-center"}, 
            { data: "mediaCordialidade", title: "Média Cordialidade", class: "dt-center"},
            { data: "mediaDominio", title: "Média Domínio", class: "dt-center"},
            { data: "mediaTempestividade", title: "Média Tempestividade", class: "dt-center"},
            { data: "mediaAtendimentoMiddle", title: "Nota Conquiste.Caixa", class: "dt-center"}
        ]
    });

    _tabelaListaAtendimentoRotina = $('#tabelaAtendimentoRotina').DataTable(
    {
        scrollCollapse: false,
        scrollY: "440px",
        paging: true,
        lengthChange: false,
        pageLength: 15,
        bSort: true,
        searching: true,
        order: [0, "desc", 2, "desc"],
        bAutoWidth: true,
        responsive: true,
        bInfo: false,
        columns: 
        [
            { data: "lote", title: "Lote", class: "dt-center"},
            { data: "nomeRotina", title: "Nome atividade de Rotina", class: "dt-center"},
            { data: "quantidade", title: "Quantidade", class: "dt-center"}, 
        ]
    });

    _tabelaListaAtendimentoConsultoria = $('#tabelaAtendimentoConsultoria').DataTable(
    {
        scrollCollapse: false,
        scrollY: "440px",
        paging: true,
        lengthChange: false,
        pageLength: 15,
        bSort: true,
        searching: true,
        order: [0, "desc", 2, "desc"],
        bAutoWidth: true,
        responsive: true,
        bInfo: false,
        columns: 
        [
            { data: "lote", title: "Lote", class: "dt-center"},
            { data: "nomeConsultoria", title: "Nome atividade de Rotina", class: "dt-center"},
            { data: "quantidade", title: "Quantidade", class: "dt-center"}, 
        ]
    });

    _tabelaAtendimentosPorDire = $('#tabelaAtendimentosPorDire').DataTable(
    {
        scrollCollapse: true,
        paging: false,
        lengthChange: false,
        pageLength: 10,
        bSort: true,
        searching: false,
        order: [0, "desc"],
        bAutoWidth: true,
        responsive: true,
        bInfo: false,
        columns: 
        [
            { data: "lote", title: "LOTE", class: "dt-center"},
            { data: "direA", title: "DIRE A", class: "dt-center"},
            { data: "direB", title: "DIRE B", class: "dt-center"},
            { data: "direCD", title: "DIRE C e D", class: "dt-center"},
            { data: "direE", title: "DIRE E", class: "dt-center"},
            { data: "direF", title: "DIRE F", class: "dt-center"},
            { data: "direG", title: "DIRE G", class: "dt-center"},
            { data: "direH", title: "DIRE H", class: "dt-center"},
            { data: "direOutros", title: "SEM DIRE", class: "dt-center"},
            { data: "total", title: "TOTAL", class: "dt-center"}, 
        ]
    });

    _tabelaAtendimentoPorAssistente = $('#tabelaAtendimentoPorAssistente').DataTable(
    {
        scrollCollapse: true,
        paging: true,
        lengthChange: false,
        pageLength: 14,
        bSort: true,
        searching: true,
        order: [0, "desc"],
        bAutoWidth: true,
        responsive: true,
        bInfo: false,
        columns: 
        [
            { data: "lote", title: "Lote", class: "dt-center"},
            { data: "matriculaCeopc", title: "Matricula", class: "dt-center"},
            { data: "nome", title: "Assistente", class: "dt-center"},
            { data: "rotina", title: "Atendimentos rotina", class: "dt-center"},
            { data: "consultoria", title: "Atendimentos consultoria", class: "dt-center"},
            { data: "totalAtendimentoMes", title: "Total de atendimentos", class: "dt-center"},
        ]
    });

    _tabelaPesquisasEnviadasRespondidasPorAssistente = $('#tabelaPesquisasEnviadasRespondidasPorAssistente  ').DataTable(
    {
        scrollCollapse: true,
        paging: true,
        lengthChange: false,
        pageLength: 14,
        bSort: true,
        searching: true,
        order: [0, "desc"],
        bAutoWidth: true,
        responsive: true,
        bInfo: false,
        columns: 
        [
            { data: "lote", title: "Lote", class: "dt-center"},
            { data: "matricula", title: "Matricula", class: "dt-center"},
            { data: "nome", title: "Assistente", class: "dt-center"},
            { data: "pesquisasEnviadas", title: "Pesquisas enviadas", class: "dt-center"},
            { data: "pesquisasRespondidas", title: "Pesquisas respondidas", class: "dt-center"},
            { data: "mediaCordialidade", title: "Média Cordialidade", class: "dt-center"},
            { data: "mediaDominio", title: "Média Domínio", class: "dt-center"},
            { data: "mediaTempestividade", title: "Média Tempestividade", class: "dt-center"},
        ]
    });

    _tabelaFeedbackAtendimentos = $('#tabelafeedbackAtendimentos').DataTable(
    {
        scrollCollapse: true,
        paging: true,
        lengthChange: true,
        pageLength: 8,
        bSort: true,
        searching: true,
        order: [0, "desc"],
        bAutoWidth: true,
        responsive: true,
        bInfo: true,
        columns: 
        [
            { data: "id", title: "ID", class: "dt-center"},
            { data: "dataEnvioPesquisa", title: "Data envio", class: "dt-center"},
            { data: "nome", title: "Assistente", class: "dt-center"},
            { data: "nomeAtividade", title: "Consultoria", class: "dt-center"},
            { data: "unidadeDemandante", title: "Unidade", class: "dt-center"},
            { data: "observacaoCeopc", title: "Observação Middle", class: "dt-center"},
            { data: "dataRespostaPesquisa", title: "Data resposta", class: "dt-center"},
            { data: "notaCordialidade", title: "Cordialidade", class: "dt-center"},
            { data: "notaDominio", title: "Domínio", class: "dt-center"},
            { data: "notaTempestividade", title: "Tempestividade", class: "dt-center"},
            { data: "feedbackAtendido", title: "Feedback atendido", class: "dt-center"},
        ]
    });
}

/*------------------------------------------------*/

/** 
 * SCRIPT PARA TROCAR AS TABELAS
 * AGORA FICARÁ SOMENTE UMA ABERTA POR VEZ, PARA FACILITAR A EXPERIÊNCIA DO USUÁRIO 
 */
$('.collapse').on('show.bs.collapse', function () 
{
    $('.collapse.in').collapse('hide');
}); 