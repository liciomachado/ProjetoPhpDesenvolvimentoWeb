<body >
<?php require 'tempoSession.php'; ?>

<div class="jumbotron jumbotron-fluid py-3">
      <div class="container">
      <form method="post" action="index.php" class="justify">
        <div class="row navbar">
          <div class="col-md-1">
          </div>
          <button id="botao-clientes" type="submit" name= "clientes" class="btnX btn-warning mb-2 ml-4 col-md-2" >Clientes</button>
          <button id="botao-produtos" type="submit" name="produtos" class="btnX btn-warning mb-2 ml-4 col-md-2" >Produto</button>
          <button id="botao-pedidos"  type="submit" name="pedidos" class="btnX btn-warning mb-2 ml-4 col-md-2" >Pedidos</button>
          <button type="submit" name="logoff" class="btnX btn-warning mb-2 ml-4 col-md-2">Sair</button>
          <div class="col-md-1">
          </div>
        </div>
      </form>
    </div>
  </div>

<div id="tempo"></div>
