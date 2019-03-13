<div id="modalAlterar" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Alteração de jogo</h4>
      
        <div class="row">
          <form class="col s12" id="formAlterar">
            <div class="row">
              <div class="input-field col s6">
                <input id="cpalterar_nome" name="nome" type="text" class="validate" required>
                <label for="nome">Nome</label>
              </div>
              <div class="input-field col s6">
                <input id="cpalterar_preco" name="preco" type="text" class="validate" required>
                <label for="preco">Preço</label>
              </div>
              <div class="input-field col s6">
                <input id="cpalterar_quantidade" name="quantidade" type="text" class="validate" required>
                <label for="quantidade">Quantidade</label>
              </div>
              <div class="input-field col s6">
                <input id="cpalterar_marca" name="marca" type="text" class="validate" required>
                <label for="marca">Marca</label>
              </div>
              <div class="input-field col s6">
                <input id="cpalterar_plataforma" name="plataforma" type="text" class="validate" required>
                <label for="plataforma">Plataforma</label>
              </div>
            </div>
              
              <input type="hidden" name="idjogo" id="cp_idjogo" value="0">
              
          </form>
        </div>
        
        
    </div>
    <div class="modal-footer">
      <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Cancelar / Fechar</a>
        
        <a href="#" class="waves-effect waves-green btn-flat modal-action" id="btnAlterarjogo">Alterar Cadastro</a>
        
    </div>
  </div>