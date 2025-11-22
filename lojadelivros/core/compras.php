<?php
include '../infra/db.php';

$sql = "SELECT * FROM livros";
$result = $conexao->query($sql);
$livros = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $livros[] = $row;
    }
}

$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Comprar Livros</title>

    <link rel="stylesheet" href="../css/compras.css">
</head>
<body>

<a href="../index.php" class="btn-voltar">⬅ Voltar à página inicial</a>

<h1>Simulação de Compras</h1>

<h2>Livros Disponíveis</h2>

<div id="listaLivros">
    <?php foreach ($livros as $livro): ?>
        <div class="livro">
            <strong><?= $livro['nome'] ?></strong><br>
            Autor: <?= $livro['autor'] ?><br>
            Preço: R$ <?= number_format($livro['preco'], 2, ',', '.') ?><br>
            Estoque: <?= $livro['estoque'] ?><br><br>

            <button onclick="adicionarCarrinho(
                <?= $livro['Id'] ?>,
                '<?= $livro['nome'] ?>',
                <?= $livro['preco'] ?>,
                <?= $livro['estoque'] ?>
            )">
                Adicionar ao carrinho
            </button>
        </div>
    <?php endforeach; ?>
</div>

<div id="carrinho">
    <h2>Carrinho</h2>
    <div id="itensCarrinho"></div>
    <h3>Total: R$ <span id="total">0.00</span></h3>
</div>

<script src="../js/compras.js"></script>

</body>
</html>
