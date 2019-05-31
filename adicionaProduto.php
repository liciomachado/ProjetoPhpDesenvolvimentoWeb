<?php require 'validaLogin.php'; ?>
<?php require 'tempoSession.php'; ?>

<?php

    $id = "";
    $descricao = "";
    $preco = "";
    $foto = "";   

if ($_SESSION['editaProduto'] == true) {
    $id = $idProduto;
    $rec = mysqli_query($db, "SELECT * FROM tb_produtos WHERE id_produto = $id limit 1");
    $record = mysqli_fetch_object($rec);
    $descricao = $record->descricao;
    $preco = $record->valor;
    $foto = $record->imagem;
    $id = $record->id_produto;
  }
?>

<div class="container">
      <div class="row formulario">
        <div class="col-md-12">
          <div class="display-3">Produtos</div>
        </div>
      </div>   
      <div class="row cadastro">
        <div class="col-md-12">
          <form enctype="multipart/form-data" class="form-group needs-validation justify-content-center" method="post" action="server.php" novalidate>
          <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="inputCodigo">Código</label>
                <input type="text" class="form-control" id="inputCodigo" placeholder="Código" name="codigo" required="" value="<?php echo $id; ?>">
              </div>
              <div class="form-group col-md-10">
              <label for="inputDesc">Descrição</label>
              <input type="text" class="form-control" id="inputDesc" name="descricao" value="<?php echo $descricao; ?>" placeholder="Digite a descrição completa para a venda" required>
            </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputPreco">Preço</label>
                <input type="text" class="form-control" id="inputPreco" placeholder="R$: " name="preco" value="<?php echo $preco; ?>" required >
              </div>
              <?php echo "<img src='{$foto}' width='100' height='100' name='imagem' >"; ?>
              <div class="form-group col-md-5">
                <label for="inputFoto">Foto: </label>
                <input type="file" accept="image/*"; class="form-control border-0" id="inputFoto" name="imagem" value="<?php $_POST['imagem']?>" required>
              </div>

            </div>
            <div id="botao">
            <?php  
            if ($_SESSION['editaProduto'] == true) {
              $_SESSION['editaProduto'] = false;
              echo '<button type="submit" class="btn btn-warning mb-2" id="botao" name="update" class="btn">Atualizar</button>';
            }else {
              echo'<button type="submit" class="btn btn-warning mb-2" id="botao" name="save" class="btn">Gravar</button>';
            }
            ?>
              
            </div>   
          </form>
        </div>
      </div>
  </div>
  </body>