function jogo(){
    
    this.url = "class/produtodao.php";
    
    this.listarjogos = function(tbody){
        
        tbody.empty();
        
        $.ajax({
            url : this.url
        }).done(function(dados){
            
            $.each(dados, function(key, val){
                
                tr = $("<tr />");
                
                tr.append($("<td />").text(val.idjogo));
                tr.append($("<td />").text(val.nome));
                tr.append($("<td />").text(val.preco));
                tr.append($("<td />").text(val.quantidade));
                tr.append($("<td />").text(val.marca));
                tr.append($("<td />").text(val.plataforma));
                
                var btnAlterar = $("<a />").attr({
                    class : "btn-floating right",
                    title : "Alterar registro",
                    href : "#modalAlterar"
                });
                
                icone = $("<i />").attr("class", "mdi-content-create");
                btnAlterar.append(icone);
                
                btnAlterar.click(function(){
                    jogo.abrirAlterajogo(val.idjogo, $("#formAlterajogo"));
                });
                
                var btnExcluir = $("<a />").attr({
                    class : "btn-floating right excluirjogo",
                    title : "Excluir jogo",
                    href : "#"
                });
                
                icone = $("<i />").attr("class", "mdi-content-clear");
                btnExcluir.append(icone);
                
                btnExcluir.click(function(){
                    jogo.excluir(val.idjogo);
                });
                
                tdBotoes = $("<td />");
                
                tdBotoes.append(btnAlterar);
                tdBotoes.append(btnExcluir);
                
                tr.append(tdBotoes);
                
                tbody.append(tr);
                
            });
            
        });
    };
    
    this.excluir = function(idjogo){
        if(confirm("Tem certeza que deseja excluir?")){
            $.ajax({
                url : this.url+"?passo=excluir&idjogo="+idjogo
            }).done(function(){
                jogo.listarjogos(tbljogos.find("tbody"));
            });
        }
    }
    
    this.cadastrar = function(form){
        $.post( this.url+"?passo=cadastrar", form.serialize() ).done(function(data){
            
            if(!data.erro){
                form.each(function(){
                    this.reset();
                });
                
                $("#modalCadastro").closeModal();
            }
            
            alert(data.msg);
            
            jogo.listarjogos(tbljogos.find("tbody"));
            
        });
    }
    
    this.abrirAlterajogo = function(idjogo, form){
        $("#cp_idjogo").val(idjogo);
        
        $.ajax({
            url : this.url+"?passo=dadosjogo&idjogo="+idjogo
        }).done(function(data){
            $("#cpalterar_nome").val(data[0].nome);
            $("#cpalterar_preco").val(data[0].preco);
            $("#cpalterar_quantidade").val(data[0].quantidade);
            $("#cpalterar_marca").val(data[0].marca);
            $("#cpalterar_plataforma").val(data[0].plataforma);
            
            $("#modalAlterar").openModal();
        });
        
    };
    
    this.executaAlteracao = function(form){
        $.post( this.url+"?passo=alterar", form.serialize() ).done(function(data){
            
            if(!data.erro){
                form.each(function(){
                    this.reset();
                });
                
                $("#modalAlterar").closeModal();
            }
            
            alert(data.msg);
            
            jogo.listarjogos(tbljogos.find("tbody"));
            
        });
    }
    
}