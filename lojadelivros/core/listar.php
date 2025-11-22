
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
                    <th>Estoque</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>"; 
            while($linha = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$linha['nome']."</td>";
                echo "<td>".$linha['autor']."</td>";
                echo "<td>".$linha['preco']."</td>";
                echo "<td>".$linha['paginas']."</td>";
                echo "<td>".$linha['estoque']."</td>";
                echo "<td><a type='button' class='btn-editar' href='./atualizar.php?Id=".$linha['Id']."'>Editar</a> | <a type='button' class='btn-excluir' href='./excluir.php?Id=".$linha['Id']."'>Excluir</a> </td>";
                echo "</tr>";
            }
            echo "</tbody>
        </table>";      
    }

?>
<p>
<a href='./criar.php' type="button" class="btn-cadastrar">Cadastrar novo livro</a>
</p>
<p>
    <a href="../index.php" type="button" class="btn-voltar">Voltar para a pagina inicial</a>
</p>
   

