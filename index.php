<?php include('server.php');
      include('bd/conectaBanco.php');

      $idCliente = '';
      $idProduto = '';
      $adicionaItem = false;
      
 
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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    
  </head>

<?php if (isset($_SESSION['logado'])){
          if (isset($_POST['adicionarCliente'])) {
            include 'index2.php'; 
            include 'clientes.php';
          }else if(isset($_POST['clientes'])) {
            include 'index2.php';
            include 'adicionaCliente.php';
          }else if(isset($_POST['editaCliente'])) {
            $idCliente =  $_POST['idCliente'];
            $_SESSION['editaCliente'] = true;
            include 'index2.php'; 
            include 'clientes.php';
          }else if(isset($_POST['produtos'])) {
            include 'index2.php';
            include 'produtos.php';
          }else if(isset($_POST['adicionaProduto'])) {
            include 'index2.php';
            include 'adicionaProduto.php';
          }else if(isset($_POST['editaProduto'])) {
            $idProduto =  $_POST['idProduto'];
            $_SESSION['editaProduto'] = true;
            include 'index2.php';
            include 'adicionaProduto.php';
          }else if(isset($_POST['pedidos'])) {
            include 'index2.php';
            include 'pedidos.php';
          }else if(isset($_POST['logoff'])) {
            header("location: logoff.php");
          }else if(isset($_POST['adicionaItemPedido'])) {
            $adicionaItem = true;
            $idPedido = $_POST['idPedido'];
            include 'index2.php';
            include 'pedidos.php';
          }else {
            include 'index2.php';
            include 'produtos.php';
          }
      } else{
        include 'indexLogin.php'; 
      }  ?>


<script>

      function adicionaProduto() {
        var idPedido = document.getElementsByTagName('idPedido');
        console.log($('#idPedido').val());
      }

      function duplicarCampos(){
        var clone = document.getElementById('origem').cloneNode(true);
        var destino = document.getElementById('destino');
        destino.appendChild (clone);
        
        var camposClonados = clone.getElementsByTagName('input');
        
        for(i=0; i<camposClonados.length;i++){
          camposClonados[i].value = '';
        }
      }
      function removerCampos(id){
        var node1 = document.getElementById('destino');
        node1.removeChild(node1.childNodes[0]);
      }

      $(document).ready(function(){
        $("select[name='cliente']").change(function(){
          var itemSelecionado = $('#cliente').val();
          console.log($('#cliente').val());
          $.getJSON('function.php', {
            cliente: itemSelecionado
          },function(json) {
            $("#endereco").val(json.endereco);
            $("#numero").val(json.numero);
            $("#telefone").val(json.telefone);
            $("#codigoCliente").val(json.id_cliente);
            $("#cep").val(json.cep);
            $("#bairro").val(json.bairro);
            $("#cidade").val(json.cidade);
            $("#obs").val(json.observacao);
          });
        });
      });

      $(document).ready(function(){
        $("select[name='produtos']").change(function(){
          var itemSelecionado = $('#produtos').val();
          $.getJSON('function.php', {
            produtos: itemSelecionado
          },function(json) {
            $("#codigoProduto").val(json.codigoProduto);
            $("#preco").val(json.preco);
          });
        });
      });

      function calculaPreco() {

        var quant = parseInt(document.getElementById('quantidade').value, 10);
        var valor = parseInt(document.getElementById('preco').value, 10);

        var soma = quant * valor; 
        console.log(soma);

        $("#total").val(soma);
        document.getElementById('total').innerHTML = parseFloat(soma);

      }
        var count = new Number();
        var count = 60*30;

      function start() {
        if((count - 1) >= 0){
          count= count -1;
          tempo.innerText=count;
          setTimeout('start();',1000);
        }
      }

      function selecionarcurso(){
            var c2017 = document.getElementById("cursada2017");
            var c2018 = document.getElementById("cursada2018");

            var selecionado2017 = c2017.options[c2017.selectedIndex].value;

            var selecionado2018 = parseInt(selecionado2017)+1;

            for (var i = 0; i < c2018.options.length; i++){
                if(c2018.options[i].value == selecionado2018){
                    c2018.options[i].selected = "true";
                    break;
                }
            }
      }     

</script>
</html>