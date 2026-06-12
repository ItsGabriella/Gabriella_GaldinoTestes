
<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Apagar Matrícula</title>

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

                    <form method="POST" action="atualizarMatricula.php">
                        <input type="submit"
                               value="Atualizar Dados da Matrícula"
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
            Apagar Matrícula
        </h3>

    </div>

    <hr class="border border-primary border-2">

    <div class="card border-0 shadow-lg mt-4">

        <div class="card-body p-5">

<?php

if(empty($_POST["ID"])){

    echo '<div class="alert alert-danger text-center">
            Por favor preencher o campo ID.
          </div>';

} else {

    $ID = $_POST["ID"];

    $conexao = new mysqli(
        "127.0.0.1",
        "root",
        "",
        "sistemaescola"
    );

    if($conexao->connect_errno){

        echo '<div class="alert alert-danger text-center">
                Erro na conexão com o banco de dados.
              </div>';

    } else {

        $conexao->set_charset("utf8");

        $sql = "SELECT * FROM matricula WHERE id='$ID'";

        $result = $conexao->query($sql);

        if($result && $result->num_rows > 0){

            $linha = $result->fetch_assoc();

            $ID = $linha["id"];
            $nivel = $linha["nivel"];
            $turno = $linha["turno"];
            $serie = $linha["serie"];
            $cursoExtra = $linha["cursoExtra"];

?>

            <form method="POST" action="apagaMatricula.php">

                <input type="hidden"
                       name="ID"
                       value="<?=$ID?>">

                <div class="mb-3">

                    <label class="form-label fw-bold">
                        ID da Matrícula
                    </label>

                    <input type="text"
                           class="form-control"
                           value="<?=$ID?>"
                           disabled>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-bold">
                        Nível
                    </label>

                    <input type="text"
                           class="form-control"
                           value="<?=$nivel?>"
                           disabled>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-bold">
                        Turno
                    </label>

                    <input type="text"
                           class="form-control"
                           value="<?=$turno?>"
                           disabled>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-bold">
                        Série
                    </label>

                    <input type="text"
                           class="form-control"
                           value="<?=$serie?>"
                           disabled>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-bold">
                        Curso Extra Curricular
                    </label>

                    <input type="text"
                           class="form-control"
                           value="<?=$cursoExtra?>"
                           disabled>

                </div>

                <div class="alert alert-danger text-center mt-4">

                    <strong>
                        Tem certeza que deseja deletar esta matrícula?
                    </strong>

                </div>

                <div class="text-center">

                    <input type="submit"
                           value="DELETAR MATRÍCULA"
                           class="btn btn-danger btn-lg">

                </div>

            </form>

<?php

        } else {

            echo '<div class="alert alert-warning text-center">
                    Matrícula não encontrada.
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

