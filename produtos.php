<?php require 'validaLogin.php'; ?>
<?php require 'tempoSession.php'; ?>
 
    <div class="col-md-12">
      <form action="index.php" method="post">
            <div id="botao">
            <button type="submit" class="btnX btn-warning mb-2" id="botao" name="adicionaProduto" >Adicionar Produto</button>
          </div>
      </form>
    </div>
  
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
      <?php 
        $query = "SELECT * FROM tb_produtos";

        if ($result = mysqli_query($db, $query)) {
          while ($row = mysqli_fetch_object ($result)) { ?>
            <tr>
              <td><?php echo $row->descricao; ?></td>
              <td><?php echo $row->valor; ?></td>
              <td><?php echo "<img src='{$row->imagem}' width='100' height='100' name='imagem' value='{$row->imagem}'>"; ?></td>
            
              <td>
                <a class="del_btn" href="server.php?del=<?php echo $row->id_produto; ?>">Delete</a>
              </td>
            
               <td><form action='index.php' method='POST' name="editaProduto{$row['id_produtos']}">
                  <input type='hidden' name='idProduto' value="<?php echo $row->id_produto;  ?>">
                  <button class='btn' type='submit' name='editaProduto'><i class='fas fa-edit'></i>Alterar</button>
                </form></td>
              
    
            </tr>
        
    
    <?php } } ?>
        
    </tbody>
  </table>

  </body>