<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro de Matrícula</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Navbar -->
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

                    <form method="POST" action="atualizarMatricula.php">
                        <input type="submit"
                               value="Atualizar Matrícula"
                               class="btn btn-primary w-100">
                    </form>

                    <form method="POST" action="apagarMatricula.php">
                        <input type="submit"
                               value="Excluir Matrícula"
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
            Formulário de Cadastro de Matrícula
        </h3>

    </div>

    <hr class="border border-primary border-2">

    <div class="card border-0 shadow-lg mt-4">

        <div class="card-body p-5">

            <h2 class="text-center text-primary mb-4">
                Dados da Matrícula
            </h2>

        <div class="card-body p-4">

            <form method="POST" action="cadastroMatricula.php">

                <div class="row">

                    <!-- Nível -->
                    <div class="col-md-3 mb-4">

                        <label class="form-label fw-bold">
                            Nível
                        </label>

                        <div class="form-check">
                            <input class="form-check-input"
                                   type="radio"
                                   name="nivel"
                                   value="Integrado">

                            <label class="form-check-label">
                                Integrado
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input"
                                   type="radio"
                                   name="nivel"
                                   value="Sub-Seq">

                            <label class="form-check-label">
                                Sub-Seq
                            </label>
                        </div>

                    </div>

                    <!-- Turno -->
                    <div class="col-md-3 mb-4">

                        <label class="form-label fw-bold">
                            Turno
                        </label>

                        <div class="form-check">
                            <input class="form-check-input"
                                   type="radio"
                                   name="turno"
                                   value="Manha">

                            <label class="form-check-label">
                                Manhã
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input"
                                   type="radio"
                                   name="turno"
                                   value="Tarde">

                            <label class="form-check-label">
                                Tarde
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input"
                                   type="radio"
                                   name="turno"
                                   value="Noite">

                            <label class="form-check-label">
                                Noite
                            </label>
                        </div>

                    </div>

                    <!-- Série -->
                    <div class="col-md-3 mb-4">

                        <label class="form-label fw-bold">
                            Série
                        </label>

                        <select class="form-select"
                                name="serie">

                            <option value=""></option>
                            <option>1°</option>
                            <option>2°</option>
                            <option>3°</option>

                        </select>

                    </div>

                    <!-- Cursos -->
                    <div class="col-md-3 mb-4">

                        <label class="form-label fw-bold">
                            Curso Extra Curricular
                        </label>

                        <div class="form-check">
                            <input class="form-check-input"
                                   type="radio"
                                   name="extraCurso"
                                   value="Musica">

                            <label class="form-check-label">
                                Música
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input"
                                   type="radio"
                                   name="extraCurso"
                                   value="Judo">

                            <label class="form-check-label">
                                Judô
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input"
                                   type="radio"
                                   name="extraCurso"
                                   value="Balet">

                            <label class="form-check-label">
                                Balé
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input"
                                   type="radio"
                                   name="extraCurso"
                                   value="Pintura">

                            <label class="form-check-label">
                                Pintura
                            </label>
                        </div>

                        <small class="text-danger">
                            * Escolha apenas uma opção
                        </small>

                    </div>

                </div>

                <hr>


                <div class="text-center">

                    <input type="reset"
                        value="Limpar Dados"
                        class="btn btn-outline-primary px-4">

                    <input type="submit"
                        value="Cadastrar Aluno"
                        class="btn btn-primary px-4">
                    </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>