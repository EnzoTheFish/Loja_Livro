<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "minhaBiblioteca";
    $conexao_temp = new mysqli($host, $user, $pass);
    $conexao_temp->query("CREATE DATABASE IF NOT EXISTS minhaBiblioteca");
    $conexao_temp->close();

    $conexao = new mysqli($host, $user, $pass, $db);
    if ($conexao->connect_error){
        die("Erro na conexao: ". $conexao->connect_error);
    }

    $sql = "CREATE TABLE IF NOT EXISTS livros(
        Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        nome VARCHAR(50) NOT NULL,
        autor VARCHAR(100) NOT NULL,
        preco DECIMAL(10,2) NOT NULL,
        paginas INT NOT NULL
    )";
    $conexao->query($sql);
?>