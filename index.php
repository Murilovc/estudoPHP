<!doctype html>
<html lang="en">

<head>
    <title>Cadastros</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>



<body>

    <div class="container">
            
        <!-- margin-top 4-->
        <div class="row mt-4">
            <div class="col">
                <h3 class="text-primary">Formulário de cadastro</h3>
            </div>
            <div class="col text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newcad">
                    Novo Cadastro
                </button>
            </div>
        </div>

        <!--aqui vai a janela modal-->
        <!-- The Modal -->
        <div class="modal" id="newcad">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Cadastro</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="back-end/cadastros.php" method="post">
                            <label for="">Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="digite seu nome">
                            <br>

                            <label for="">Telefone</label>
                            <input type="text" name="telefone" class="form-control" placeholder="digite seu telefone">
                            <br>
                                
                            <hr>
                            <div class="text-right">
                                <input type="submit" value="ENVIAR" class="btn btn-success">
                            </div>
                            
                        </form>
                    </div>

                </div>
            </div>
        </div>
            
        <br>
            
        <br>

    </div>


    <br><br>

    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php

                include "back-end/conexao.php";

                $query_listar = "SELECT *
                                FROM cadastro_pessoas ";

                $buscar_cadastro = mysqli_query($connex, $query_listar);

                while($retorno_cadastro = mysqli_fetch_array($buscar_cadastro))
                {
            ?>
                <tr>
                    <td scope="row"><?php echo $retorno_cadastro['id'];?></td>
                    <td><?php echo $retorno_cadastro['nome'];?></td>
                    <td><?php echo $retorno_cadastro['telefone'];?></td>
                    <td><?php echo $retorno_cadastro['dataCadastro'];?></td>
                        
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#n<?php echo $retorno_cadastro['id'];?>">
                            Editar
                        </button>


                    </td>
                        
                    <td>
                        <form action="back-end/delete.php" method="post">
                            <input type="hidden" name="idCadastro" value="<?php echo $retorno_cadastro['id'];?>">

                            <input type="submit" value="EXCLUIR" class="btn btn-danger">

                        </form>
                    </td>
                </tr>

                <!--aqui vai a janela modal de edicao-->
                <!-- The Modal -->
                <div class="modal" id="n<?php echo $retorno_cadastro['id'];?>">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Editar usuário</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="back-end/edicoes.php" method="post">
                                    <input type="hidden" name="idCadastro" value="<?php echo $retorno_cadastro['id'];?>">

                                    <input type="text" name="nome" value="<?php echo $retorno_cadastro['nome']; ?>" class="form-control">
                                    <input type="text" name="telefone" value="<?php echo $retorno_cadastro['telefone']; ?>" class="form-control">

                                    <input type="submit" value="EDITAR" class="btn btn-warning">

                                </form>
                            </div>

                        </div>
                    </div>
                </div>




            <?php } ?>
        </tbody>
    </table>

    <hr>


    <?php

    include "back-end/conexao.php";

    $query_colapse = "SELECT *
                    FROM cadastro_pessoas ";

    $buscar_colapse = mysqli_query($connex, $query_colapse);

    while($retorno_colapse = mysqli_fetch_array($buscar_colapse)) {
    ?>



    <button data-toggle="collapse" data-target="#d<?php echo $retorno_colapse['id']; ?>" class="btn btn-success btn-block"><?php echo $retorno_colapse['nome']; ?></button>

    <div id="d<?php echo $retorno_colapse['id']; ?>" class="collapse">
        Lorem ipsum dolor text....<?php echo $retorno_colapse['id']; ?>
    </div>

    <br>

    <?php
    }
    ?>

</body>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</html>