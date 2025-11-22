
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
            header("Location:./listar.php");
            exit();
        
    } else {
        echo "<p>Erro ao atualizar: " . $conexao->error . "</p>";
    }
    }

    if($id){
        $select = "SELECT * FROM livros WHERE Id='$id'";
        $result = $conexao->query($select);
        if($result->num_rows == 1){
            $livro = mysqli_fetch_assoc($result);
        }else{
            echo "<p>Registro não localizado.</p>";
            exit();
        }
    }else{
        echo "<p>ID do medicamento não fornecido.</p>";
        exit();
    }    

    $conexao->close();
?>
<link rel="stylesheet" href="../css/criar.css">
<div class="container-form">
<h2>Atualizar Livro</h2>
<form action="atualizar.php" method="post">
    <input type="hidden" name="Id" value="<?php echo $id; ?>">
    Nome do livro: <br> <input type="text" name = "nome" value="<?php echo $livro['nome']; ?>"><br>
    Autor(a): <br> <input type="text" name = "autor" value="<?php echo $livro['autor'] ?>"><br>
    Preço: <br> <input type="number" name = "preco" step="0.01" value="<?php echo $livro['preco']; ?>"><br>
    Número de paginas: <br> <input type="number" name = "paginas" value="<?php echo $livro['paginas']; ?>"><br>
    Estoque: <br> <input type="number" name = "estoque" value="<?php echo $livro['estoque']; ?>"> <br>
    <p><button type="submit">Atualizar</button></p>
</form>
<br><a href="./listar.php" type="button" class="btn-voltar">Voltar para a Lista</a>
</div>


