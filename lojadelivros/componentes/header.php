<?php
    echo  '<!DOCTYPE html>
            <html lang="pt-BR">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Aplicação php | Minha biblioteca</title>
                
                <link rel="stylesheet" href="../css/compras.css">
            </head>
            <body class="container=fluid">';
?>
<style>
    table {
        
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid #ddd;
        text-align: left;
        padding: 8px;
    }
    th {
        background-color: #04AA6D;
        color: white;
        
    }    

    tr:nth-child(even) {background-color: #f2f2f2;}
    
    .btn-cadastrar{
        padding: 8px 15px;
        background: green;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        
    }
    .btn-editar{
        padding: 3px;
        background: blue;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;       
        
    }
    .btn-excluir{
        padding: 3px;
        background: red;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;       
        
    }    
</style>