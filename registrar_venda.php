<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/registrar_venda.css">
    <title>Mercado</title>
    <script src="js/registrar_venda.js"></script>
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
    <div class="container" style="width: 45%">
        <h2>Registrar Venda</h2>
        <form action="api/registrar_venda.php" method="POST" onsubmit="return validarFormulario();">
            <div class="form-group">
                <label for="produto_id">Produto</label>
                <select id="produto_id" name="produto_id">
                    <option value="">Selecione</option>
                    <?php
                    require 'api/conexao.php';
                    $stmt = $pdo->query('SELECT p.id, p.nome, p.preco, t.imposto_percentual FROM produtos p JOIN tipos_produtos t ON p.tipo_id = t.id');
                    while ($row = $stmt->fetch()) {
                        echo "<option value=\"{$row['id']}\" data-preco=\"{$row['preco']}\" data-imposto=\"{$row['imposto_percentual']}\">{$row['nome']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="number" id="quantidade" name="quantidade">
            </div>
            <button type="button" onclick="adicionarProduto()">Adicionar Produto</button>
            <br><br>
            <div id="produtos-selecionados-section">
                <h2>Produtos Selecionados</h2>
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>&nbsp;&nbsp;&nbsp;</th>
                        <th>Produto</th>
                        <th>&nbsp;&nbsp;&nbsp;</th>
                        <th>Quantidade</th>
                        <th>&nbsp;&nbsp;&nbsp;</th>
                        <th>Valor Total</th>
                        <th>&nbsp;&nbsp;&nbsp;</th>
                        <th>Valor do Imposto</th>
                    </tr>
                    </thead>
                    <tbody id="produtos-selecionados">
                    </tbody>
                    <br>
                    <br>
                    <tfoot>
                    <tr>
                        <td colspan="9" class="totais">
                            <div class="totais-item">
                                <span class="totais-label">Total da Compra:</span>
                                <span id="total-compra">R$ 0.00</span>
                            </div>
                            <div class="totais-item">
                                <span class="totais-label">Total dos Impostos:</span>
                                <span id="total-impostos">R$ 0.00</span>
                            </div>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <br>
            <div id="produtos-quantidades"></div>
            <button id="registrar-venda-button" type="submit" name="submit">Registrar Venda</button>
        </form>
    </div>
</body>
</html>
