var _tabelaPizzaContagemAtendimentos;

$(document).ready(function () 
{
    carregarGraficoPizzaContagemAtendimento();
    inicializarTabelaPizzaContagemAtendimento();
});

function carregarGraficoPizzaContagemAtendimento() 
{
    $.ajax(
    {
        method: "GET",
        url: "http://www.ceopc.hom.sp.caixa/api/public/atendimento_web_relatorio_indicadores.php/contagem_pizza_atendimentos",
        dataType: "json",
    }
    ).done(function (json) 
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
            }
        },

        chart = new Chart(document.getElementById('myChart').getContext('2d'), 
        {
            // The type of chart we want to create
            type: 'pie',

            // The data for our dataset
            data: chartData,
            options: chartOptions,
        });

        atualizarDataTable(json);
    }
    ).fail(function (jqXHR, textStatus, errorThrown) 
    {
        console.log("deu erro");
        alert('Problemas ao tentar salvar!\n' + jqXHR.status + ' ' + jqXHR.statusText + errorThrown);
    });
}

function inicializarTabelaPizzaContagemAtendimento() 
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
            { data: "lote", title: "LOTE", width: "20%", class: "dt-center"},
            { data: "rotina", title: "ROTINA", width: "40%", class: "dt-center"},
            { data: "consultoria", title: "CONSULTORIA", width: "40%", class: "dt-center"} 
        ]
    });
}

function atualizarDataTable(json) 
{
    _tabelaPizzaContagemAtendimentos.clear().draw(false);
    if (json != undefined && json != "") 
    {
        _tabelaPizzaContagemAtendimentos.rows.add(json).draw(true);
    }
} 

/** 
 * SCRIPT PARA TROCAR AS TABELAS
 * AGORA FICARÁ SOMENTE UMA ABERTA POR VEZ, PARA FACILITAR A EXPERIÊNCIA DO USUÁRIO 
 */
$('.collapse').on('show.bs.collapse', function () 
{
    $('.collapse.in').collapse('hide');
}); 