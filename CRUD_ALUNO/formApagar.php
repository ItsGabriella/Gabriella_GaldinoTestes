
<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Apagar Aluno</title>

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

                    <a href="index.php" class="btn btn-outline-primary">
                        Home
                    </a>

                    <a href="../CRUD_MATRICULA/formMatricula.php" class="btn btn-outline-primary">
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
            Apagar Dados do Aluno
        </h3>

    </div>

    <hr class="border border-primary border-2">

<?php

$ID = "";
$nome = "";
$dataNasc = "";
$nomePai = "";
$nomeMae = "";
$telefone = "";
$email = "";
$sexo = "";
$bairro = "";

if(empty($_POST["ID"])){

    echo '<div class="alert alert-danger text-center">
            Por favor preencher o campo ID.
          </div>';

} else {

    $ID = $_POST["ID"];

    $conexao = new mysqli("127.0.0.1","root","","sistemaescola");

    if($conexao->connect_errno){

        echo '<div class="alert alert-danger text-center">
                Erro na conexão com o banco de dados.
              </div>';

    } else {

        $conexao->set_charset("utf8");

        $sql = "SELECT * FROM aluno WHERE id='$ID'";

        $result = $conexao->query($sql);

        if($result && $result->num_rows > 0){

            $linha = $result->fetch_assoc();

            $nome = $linha["nome"];
            $dataNasc = $linha["dataNascimento"];
            $nomePai = $linha["nomePai"];
            $nomeMae = $linha["nomeMae"];
            $telefone = $linha["telefone"];
            $email = $linha["email"];
            $sexo = $linha["sexo"];
            $bairro = $linha["bairro"];

        } else {

            echo '<div class="alert alert-warning text-center">
                    ID não encontrado.
                  </div>';
        }

        $conexao->close();
    }
}
?>

    <div class="card border-0 shadow-lg mt-4">

        <div class="card-body p-5">

            <h2 class="text-center text-primary mb-4">
                Confirmar Exclusão
            </h2>

            <form method="POST" action="apaga.php">

                <input type="hidden"
                       name="ID"
                       value="<?=$ID?>">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Nome</label>
                        <input type="text"
                               class="form-control"
                               value="<?=$nome?>"
                               disabled>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Data de Nascimento</label>
                        <input type="text"
                               class="form-control"
                               value="<?=$dataNasc?>"
                               disabled>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Nome do Pai</label>
                        <input type="text"
                               class="form-control"
                               value="<?=$nomePai?>"
                               disabled>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Nome da Mãe</label>
                        <input type="text"
                               class="form-control"
                               value="<?=$nomeMae?>"
                               disabled>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Telefone</label>
                        <input type="text"
                               class="form-control"
                               value="<?=$telefone?>"
                               disabled>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="text"
                               class="form-control"
                               value="<?=$email?>"
                               disabled>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Sexo</label>
                        <input type="text"
                               class="form-control"
                               value="<?=$sexo?>"
                               disabled>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Bairro</label>
                        <input type="text"
                               class="form-control"
                               value="<?=$bairro?>"
                               disabled>
                    </div>

                </div>

                <div class="alert alert-danger text-center mt-3">
                    Tem certeza que deseja excluir este aluno?
                </div>

                <div class="text-center">

                    <input type="submit"
                           value="Deletar Aluno(a)"
                           class="btn btn-primary px-5">

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>

