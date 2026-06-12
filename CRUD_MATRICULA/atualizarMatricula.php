<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Apagar Dados</title>

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

            <form method="POST" action="procurarMatricula.php">
                <input type="submit"
                       value="Consultar Matrícula"
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
</nav>


<div class="container py-5 mt-5">

    <div class="text-center mb-4">

        <h1 class="text-primary fw-bold">
            U.C Testes de Sistemas - SENAI SC
        </h1>

        <h3 class="text-primary">
            Alteração de Dados do Cadastro de Matrícula
        </h3>

    </div>

    <hr class="border border-primary border-2">

    <div class="card border-0 shadow-lg mt-4">

        <div class="card-body p-5">

            <h2 class="text-center text-primary mb-4">
                Procurar Matrícula
            </h2>

            <form method="POST" action="formAtualizarMatricula.php">

                <div class="row justify-content-center">

                    <div class="col-md-6">

                        <label class="form-label fw-bold">
                            ID da Matrícula
                        </label>

                        <input type="text"
                               name="ID"
                               class="form-control"
                               placeholder="Digite o ID da matrícula">

                    </div>

                </div>

                <div class="text-center mt-4">

                    <input type="submit"
                           value="Procurar"
                           class="btn btn-primary px-5">

                    <input type="reset"
                           value="Limpar Dados"
                           class="btn btn-outline-primary px-5">

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>

