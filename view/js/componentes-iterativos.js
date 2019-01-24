// colocando neste arquivo funções que acrescentam iteratividade à página;

        
	/* Começo: Esta função altera dinamicamente o mês na página de indicadores */
    	
    	function pegaMesAtual(){
            var agora = new Date;
            var meses = ['Janeiro', 'Fevereiro', 'Março','Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro','Novembro','Dezembro'];
            let hoje = agora.getMonth();
            return meses[hoje] + ' de ' + agora.getFullYear();
        }
        
        var mesAtual = document.querySelector("#mes-atual");
        mesAtual.textContent = pegaMesAtual();

    /* FIM: Esta função altera dinamicamente o mês na página de indicadores */