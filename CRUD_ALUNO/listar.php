<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Listagem de Alunos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

<nav class="navbar navbar-dark bg-primary shadow-sm fixed-top">

<div class="container-fluid">

    <a class="navbar-brand fw-bold" href="#">
        SENAI SC
    </a>

    <button class="navbar-toggler"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar">

        <span class="navbar-toggler-icon"></span>

    </button>

    <div class="offcanvas offcanvas-end"
    tabindex="-1"
    id="offcanvasNavbar">

    <div class="offcanvas-header border-bottom">

        <h5 class="offcanvas-title text-primary fw-bold">
            Menu
        </h5>

        <button type="button"
                class="btn-close"
                data-bs-dismiss="offcanvas">
        </button>

    </div>

    <div class="offcanvas-body">

        <div class="d-grid gap-3">

            <a href="index.php"
            class="btn btn-outline-primary">
                Home
            </a>

            <a href="../CRUD_MATRICULA/formMatricula.php"
            class="btn btn-outline-primary">
                Matrícula
            </a>

        <hr>
                    <form method="POST" action="formAluno.php">

                    <input type="submit"
                        value="Registrar Novo Aluno"
                        class="btn btn-primary w-100">

                    </form>

                    <form method="POST" action="procurar.php">

                    <input type="submit"
                        value="Consultar Aluno"
                        class="btn btn-primary w-100">

                    </form>

                    <form method="POST" action="atualizar.php">
                        <input type="submit"
                            value="Atualizar Dados do Aluno"
                            class="btn btn-primary w-100">
                    </form>

                    <form method="POST" action="apagar.php">

                    <input type="submit"
                        value="Apagar Dados do Aluno"
                        class="btn btn-danger w-100">

                    </form>

                </div>

                <div class="mt-auto pt-5">

                    <hr>

                    <p class="text-center text-secondary small">
                        Prof. Sergio Luiz da Silveira
                    </p>

                </div>

            </div>

        </div>

    </div>

</nav>

<div class="container py-5">

    <div class="text-center mb-4">

        <h1 class="text-primary fw-bold">
            <br>
            U.C Testes de Sistemas - SENAI SC
        </h1>

        <h3 class="text-primary">
            Listagem de Alunos
        </h3>

    </div>

<div class="card shadow-lg border-0 mt-4">

    <div class="card-body">

<?php

    $conexao = new mysqli("127.0.0.1","root","","sistemaescola");

    if($conexao->connect_errno){

        echo '
        <div class="alert alert-danger text-center">
            Ocorreu um erro na conexão com o banco de dados.
        </div>';

        exit;
    }

    $conexao->set_charset("utf8");

    $sql = "SELECT * FROM aluno";

    $result = $conexao->query($sql);

    if($result->num_rows > 0){

?>

        <!-- Lista -->
        <div class="list-group">

<?php

        while($linha = $result->fetch_assoc()){

?>

            <div class="list-group-item list-group-item-action mb-3 border rounded shadow-sm">

                <!-- Cabeçalho -->
                <div class="d-flex justify-content-between align-items-center mb-3">

                    <h5 class="text-primary mb-0">
                        <?= $linha["nome"] ?>
                    </h5>

                    <span class="badge bg-primary">
                        ID <?= $linha["id"] ?>
                    </span>

                </div>

                <!-- Informações -->
                <div class="row">

                    <div class="col-md-6 mb-2">
                        <strong>Data de Nascimento:</strong><br>
                        <?= $linha["dataNascimento"] ?>
                    </div>

                    <div class="col-md-6 mb-2">
                        <strong>Telefone:</strong><br>
                        <?= $linha["telefone"] ?>
                    </div>

                    <div class="col-md-6 mb-2">
                        <strong>Nome do Pai:</strong><br>
                        <?= $linha["nomePai"] ?>
                    </div>

                    <div class="col-md-6 mb-2">
                        <strong>Nome da Mãe:</strong><br>
                        <?= $linha["nomeMae"] ?>
                    </div>

                    <div class="col-md-6 mb-2">
                        <strong>Email:</strong><br>
                        <?= $linha["email"] ?>
                    </div>

                    <div class="col-md-3 mb-2">
                        <strong>Sexo:</strong><br>
                        <?= $linha["sexo"] ?>
                    </div>

                    <div class="col-md-3 mb-2">
                        <strong>Bairro:</strong><br>
                        <?= $linha["bairro"] ?>
                    </div>

                </div>

            </div>

<?php

        }

?>

        </div>

<?php

    } else {

        echo '
        <div class="alert alert-warning text-center">
            Nenhum aluno cadastrado.
        </div>';
    }

    $conexao->close();

?>

    </div>

</div>


</div>

</body>
</html>