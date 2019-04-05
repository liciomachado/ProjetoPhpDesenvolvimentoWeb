<?php require 'validaLogin.php'; ?>

  <?php if (isset($_SESSION['msg'])): ?>
        <div class="msg">
          <?php
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
          ?>
        </div>
  <?php endif ?>
 
  <table>
    <thead>
      <tr>
        <th>Descricao</th>
        <th>Preço</th>
        <th>Foto</th>
        <th colspan="2">Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
          <td><?php echo $row['descricao']; ?></td>
          <td><?php echo $row['preco']; ?></td>
          <td><?php echo $row['foto']; ?></td>
          <td>
            <a class="edit_btn" href="index.php?edit=<?php echo $row['id_produtos']; ?>">Editar</a>
          </td>
          <td>
            <a class="del_btn" href="server.php?del=<?php echo $row['id_produtos']; ?>">Delete</a>
          </td>

        </tr>
    <?php  } ?>

    </tbody>
  </table>

  <div class="container">
      <div class="row formulario">
        <div class="col-md-12">
          <div class="display-3">Produtos</div>
        </div>
      </div>
      <div class="row cadastro">
        <div class="col-md-12">
          <form class="form-group needs-validation justify-content-center" method="post" action="server.php" novalidate>
          <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="inputCodigo">Código</label>
                <input type="text" class="form-control" id="inputCodigo" placeholder="Código" name="codigo" required="">
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
              <div class="form-group col-md-5">
                <label for="inputFoto">Foto: </label>
                <input type="file" class="form-control border-0" id="inputFoto" name="foto" value="<?php echo $foto; ?>" required>
              </div>
            </div>
            <div id="botao">
              <?php if ($edit_state == false): ?>
                  <button type="submit" class="btn btn-warning mb-2" id="botao" name="save" class="btn">Gravar</button>
              <?php else: ?>
                   <button type="submit" class="btn btn-warning mb-2" id="botao" name="update" class="btn">Atualizar</button>
              <?php endif ?>
            </div>   
          </form>
        </div>
      </div>
  </div>