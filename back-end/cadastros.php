<?php

include 'conexao.php';
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];


    $query_cadastrar = "INSERT INTO cadastro_pessoas VALUES (
        null,
        '$nome',
        '$telefone',
       now()
    )";


    $cadastrar_formulario = mysqli_query($connex, $query_cadastrar) or die(mysqli_error($connex));

    header('location: ../index.php');

