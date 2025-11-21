<h2>Cadastrar Livros</h2>
<form action="criar.php" method="post">
    Nome do livro: <br> <input type="text" name = "nome"><br>
    Autor(a): <br> <input type="text" name = "autor"><br>
    Preço: <br> <input type="number" name = "preco" step="0.01"><br>
    Número de paginas: <br> <input type="number" name = "paginas"><br>
    <button type="submit">Cadastrar</button>
</form>
    

<?php
    include '../infra/db.php';


    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $nome = $_POST['nome'];
        $autor = $_POST['autor'];
        $preco = $_POST['preco'];
        $paginas = $_POST['paginas'];

        $sql = "INSERT INTO livros(nome, autor, preco, paginas) VALUES
        ('$nome', '$autor',' $preco',' $paginas')";

        if ($conexao->query($sql)) {
            echo "<p>Livro cadastrado com sucesso!</p>";
            echo '<a href="./listar.php">Voltar para página inicial.</a>';
        } else {
            echo "<p>Erro ao cadastrar: " . $conexao->error . "</p>";
        }

    }

    $conexao->close();

?>

