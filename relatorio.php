<?php
// Conexão com o banco de dados
include_once 'config.php';

// Quantidade de produtos cadastrados
$query = "SELECT SUM(quantidade) AS total FROM itens";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$quantidade_produtos = $row['total'];

// Itens que sairam
$query = "SELECT SUM(quantidade) AS total FROM itens WHERE disponiveis = '0'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$itens_fora = $row['total'];

// Clientes totais
$query = "SELECT COUNT(nome) AS total FROM clientes";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$clientes_totais = $row['total'];

// Pedidos totais
$query = "SELECT COUNT(status) AS total FROM pedidos";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$pedidos_totais = $row['total'];

// Pedidos em andamento
$query = "SELECT COUNT(status) AS total FROM pedidos WHERE status = 'Pendente'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$quantidade_pedidosPendentes = $row['total'];

// Recibos
$query = "SELECT COUNT(emitente) AS total FROM recibo";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$recibos_totais = $row['total'];

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tela de relatorios</title>
  <link rel="stylesheet" href="relatorio.css">
</head>
<body>

    <div class="menu">
          <ul>
            <li><a href="home.php">Inicio</a></li>
            <li><a href="pedidos_pendentes.php">Pedidos</a></li>
            <li><a href="estoque.php">Estoque</a></li>
            <li><a href="financeiro.php">Financeiro</a></li>
            <li><a href="relatorio.php">Relatorios</a></li>
            <li><a href="clientes.php">Clientes</a></li>
            <li><a href="admin.php">Administradores</a></li>
          </ul>
    </div>

<h1>Tela de Relatórios</h1>

<button class="gerarRecibo"><a href="recibo.html">Gerar recibo</a></button>

  <div class="container">
    
    <div class="produtos">
      <h2>Produtos</h2> <!--Produtos totais no estoque-->
      <p><?php echo $quantidade_produtos; ?></p>
    </div>

    <div class="itens">
      <h2>Itens que sairam</h2> <!--Produtos que não possuem no estoque-->
      <p><?php echo $itens_fora; ?></p>
    </div>

    <div class="clientes">
      <h2>Clientes totais</h2> <!--Quantidade de clientes totais-->
      <p><?php echo $clientes_totais; ?></p>
    </div>

    <div class="vendas">
      <h2>Pedidos totais</h2> <!--Quantidade de pedidos totais-->
      <p><?php echo $pedidos_totais; ?></p>
    </div>

    <div class="andamento">
      <h2>Pedidos pendentes</h2> <!--Quantidade de pedidos em andamento-->
      <p><?php echo $quantidade_pedidosPendentes; ?></p>
    </div>

    <div class="recibo">
      <h2>Recibos omitidos</h2> <!--Quantidade de recibos omitidos-->
      <p><?php echo $recibos_totais; ?></p>
    </div>
  </div>

</body>
</html>