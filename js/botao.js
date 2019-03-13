var jogo = new jogo();
var tbljogos = $("#tblListar");
var btncadastrarjogo = $("#btncadastrarjogo");
var btnAlterarjogo = $("#btnAlterarjogo");

(function($){
  $(function(){
      $('.modal-trigger').leanModal();
      
      jogo.listarjogos(tbljogos.find("tbody"));
      
      btncadastrarjogo.click(function(){
        jogo.cadastrar($("#formCadastro"));
      });
      
      btnAlterarjogo.click(function(){
        jogo.executaAlteracao($("#formAlterar"));
      });

  }); // end of document ready
})(jQuery); // end of jQuery name space