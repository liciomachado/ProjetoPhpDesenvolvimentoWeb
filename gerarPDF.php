<?php 
include_once('bd/conectaBanco.php');

$html = "";

        $filtro = array(':idPedido' => $_POST['idPedido'] ); 
        $rs = $pdo->prepare("SELECT a.id_pedido,d.id_cliente,d.bairro,d.cep,d.cidade,d.email,d.endereco,d.estado,
        d.nome,d.numero,d.observacao,d.telefone, 
        c.descricao,c.valor as valorUnitario,b.quantidade,b.valor,b.observacao as obsPedido, e.imagem
        FROM tb_pedidos as a 
        INNER JOIN tb_pedido_produtos as b 
        on a.id_pedido = b.id_pedido INNER JOIN tb_produtos as c 
        on b.id_produto = c.id_produto INNER JOIN tb_clientes as d 
        on d.id_cliente=a.id_cliente INNER JOIN tb_produtos as e 
        on e.id_produto = b.id_produto WHERE a.id_pedido = :idPedido limit 1 ");
        
        if ($rs->execute($filtro)) {
          if ($rs->rowCount() > 0) {
            $row = $rs->fetch(PDO::FETCH_OBJ);
            $html .= "Código do Cliente : ".$row->id_cliente . "<br>";
            $html .= "Nome : ".$row->nome. "<br>";
            $html .= "Endereco : ".$row->endereco. "<br>";
            $html .= "Numero : ".$row->numero. "<br>";
            $html .= "Bairro : ".$row->bairro. "<br>";
            $html .= "CEP : ".$row->cep. "<br>";
            $html .= "Cidade : ".$row->cidade. "<br>";
            $html .= "Estado : ".$row->estado. "<br>";
            $html .= "Email : ".$row->email. "<br>";
            $html .= "Telefone : ".$row->telefone. "<br>";
            $html .= "Observacao : ".$row->observacao. "<hr>";
        } 
      }

      $html .= '<h2>Dados do Pedido</h2>';

      $rs = $pdo->prepare("SELECT a.id_pedido,d.id_cliente,d.bairro,d.cep,d.cidade,d.email,d.endereco,d.estado,
      d.nome,d.numero,d.observacao,d.telefone, 
      c.descricao,c.valor as valorUnitario,b.quantidade,b.valor,b.observacao as obsPedido, e.imagem
      FROM tb_pedidos as a 
      INNER JOIN tb_pedido_produtos as b 
      on a.id_pedido = b.id_pedido INNER JOIN tb_produtos as c 
      on b.id_produto = c.id_produto INNER JOIN tb_clientes as d 
      on d.id_cliente=a.id_cliente INNER JOIN tb_produtos as e 
      on e.id_produto = b.id_produto WHERE a.id_pedido = :idPedido");

      if ($rs->execute($filtro)) {
        if ($rs->rowCount() > 0) {
          while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
          $html .= "Produto : ".$row->descricao. "<br>";
          $html .= "Preço : ".$row->valorUnitario. "<br>";
          $html .= "Quantidade : ".$row->quantidade. "<br>";
          $html .= "Observacao : ".$row->obsPedido. "<br>";
          $html.= "Imagem do produto : ";
          $html.= "<img src='{$row->imagem}' width='100' height='100' name='imagem' value='{$row->imagem}'>"."<br>";
          }
        } 
      }
    $rs = $pdo->prepare("select SUM(valor) as valorTotal from tb_pedido_produtos where tb_pedido_produtos.id_pedido = :idPedido");
    if ($rs->execute($filtro)) {
      if ($rs->rowCount() > 0) {
        $row = $rs->fetch(PDO::FETCH_OBJ);
        $html .= "<h3>Total a pagar: R$ ".$row->valorTotal. "</h3><hr>";
      } 
    }
       use Dompdf\Dompdf;
        require_once 'dompdf/autoload.inc.php';
        
        $dompdf = new DOMPDF();
        $dompdf->load_html('
            <h1 style="text-align: center;">Pedido Completo</h1>
            <h2>Dados do Cliente</h2>
            '.$html.'
        ');
        $dompdf->render();
        $dompdf->stream(
        "relatorio.pdf",
            array(
                "Attachment" => false
            )
        );
       
?>