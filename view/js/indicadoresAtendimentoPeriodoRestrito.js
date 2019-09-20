var _tabelaAtendimentoPorAssistenteComPeriodoRestrito = "";

function selectCaseComPeriodos()
{
    _data = new Date();
    _mesAtual = moment(_data).locale('pt-br').format('YYYY/MM');
    _mesAtualExtenso = moment(_data).locale('pt-br').format('MMMM/YYYY');
    _mesPassado = moment(_mesAtual).locale('pt-br').subtract(1, 'months').format('YYYY/MM');
    _mesPassadoExtenso = moment(_mesAtual).locale('pt-br').subtract(1, 'months').format('MMMM/YYYY');
    _doisMesesAtras = moment(_mesAtual).locale('pt-br').subtract(2, 'months').format('YYYY/MM');
    _doisMesesAtrasExtenso = moment(_mesAtual).locale('pt-br').subtract(2, 'months').format('MMMM/YYYY');

    var selectMeses = "";
    selectMeses = "<option value='" + _mesAtual + "'>" + _mesAtualExtenso + "</option>";  
    selectMeses += "<option value='" + _mesPassado + "'>" + _mesPassadoExtenso + "</option>";
    selectMeses += "<option value='" + _doisMesesAtras + "'>" + _doisMesesAtrasExtenso + "</option>";
    selectMeses = "<option disabled selected value>Selecione o mês desejado...</option>" + selectMeses;

    $('#mesBaseIndicadores').html(selectMeses);
}

function restringirPorLoteDadosNoDataTableTabelaAtendimentoPorAssistente() 
{
    $("#mesBaseIndicadores").on("change", function () 
    {
        var mes = $(this).val();
        _dataTableComPeriodoRestrito = new Array();        
        _tabelaAtendimentoPorAssistente = _jsonAtendimentoPorAssistente;

        $.each(_tabelaAtendimentoPorAssistente, function (idx, item) 
        {
            if (item.lote == mes) 
            {
                console.log('chegou');
                _dataTableComPeriodoRestrito.push(item);
            }
        }); 

        atualizaDadosDataTablePorLote(_dataTableComPeriodoRestrito);
    });
}

function atualizaDadosDataTablePorLote(_dataTableComPeriodoRestrito) 
{
    if(_tabelaAtendimentoPorAssistenteComPeriodoRestrito != undefined && _tabelaAtendimentoPorAssistenteComPeriodoRestrito != "" && _tabelaAtendimentoPorAssistenteComPeriodoRestrito != null)
    {
        _tabelaAtendimentoPorAssistenteComPeriodoRestrito.clear().draw(false);
    }
    if (_dataTableComPeriodoRestrito != undefined && _dataTableComPeriodoRestrito != "") 
    {
        _tabelaAtendimentoPorAssistenteComPeriodoRestrito.rows.add(_dataTableComPeriodoRestrito).draw(false);
    }
}

function atualizaDataTablePorLote()
{
    _tabelaAtendimentoPorAssistenteComPeriodoRestrito = $('#tabelaAtendimentoPorAssistente').DataTable(
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
}

/*------------------------------------------------*/