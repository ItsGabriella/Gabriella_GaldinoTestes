<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Atualizar Dados</title>

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

                    <form method="POST" action="apagar.php">
                        <input type="submit"
                               value="Excluir Dados do Aluno"
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
            Alteração de Dados do Cadastro
        </h3>

    </div>

    <hr class="border border-primary border-2">

    <div class="card border-0 shadow-lg mt-4">

        <div class="card-body p-5 text-center">

<?php

if (
    isset($_POST["ID"]) &&
    isset($_POST["Nome"]) &&
    isset($_POST["DataNasc"]) &&
    isset($_POST["NomePai"]) &&
    isset($_POST["NomeMae"]) &&
    isset($_POST["Telefone"]) &&
    isset($_POST["Email"]) &&
    isset($_POST["Sexo"]) &&
    $_POST["Bairro"] != ''
){

    $ID = $_POST["ID"];
    $nome = $_POST["Nome"];
    $datanasc = $_POST["DataNasc"];
    $nomepai = $_POST["NomePai"];
    $nomemae = $_POST["NomeMae"];
    $telefone = $_POST["Telefone"];
    $email = $_POST["Email"];
    $sexo = $_POST["Sexo"];
    $bairro = $_POST["Bairro"];

    if(strlen($datanasc) < 10){

        $erro = "Por favor inserir uma data válida.";

    } else {

        if(strlen($telefone) < 13){

            $erro = "Por favor inserir um telefone válido.";

        } else {

            $conexao = new mysqli(
                "127.0.0.1",
                "root",
                "",
                "sistemaescola"
            );

            if($conexao->connect_errno){

                $erro = "Ocorreu um erro na conexão com o banco de dados.";

            } else {

                $conexao->set_charset("utf8");

                $sql = "UPDATE aluno SET
                        id = '$ID',
                        nome = '$nome',
                        dataNascimento = '$datanasc',
                        nomePai = '$nomepai',
                        nomeMae = '$nomemae',
                        telefone = '$telefone',
                        email = '$email',
                        sexo = '$sexo',
                        bairro = '$bairro'
                        WHERE id = '$ID'";

                if($conexao->query($sql) === TRUE){

                    $sucesso = "Dados alterados com sucesso!";

                } else {

                    $erro = "Erro ao atualizar os dados: ".$conexao->error;

                }

                $conexao->close();
            }
        }
    }

} else {

    $erro = "Campo obrigatório não preenchido.";

}

if(isset($erro)){

    echo '
    <div class="alert alert-danger">
        '.$erro.'
    </div>';

}

if(isset($sucesso)){

    echo '
    <div class="alert alert-success">
        '.$sucesso.'
    </div>';

}
?>

            <div class="mt-4">

                <a href="atualizar.php"
                   class="btn btn-primary">
                    Voltar
                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>