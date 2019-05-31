<?php
    try {
    $pdo = new PDO('mysql:host=localhost;dbname=db_abc_bolinhas', 'root', '', []);
    } catch (PDOException $e) {
    echo '<br><br><br>Erro ao conectar com o MySQL!!!<br><br>' . $e->getMessage();
    exit();
    }

?>
