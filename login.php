<?php
if (isset($_SESSION['logado'])) { //verifica se a sessão já não estava aberta e destrói a sessão

    $_SESSION = array();
    session_unset();
    session_destroy();
    
    }
    
            if ($_POST['usuario'] == 'mauricio' && $_POST['senha'] == '123') {
                session_start();
                $_SESSION['logado'] = true;
                include('index.php');
                
            }else{

            include('logoff.php');
            }
    
?>