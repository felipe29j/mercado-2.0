<?php
require 'api/conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/listar_produtos.css">
    <title>Mercado</title>
</head>
<body>
    <div class="navbar">
        <a href="index.php" class="selected"><i class="fas fa-home"></i> Home</a>
        <a href="cadastro_tipo_produto.php" ><i class="fas fa-tags"></i> Cadastro de Tipo de Produto</a>
        <a href="cadastro_produto.php"><i class="fas fa-box"></i> Cadastro de Produto</a>
        <a href="listar_produtos.php"><i class="fas fa-list"></i> Listar Produtos</a>
        <a href="registrar_venda.php"><i class="fas fa-shopping-cart"></i> Registrar Venda</a>
        <a href="listar_vendas.php"><i class="fas fa-file-invoice"></i> Listar Vendas</a>
    </div>
    <div class="container">
        <h2>Listar Produtos</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query('SELECT p.id, p.nome, t.nome AS tipo, p.preco FROM produtos p JOIN tipos_produtos t ON p.tipo_id = t.id');
                while ($row = $stmt->fetch()) {
                    $preco = str_replace('.', ',', $row['preco']);
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nome']}</td>
                            <td>{$row['tipo']}</td>
                            <td>R$ {$preco}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
