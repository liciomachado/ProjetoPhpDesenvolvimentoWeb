<?php

$db = mysqli_connect('localhost','root','','db_abc_bolinhas');
//inserir produtos
if (isset($_POST['save'])) {

    $encoded_image = "data:" . $_FILES['imagem']['type'] . ";base64," . base64_encode(file_get_contents($_FILES['imagem']['tmp_name']));

    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $foto = $encoded_image;
 
  $query = "INSERT INTO tb_produtos(descricao, valor, imagem) VALUES ('$descricao','$preco','$foto')";
    mysqli_query($db, $query);
    $_SESSION['msg'] = "Produto Salvo";
    header('location: index.php');
}
//atualizar produtos
  if (isset($_POST['update'])) {

    $encoded_image = "data:" . $_FILES['imagem']['type'] . ";base64," . base64_encode(file_get_contents($_FILES['imagem']['tmp_name']));
    $arquivo = $_FILES["imagem"]["tmp_name"];

    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $foto = $encoded_image;
    $id = $_POST['id'];
    if(empty($_FILES["imagem"]["tmp_name"])) {
      mysqli_query($db, "UPDATE tb_produtos SET descricao='$descricao',valor='$preco' WHERE id_produto=$id");
    }else {
      mysqli_query($db, "UPDATE tb_produtos SET descricao='$descricao',valor='$preco',imagem='$foto' WHERE id_produto=$id");
    }
    header('location: index.php');
  }
//deletar produtos
  if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM tb_produtos WHERE id_produto=$id");
  header('location: index.php');
}

  $query = mysqli_query($db, "SELECT * FROM produtos");
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
