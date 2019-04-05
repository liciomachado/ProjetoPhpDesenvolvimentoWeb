<?php

$descricao =  "";
$preco = "";
$foto = null;
$id = 0;
$edit_state = false;

$db = mysqli_connect('localhost','root','','crud');
//inserir produtos
if (isset($_POST['save'])) {
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $foto = $_POST['foto'];

  $query = "INSERT INTO produtos(descricao, preco, foto) VALUES ('$descricao','$preco','$foto')";
    mysqli_query($db, $query);
    $_SESSION['msg'] = "Produto Salvo";
    header('location: index.php');
}
//atualizar produtos
  if (isset($_POST['update'])) {
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $foto = $_POST['foto'];
    $id = $_POST['id_produtos'];

    mysqli_query($db, "UPDATE produtos SET descricao='$descricao',preco='$preco' WHERE id_produtos=$id");
    $_SESSION['msg'] = "Produto atualizado";
    header('location: index.php');
  }
//deletar produtos
  if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM produtos WHERE id_produtos=$id");
	$_SESSION['message'] = "Produto Deletado!";
	header('location: index.php');
}

  $results = mysqli_query($db, "SELECT * FROM produtos");
  //
  if (isset($_POST['valida'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    if ($login = "mauricio" && $senha == 123) {
      $_SESSION['login'] = $login;
      $_SESSION['senha'] = $senha;
      $_SESSION['logado'] = true;
      header('location:index.php');
    }else {
      header('location:index.php');
    }
  }

 ?>
