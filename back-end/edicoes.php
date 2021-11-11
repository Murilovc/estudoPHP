<?php

include 'conexao.php';

//recebendo dados do form
$id = $_POST['idCadastro'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];

$update_cad =  "UPDATE cadastro_pessoas SET
                        nome = '$nome',
                        telefone = '$telefone'
                WHERE   id = '$id'
                ";
            
$queryCad = mysqli_query($connex, $update_cad) or die (mysqli_error($connex));

header('location: ../index.php');

?>