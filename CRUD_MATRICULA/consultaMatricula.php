<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Consultar Matrícula</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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

                    <form method="POST" action="listarMatricula.php">
                        <input type="submit"
                               value="Listar Matrículas"
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

<div class="container py-5 mt-5">

    <div class="text-center mb-4">

        <h1 class="text-primary fw-bold">
            U.C Testes de Sistemas - SENAI SC
        </h1>

        <h3 class="text-primary">
            Dados da Matrícula
        </h3>

    </div>

    <hr class="border border-primary border-2">

    <div class="card border-0 shadow-lg mt-4">

        <div class="card-body p-5">

<?php

if(empty($_POST["id"])){

    echo '
    <div class="alert alert-danger text-center">
        Por favor preencher o campo do ID.
    </div>';

} else {

    $id = $_POST["id"];

    $conexao = new mysqli(
        "127.0.0.1",
        "root",
        "",
        "sistemaescola"
    );

    if($conexao->connect_errno){

        echo '
        <div class="alert alert-danger text-center">
            Ocorreu um erro na conexão com o banco de dados.
        </div>';

    } else {

        $conexao->set_charset("utf8");

        $sql = "SELECT id,nivel,turno,serie,cursoExtra
                FROM matricula
                WHERE id LIKE '%$id%'";

        $result = $conexao->query($sql);

        if($result->num_rows > 0){

            while($linha = $result->fetch_assoc()){

                echo '

                <div class="card mb-3 border-primary">

                    <div class="card-header bg-primary text-white">
                        Matrícula #'.$linha["id"].'
                    </div>

                    <div class="card-body">

                        <p><strong>ID:</strong> '.$linha["id"].'</p>

                        <p><strong>Nível:</strong> '.$linha["nivel"].'</p>

                        <p><strong>Turno:</strong> '.$linha["turno"].'</p>

                        <p><strong>Série:</strong> '.$linha["serie"].'</p>

                        <p><strong>Curso Extra Curricular:</strong> '.$linha["cursoExtra"].'</p>

                    </div>

                </div>';

            }

        } else {

            echo '
            <div class="alert alert-warning text-center">
                Nenhuma matrícula encontrada.
            </div>';

        }

        $conexao->close();
    }
}

?>

        </div>

    </div>

</div>

</body>
</html>