<?php
include 'conexao.php';

$id = $_POST["idCadastro"];

    $recebendo_cadastro = "DELETE FROM cadastro_pessoas
                            WHERE id = '$id'
                            ";

   

    $query_cadastro = mysqli_query($connex, $recebendo_cadastro);

    header('location: ../index.php');