    //Todas as funções deste documento dependem do formulário que estão
    //associadas, mais precisamente ao select que estão associadas, ou seja,
    //ao mudar a opção os valores também mudam


    //Função que permite escolher as corridas que um piloto não participou, ou
    //seja, existe um pedido à página corridaDisponivel.php e a resposta dessa
    //página são as corridas que o piloto não participou, esse resultado é
    //substituido no div que inicialmente está invisível
    function corridaDisponivel(str){
 
		xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(str != 0){
                    document.getElementById("corridaBlock").style.display = "block";
                    document.getElementById("pontosBlock").style.display = "none";
                    document.getElementById("corrida").innerHTML = this.responseText;
                }
                else{
                    document.getElementById("corridaBlock").style.display = "none";
                    document.getElementById("pontosBlock").style.display = "none";
                }
            }
        };
		xmlhttp.open("GET","?p=corridaDisponivel&id="+str,true);
		xmlhttp.send();	
    }

    //Faz o mesmo que a função anterior, mas desta vez, após a escolha da
    //corrida os pontos que serão atribuidos não podem ser repetidos, pelo que
    //a página pontosDisponiveis.php devolve apenas os valores que não foram
    //utilizados e substitui novamente num div que está invisível
    function pontosDisponiveis(str){
 
        xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(str != 0){
                    document.getElementById("pontosBlock").style.display = "block";
                    document.getElementById("pontos").innerHTML = this.responseText;
                }
                else{
                    document.getElementById("pontosBlock").style.display = "none";
                }
            }
        };
        xmlhttp.open("GET","?p=pontosDisponiveis&ordem="+str,true);
        xmlhttp.send(); 
    }

	//Funcão parecida as anteriores, permite ver os pontos dos pilotos da equipa selecionada
	function pontuacaoPiloto(str){
		
		xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				if(str != 0){
                    document.getElementById("pontuacaoPiloto").style.display = "block";
                    document.getElementById("pontuacaoPiloto").innerHTML = this.responseText;
                }
                else{
                    document.getElementById("pontuacaoPiloto").style.display = "none";
                }
            }
        };
        xmlhttp.open("GET","includes/frontoffice/pontuacaoPiloto.php?sigla="+str,true);
        xmlhttp.send(); 
	}
	
    //Novamente parecida as anteriores, esta função devolve as pontuações dos pilotos pelas corridas
	function pontuacaoCorrida(str){
		
		xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				if(str != 0){
                    document.getElementById("pontuacaoCorrida").style.display = "block";
                    document.getElementById("pontuacaoCorrida").innerHTML = this.responseText;
                }
                else{
                    document.getElementById("pontuacaoCorrida").style.display = "none";
                }
            }
        };
        xmlhttp.open("GET","includes/frontoffice/pontuacaoCorrida.php?ordem="+str,true);
        xmlhttp.send(); 
	}