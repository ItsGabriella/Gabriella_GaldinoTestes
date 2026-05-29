<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Procurar Aluno</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

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

                        <a href="formMatricula.php"
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
            U.C Testes de Sistemas - SENAI SC
        </h1>

        <h3 class="text-primary">
            Formulário de Procura de Aluno
        </h3>

    </div>

    <hr class="border border-primary border-2">

    <div class="card shadow-lg border-0 mt-4">

        <div class="card-body p-5">

            <h2 class="text-center text-primary mb-4">
                Procurar Aluno
            </h2>


            <form method="POST" action="consulta.php">

                <div class="row justify-content-center mb-4">

                    <div class="col-md-8">

                        <label class="form-label fw-bold">
                            Nome do Aluno(a)
                        </label>
                        <input type="text"
                               name="Nome"
                               class="form-control"
                               placeholder="Digite o nome do aluno">
                    </div>

                </div>

                <div class="text-center">

                    <input type="submit"
                           value="Procurar"
                           class="btn btn-primary px-4">

                    <input type="reset"
                           value="Limpar Dados"
                           class="btn btn-outline-primary px-4">

                </div>

            </form>

        </div>

    </div>


</div>

</body>
</html>