<h2>Cadastrar Livros</h2>
<form action="criar.php" method="post">
    Nome do livro: <br> <input type="text" name = "nome"><br>
    Autor(a): <br> <input type="text" name = "autor"><br>
    Preço: <br> <input type="number" name = "preco" step="0.01"><br>
    Número de paginas: <br> <input type="number" name = "paginas"><br>
    Estoque: <br> <input type="number" name = "estoque" required min="0"><br><br>
    <button type="submit">Cadastrar</button>
</form>
<br><a href="./listar.php" class="btn-voltar">Voltar para a lista.</a>

<?php
    include '../infra/db.php';
    
    echo '';
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $nome = $_POST['nome'];
        $autor = $_POST['autor'];
        $preco = $_POST['preco'];
        $paginas = $_POST['paginas'];
        $estoque = $_POST['estoque'];

        $sql = "INSERT INTO livros(nome, autor, preco, paginas, estoque) VALUES
        ('$nome', '$autor',' $preco',' $paginas', '$estoque')";

        if ($conexao->query($sql)) {
            echo "<p>Livro cadastrado com sucesso!</p>";
           
        } else {
            echo "<p>Erro ao cadastrar: " . $conexao->error . "</p>";
        }
        
    }

    $conexao->close();

?>

