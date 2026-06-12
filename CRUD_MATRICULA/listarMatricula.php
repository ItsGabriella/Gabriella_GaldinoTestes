<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Listagem de Matrículas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

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

                <a href="../CRUD_ALUNO/index.php"
                   class="btn btn-outline-primary">
                    Home
                </a>

                <a href="../CRUD_ALUNO/formAluno.php"
                       class="btn btn-outline-primary">
                        Aluno
                    </a>
                <hr>

                <form method="POST" action="formMatricula.php">
                    <input type="submit"
                           value="Registrar Nova Matrícula"
                           class="btn btn-primary w-100">
                </form>

                <form method="POST" action="procurarMatricula.php">
                    <input type="submit"
                           value="Consultar Matrícula"
                           class="btn btn-primary w-100">
                </form>

                <form method="POST" action="atualizarMatricula.php">
                    <input type="submit"
                           value="Atualizar Dados da Matrícula"
                           class="btn btn-primary w-100">
                </form>

                <form method="POST" action="apagarMatricula.php">
                    <input type="submit"
                           value="Excluir Dados da Matrícula"
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
            Listagem de Matrículas
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

$sql = "SELECT * FROM matricula";

$result = $conexao->query($sql);

if($result->num_rows > 0){

?>

            <div class="list-group">

<?php

    while($linha = $result->fetch_assoc()){

?>

                <div class="list-group-item list-group-item-action mb-3 border rounded shadow-sm">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h5 class="text-primary mb-0">
                            Matrícula
                        </h5>

                        <span class="badge bg-primary">
                            ID <?= $linha["id"] ?>
                        </span>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-2">
                            <strong>Nível:</strong><br>
                            <?= $linha["nivel"] ?>
                        </div>

                        <div class="col-md-6 mb-2">
                            <strong>Turno:</strong><br>
                            <?= $linha["turno"] ?>
                        </div>

                        <div class="col-md-6 mb-2">
                            <strong>Série:</strong><br>
                            <?= $linha["serie"] ?>
                        </div>

                        <div class="col-md-6 mb-2">
                            <strong>Curso Extra Curricular:</strong><br>
                            <?= $linha["cursoExtra"] ?>
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
        Nenhuma matrícula cadastrada.
    </div>';
}

$conexao->close();

?>

        </div>

    </div>

</div>

</body>
</html>