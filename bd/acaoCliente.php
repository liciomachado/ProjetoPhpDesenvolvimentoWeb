<?php
include 'conectaBanco.php';
  
    if(isset($_POST['cadastrarCliente'])) {
        $novo_cliente = array(
        ':nome' => $_POST['nome'], 
        ':endereco' => $_POST['endereco'], 
        ':numero' => $_POST['numero'], 
        ':observacao' => $_POST['obs'], 
        ':cep' => $_POST['cep'], 
        ':bairro' => $_POST['bairro'], 
        ':cidade' => $_POST['cidade'], 
        ':estado' => $_POST['estado'], 
        ':telefone' => $_POST['telefone'], 
        ':email' => $_POST['email']);

        $stmt = $pdo->prepare("INSERT INTO tb_clientes (nome,endereco,numero,observacao,cep,bairro,cidade,estado,telefone,email)
        VALUES (:nome,:endereco,:numero,:observacao,:cep,:bairro,:cidade,:estado,:telefone,:email)");
        $stmt->execute($novo_cliente);
        
        if ($stmt->rowCount() > 0) {
        header('location: ../index.php');
        } else {
        echo "<br><br><br>ERRO novo!!!!!";
        }
    }

    if(isset($_POST['deletaCliente'])) {
        $exclui_cliente = array(':id' => $_POST['idCliente']);
        $stmt = $pdo->prepare("DELETE FROM tb_clientes WHERE id_cliente = :id");
        $stmt->execute($exclui_cliente);
        
        if ($stmt->rowCount() > 0) {
        header('location: ../index.php');
        } else {
        echo "<br><br><br>ERRO Excluir!!!!!";
        }
    }

    if(isset($_POST['editaCliente'])) {
        $edit_cliente = array(
        ':id' => $_POST['codigo'], 
        ':nome' => $_POST['nome'], 
        ':endereco' => $_POST['endereco'], 
        ':numero' => $_POST['numero'], 
        ':observacao' => $_POST['obs'], 
        ':cep' => $_POST['cep'], 
        ':bairro' => $_POST['bairro'], 
        ':cidade' => $_POST['cidade'], 
        ':estado' => $_POST['estado'], 
        ':telefone' => $_POST['telefone'], 
        ':email' => $_POST['email']);

        $stmt = $pdo->prepare("UPDATE tb_clientes SET nome = :nome,endereco = :endereco,numero = :numero,observacao = :observacao,cep = :cep,bairro = :bairro,cidade = :cidade,estado = :estado,telefone = :telefone,email = :email WHERE id_cliente = :id");
        $stmt->execute($edit_cliente);

        if ($stmt->rowCount() > 0) {
        header('location: ../index.php');
        } else {
        echo "<br><br><br>ERRO Editar!!!!!";
        }
    }
?>