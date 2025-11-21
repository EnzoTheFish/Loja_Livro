
<?php
    include '../infra/db.php';
    $select = "SELECT * FROM livros";

    $result = $conexao->query($select);
    if($result->num_rows > 0){
        $tem_livros = true;
    }else{
        $tem_livros = false;
    }
    $conexao->close();

    
?>

<h1>Livros Cadastrados</h1>
<p>
    <a href='./criar.php' type="button">Cadastrar novo livro</a>
</p>
<?php
    include '../componentes/header.php';
    if($tem_livros){
        echo "<table class='table'>     
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Autor(a)</th>
                    <th>Preço</th>
                    <th>Número de paginas</th>
                </tr>
            </thead>
            <tbody>"; 
            while($linha = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$linha['nome']."</td>";
                echo "<td>".$linha['autor']."</td>";
                echo "<td>".$linha['preco']."</td>";
                echo "<td>".$linha['paginas']."</td>";
                echo "<td><a type='button' class='btn btn-warning' href='./atualizar.php?Id=".$linha['Id']."'>Editar</a> | <a type='button' class='btn btn-danger' href='./excluir.php?Id=".$linha['Id']."'>Excluir</a> </td>";
                echo "</tr>";
            }
            echo "</tbody>
        </table>";      
    }

?>

    <p>
        <a href="../index.php" type="button">Voltar Pagina Inicial</a>
    </p>
   

