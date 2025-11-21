<?php
    include '../infra/db.php';
    $id = $_GET['Id'] ?? null;


    if($id){
        $delete = "DELETE FROM livros WHERE Id=$id";

        if(mysqli_query($conexao, $delete)){
            echo "<p>Registro excluído com sucesso.</p>";
        }else{
            echo "<p>Erro ao excluir registro: " .mysqli_error($conexao)."</p>";
        }
    }else{
        echo "<p>ID do livro não fornecido.</p>";
        exit();
    }
    $conexao->close();
    header("refresh:5;url=listar.php");
    echo "<p>Você será redirecionado à tela de listagem após 5 segundos...</p>";
?>