<?php require 'validaLogin.php'; ?>
<?php require 'tempoSession.php'; ?>

<?php 

    $id = '';
    $nome = '';
    $endereco = '';
    $numero = '';
    $observacao = '';
    $cep = '';
    $bairro = '';
    $cidade = '';
    $estado = '';
    $telefone = '';
    $email = '';

  if ($editaCliente = true) {
    $filtro = array('auxId' => $idCliente);
      $rs = $pdo->prepare("SELECT id_cliente,nome,endereco,numero,observacao,cep,bairro,cidade,estado,telefone,email FROM tb_clientes WHERE id_cliente LIKE :auxId");
      if ($rs->execute($filtro)) {
        if ($rs->rowCount() > 0) {
          while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
          $id = $row->id_cliente;
          $nome = $row->nome;
          $endereco = $row->endereco;
          $numero = $row->numero;
          $observacao = $row->observacao;
          $cep = $row->cep;
          $bairro = $row->bairro;
          $cidade = $row->cidade;
          $estado = $row->estado;
          $telefone = $row->telefone;
          $email = $row->email;
          }
        }
      }
  }
?>

<div class="container">
    <div class="row formulario">
      <div class="col-md-12">
        <div class="display-3">Cadastro de Clientes</div>
      </div>
    </div>
    <div class="row cadastro">
      <div class="col-md-12">
        <form class="form-group needs-validation justify-content-center" method="post" action="bd/acaoCliente.php"  novalidate>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputCodigo">Código: </label>
              <input type="text" class="form-control" id="inputCodigo" placeholder="Código" name="codigo" value="<?php echo $id; ?>">
            </div>
            <div class="form-group col-md-8 ">
              <label for="inputName">Nome do Cliente: </label><br>
              <input type="text" class="form-control" id="inputName" required name="nome" value="<?php echo $nome; ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-8">
            <label for="inputAddress">Endereço</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="" required="" name="endereco" value="<?php echo $endereco; ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="numero">Número</label>
            <input type="text" class="form-control" id="numero" placeholder="" required="" name="numero" value="<?php echo $numero; ?>">
          </div>
        </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputObs">Observação: </label>
              <input type="text" class="form-control" id="inputObs" placeholder="Observação" name="obs" value="<?php echo $observacao; ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="cep">CEP: </label>
              <input type="text" class="form-control" id="cep" placeholder="88500-XXX" required="" name="cep" value="<?php echo $cep; ?>">
            </div>
             <div class="form-group col-md-3">
              <label for="inputBairro">Bairro:</label>
              <input type="text" class="form-control" id="inputBairro" required="" name="bairro" value="<?php echo $bairro; ?>">
            </div>
            <div class="form-group col-md-3">
              <label for="cidade">Cidade: </label>
              <input type="text" class="form-control" id="cidade" required="" name="cidade" value="<?php echo $cidade; ?>">
            </div>
             <div class="form-group col-md-3">
              <label for="estado">Estado</label>
              <select id="estado" name="estado" class="form-control" value="<?php echo $estado; ?>">
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
                <option value="ES">Estrangeiro</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
            <label for="phone_with_ddd">Telefone</label>
            <input type="text" class="form-control" id="phone_with_ddd" placeholder="(__) _____-____" required="" name="telefone" value="<?php echo $telefone; ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="email">E-mail: </label>
            <input type="email" class="form-control" id="email" placeholder="" required="" name="email" value="<?php echo $email; ?>">
          </div>
          </div>
          <div id="botao">
          <?php  
            if ($_SESSION['editaCliente'] == true) {
              $_SESSION['editaCliente'] = false;
              echo'<button type="submit" name="editaCliente" class="btn btn-warning mb-2" id="botao">Atualizar</button>';
            }else {
              echo '<button type="submit" name="cadastrarCliente" class="btn btn-warning mb-2" id="botao">Cadastrar</button>';
            }
          ?>
          </div>
        </form>
      </div>
    </div>
  </div>
    <div class="jumbotron jumbotron-fluid py-3">
    <footer class="footer-copyright text-center py-3">
      @ Mauricio Machado Da Rosa
    </footer>
  </div>
</div>
</body>
