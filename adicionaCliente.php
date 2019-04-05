<?php require 'validaLogin.php'; ?>

<div class="container-fluid">
  <div class="row formulario">
    <div class="col-md-12">
      <div class="display-3">Clientes</div>
    </div>
  </div>
  <div class="row cadastro">
    <div class="col-md-12">
      <form action="index.php" method="post">
        <div id="botao">
        <button type="button" class="btn btn-warning mb-2" id="botao" name="adicionar" onclick="carregaAdiciona('divAdicionaCliente','divClientes','divProdutos','divPedidos')">Adicionar Cliente</button>
      </div>
      </form>
      <hr>
    </form>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Endereço:</th>
          <th scope="col">Número:</th>
          <th scope="col">Observação:</th>
          <th scope="col">CEP:</th>
          <th scope="col">Bairro:</th>
          <th scope="col">Cidade:</th>
          <th scope="col">Estado:</th>
          <th scope="col">Telefone:</th>
          <th scope="col">E-mail:</th>
          <th scope="col"><button type="submit" class="btn btn-warning">Editar</button></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Luis Gustavo Borges Lemos</td>
          <td>Rua Edmundo Silva</td>
          <td>79</td>
          <td>Casa</td>
          <td>88508-000</td>
          <td>Frei Rogério</td>
          <td>Lages</td>
          <td>SC</td>
          <td>4999999-9999</td>
          <td>luis.lemos83@hotmail.com</td>
          <td><button type="submit" name="editar" class="btn btn-warning"> Editar: 1</button></td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Leticia Marques</td>
          <td>Rua do Rosário</td>
          <td>120</td>
          <td>Casa</td>
          <td>88500-000</td>
          <td>Centro</td>
          <td>Lages</td>
          <td>SC</td>
          <td>4998888-8888</td>
          <td>leticia@yahoo.com.br</td>
          <td><button type="submit" name="editar" class="btn btn-warning"> Editar: 1</button></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>