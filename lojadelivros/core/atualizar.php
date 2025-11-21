
<?php
    include '../infra/db.php';
    $id = $_GET['Id'] ?? null;

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id_post = $_POST['Id'] ?? null;
        if (!$id_post) {
        die("ID não informado.");
    }


        $name = $_POST['nome'];
        $autor = $_POST['autor'];
        $preco = $_POST['preco'];
        $paginas = $_POST['paginas'];
        $estoque = $_POST['estoque'];

        $update = "UPDATE livros SET nome='$name', autor='$autor', preco='$preco', paginas = '$paginas', estoque = '$estoque' WHERE Id=$id_post";

        if ($conexao->query($update)) {
        echo "<p>Livro atualizado com sucesso!</p>";
        
    } else {
        echo "<p>Erro ao atualizar: " . $conexao->error . "</p>";
    }
    }

    $conexao->close();
?>
<h2>Atualizar Livro</h2>
<form action="atualizar.php" method="post">
    <input type="hidden" name="Id" value="<?php echo $id; ?>">
    Nome do livro: <br> <input type="text" name = "nome"><br>
    Autor(a): <br> <input type="text" name = "autor"><br>
    Preço: <br> <input type="number" name = "preco" step="0.01"><br>
    Número de paginas: <br> <input type="number" name = "paginas"><br>
    Estoque: <br> <input type="number" name = "estoque"> <br>
    <button type="submit">Atualizar</button>
</form>
<a href="./listar.php" type="button" class="btn btn-success my-2">Voltar para a Lista</a>


