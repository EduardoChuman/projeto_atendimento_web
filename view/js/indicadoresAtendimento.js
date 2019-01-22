var _tabelaPizzaContagemAtendimentos;

$(document).ready(function () 
{
    carregarApiAtendimentoMiddle();
    inicializarTodosOsDataTableIndicadores();
});

function carregarApiAtendimentoMiddle() 
{
    $.ajax(
    {
        method: "GET",
        url: "http://www.ceopc.hom.sp.caixa/api/public/atendimento_web_relatorio_indicadores.php/indicadores_relatorio_atendimento_middle",
        dataType: "json",
    }
    ).done(function (json) 
    { 
        console.log(json);
        carregaDadosNosChartsAndDataTable(json);  
    }
    ).fail(function (jqXHR, textStatus, errorThrown) 
    {
        console.log("deu erro");
        alert('Problemas ao tentar salvar!\n' + jqXHR.status + ' ' + jqXHR.statusText + errorThrown);
    });
}

function carregaDadosNosChartsAndDataTable(json)
{
    atualizarDadosChartPizzaAtendimentoRotinaConsultoria(json[7].contagemPizzaAtendimentos);
    atualizarDataTablePizzaAtendimentoRotinaConsultoria(json[7].contagemPizzaAtendimentos);
    atualizarDadosChartPorCanalAtendimento(json[1].contagemCanalAtendimento);
    atualizarDataTablePorCanalAtendimento(json[1].contagemCanalAtendimento);
    atualizarDadosChartMediaNotasPesquisa(json[2].contagemPesquisasEnviadasPesquisasRespondidasMediaNotasGeral);
    atualizarDataTableMediaNotasPesquisa(json[2].contagemPesquisasEnviadasPesquisasRespondidasMediaNotasGeral);
}

/*------------------------------------------------*/

function atualizarDadosChartMediaNotasPesquisa(json)
{
    console.log(json); 
    console.log(typeof json);
    chartData =
    {
        labels: ['Cordialidade', 'Domínio', 'Tempestividade'],
        datasets: [{
            data: [json[0].mediaCordialidade, json[0].mediaDominio, json[0].mediaTempestividade],
            backgroundColor: [
                'rgba(233, 129, 12, 0.4)',
                'rgba(50, 52, 53, 0.4)',
                'rgba(223, 210, 206, 0.6)'
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
        console.log(_tabelaMediaNotasPesquisa);
    }
} 

/*------------------------------------------------*/

function atualizarDadosChartPizzaAtendimentoRotinaConsultoria(json)
{
    console.log(json); 
    console.log(typeof json);
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
        console.log(_tabelaPizzaContagemAtendimentos);
    }
} 

/*------------------------------------------------*/

function atualizarDadosChartPorCanalAtendimento(json)
{
    console.log(json); 
    console.log(typeof json);
    chartData =
    {
        labels: ['E-mail', 'Lync', 'Telefone'],
        datasets: [{
            data: [json[0].email, json[0].lync, json[0].telefone],
            backgroundColor: [
                'rgba(233, 129, 12, 0.4)',
                'rgba(50, 52, 53, 0.4)',
                'rgba(223, 210, 206, 0.6)'
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
        console.log(_tabelaPorCanalAtendimento);
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
            { data: "lote", title: "Lote", width: "25%", class: "dt-center"},
            { data: "rotina", title: "Rotina", width: "25%", class: "dt-center"},
            { data: "consultoria", title: "Consultoria", width: "25%", class: "dt-center"}, 
            { data: "total", title: "Total", width: "25%", class: "dt-center"} 
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
            { data: "lote", title: "Lote", width: "20%", class: "dt-center"},
            { data: "email", title: "E-mail", width: "20%", class: "dt-center"},
            { data: "lync", title: "Lync", width: "20%", class: "dt-center"}, 
            { data: "telefone", title: "Telefone", width: "20%", class: "dt-center"},
            { data: "total", title: "Total", width: "20%", class: "dt-center"} 
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
                { data: "lote", title: "Lote", width: "10%", class: "dt-center"},
                { data: "pesquisaEnviadas", title: "Pesquisas Enviadas", width: "18%", class: "dt-center"},
                { data: "pesquisasRespondidas", title: "Pesquisas Respondidas", width: "18%", class: "dt-center"}, 
                { data: "mediaCordialidade", title: "Média Cordialidade", width: "18%", class: "dt-center"},
                { data: "mediaDominio", title: "Média Domínio", width: "18%", class: "dt-center"},
                { data: "mediaTempestividade", title: "Média Tempestividade", width: "18%", class: "dt-center"}
            ]
        });
}

/** 
 * SCRIPT PARA TROCAR AS TABELAS
 * AGORA FICARÁ SOMENTE UMA ABERTA POR VEZ, PARA FACILITAR A EXPERIÊNCIA DO USUÁRIO 
 */
$('.collapse').on('show.bs.collapse', function () 
{
    $('.collapse.in').collapse('hide');
}); 

