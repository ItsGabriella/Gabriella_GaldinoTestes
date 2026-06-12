
<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Exclusão de Cadastro</title>

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

                    <form method="POST" action="listar.php">

                        <input type="submit"
                               value="Listar Alunos"
                               class="btn btn-primary w-100">

                    </form>

                    <form method="POST" action="procurar.php">

                        <input type="submit"
                               value="Consultar Dados do Aluno"
                               class="btn btn-primary w-100">

                    </form>

                    <form method="POST" action="atualizar.php">

                        <input type="submit"
                               value="Atualizar Dados do Aluno"
                               class="btn btn-primary w-100">

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
            Exclusão de Cadastro
        </h3>

    </div>

    <hr class="border border-primary border-2">

    <div class="card border-0 shadow-lg mt-4">

        <div class="card-body p-5 text-center">

<?php

if (isset($_POST["ID"])) {

    $ID = $_POST["ID"];

    $conexao = new mysqli(
        "127.0.0.1",
        "root",
        "",
        "sistemaescola"
    );

    if ($conexao->connect_errno) {

        $erro = "Ocorreu um erro na conexão com o banco de dados.";

    } else {

        $conexao->set_charset("utf8");

        $sql = "DELETE FROM aluno WHERE id='$ID'";

        if ($conexao->query($sql) === TRUE) {

            $sucesso = "Aluno excluído com sucesso!";

        } else {

            $erro = "Erro ao excluir registro: " . $conexao->error;

        }

        $conexao->close();
    }

} else {

    $erro = "Campo obrigatório não preenchido.";

}

if (isset($erro)) {

    echo '
    <div class="alert alert-danger">
        '.$erro.'
    </div>';

}

if (isset($sucesso)) {

    echo '
    <div class="alert alert-success">
        '.$sucesso.'
    </div>';

}

?>

            <div class="mt-4">

                <a href="apagar.php"
                   class="btn btn-primary">
                    Voltar
                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>

