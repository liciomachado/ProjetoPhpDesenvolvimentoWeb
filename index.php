<?php include('server.php');

  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_state = true;
    $rec = mysqli_query($db, "SELECT * FROM produtos WHERE id_produtos=$id");
    $record = mysqli_fetch_array($rec);
    $descricao = $record['descricao'];
    $preco = $record['preco'];
    $foto = $record['foto'];
    $id = $record['id_produtos'];
  }
  

  session_cache_expire(30);
  session_start();
?>
<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bem Vindo</title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">


  </head>

<?php if ($_SESSION['logado'] == false): ?>
  <?php include 'indexLogin.php'; ?>
<?php else: ?>
  <?php include 'index2.php'; ?>
<?php endif; ?>

  <script>
      function carregaAdiciona(id,x1,x2,x3){
          var elemento = document.getElementById(id);
          var elementox1 = document.getElementById(x1);
          var elementox2 = document.getElementById(x2);
          var elementox3 = document.getElementById(x3);

              elemento.style.display = 'block';
              elementox1.style.display = 'none';
              elementox2.style.display = 'none';
              elementox3.style.display = 'none';
      }

      function carregaProdutos(id,x1,x2,x3){
          var elemento = document.getElementById(id);
          var elementox1 = document.getElementById(x1);
          var elementox2 = document.getElementById(x2);
          var elementox3 = document.getElementById(x3);

              elemento.style.display = 'block';
              elementox1.style.display = 'none';
              elementox2.style.display = 'none';
              elementox3.style.display = 'none';


      }
      function carregaClientes(id,x1,x2,x3){
          var elemento = document.getElementById(id);
          var elementox1 = document.getElementById(x1);
          var elementox2 = document.getElementById(x2);
          var elementox3 = document.getElementById(x3);

              elemento.style.display = 'block';
              elementox1.style.display = 'none';
              elementox2.style.display = 'none';
              elementox3.style.display = 'none';

      }
      function carregaPedidos(id,x1,x2,x3){
          var elemento = document.getElementById(id);
          var elementox1 = document.getElementById(x1);
          var elementox2 = document.getElementById(x2);
          var elementox3 = document.getElementById(x3);

              elemento.style.display = 'block';
              elementox1.style.display = 'none';
              elementox2.style.display = 'none';
              elementox3.style.display = 'none';

      }

  </script>
</html>
