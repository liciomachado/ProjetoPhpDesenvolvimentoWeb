<body onload="carregaProdutos('divProdutos','divClientes','divPedidos','divAdicionaCliente')">

<div class="jumbotron jumbotron-fluid py-3">
      <div class="container">
      <form method="post" action="logoff.php" class="justify">
        <div class="row navbar">
          <div class="col-md-1">
          </div>
          <button id="botao-clientes" type="button" name= "clientes" class="btn btn-warning mb-2 ml-4 col-md-2" onclick="carregaClientes('divClientes','divProdutos','divPedidos','divAdicionaCliente')" >Clientes</button>
          <button id="botao-produtos" type="button" name="produtos" class="btn btn-warning mb-2 ml-4 col-md-2" onclick="carregaProdutos('divProdutos','divClientes','divPedidos','divAdicionaCliente')">Produto</button>
          <button id="botao-pedidos"  type="button" name="pedidos" class="btn btn-warning mb-2 ml-4 col-md-2" onclick="carregaPedidos('divPedidos','divClientes','divProdutos','divAdicionaCliente')">Pedidos</button>
          <button type="submit" name="index" class="btn btn-warning mb-2 ml-4 col-md-2">Sair</button>
          <div class="col-md-1">
          </div>
        </div>
      </form>

    </div>
  </div>

<div id="conteudo-CRUD" class="container">

    <div class="container" id="divProdutos" >
      <div class="row">
        <?php include 'produtos.php'; ?>
      </div>
    </div>
    
    <div  id="divAdicionaCliente">
        <?php include 'clientes.php'; ?>
    </div>

    <div  id="divClientes">
        <?php include 'adicionaCliente.php'; ?>
    </div>

    <div  id="divPedidos">
        <?php include 'pedidos.php'; ?>
    </div>
</div>
</body>
