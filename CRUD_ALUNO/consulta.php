<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Listar</title>
</head>
<body style="font-family: helvetica;">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <nav class="navbar bg-body-tertiary fixed-top">
    <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                <div class="text-center mt-0">

                    <a href="index.php"
                    class="btn btn-outline-primary mx-2">
                        Home
                    </a>

                    <a href="../CRUD_MATRICULA/formMatricula.php"
                    class="btn btn-outline-primary mx-2">
                        Matrícula
                    </a>

                    </div>
                    <br>
            <li class="nav-item" align="center">
                <form method="POST" action="formAluno.php">
                    <input type="submit"
                        value="Registrar Novo Aluno"
                        class="btn btn-primary">
                </form>
            </li>
            <br>

            <li class="nav-item" align="center">
                <form method="POST" action="procurar.php">
                    <input type="submit"
                        value="Consultar Aluno"
                        class="btn btn-primary">
                </form>
            </li>
            <br>

            <li class="nav-item" align="center">
                <form method="POST" action="atualizar.php">
                    <input type="submit"
                        value="Atualizar Dados do Aluno"
                        class="btn btn-primary">
                </form>
            </li>
            <br>

            <li class="nav-item" align="center">
                <form method="POST" action="apagar.php">
                    <input type="submit"
                        value="Excluir Dados do Aluno"
                        class="btn btn-danger">
                </form>
            </li>
            <br><br><br><br><br><br><br><br>
            <hr>

            <p class="text-center text-secondary">
                Prof. Sergio Luiz da Silveira
            </p>


            </ul>

        </div>
        </div>
    </div>
    </nav>

        <p align="center">
            <font size="7" face="Arial">U.C Testes de Sistemas - SENAI SC</font>
        </p>
    <h4>
        <font color="red">
            <center>Dados do Aluno</center>
        </font>   
    </h4>

    <hr width="100%" align="center" size="3" color="blue"> 

<?php
    if(empty($_POST["Nome"])){
        echo "Por favor preencher o campo do Nome";
    } else {
        $nome = $_POST["Nome"];
        $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
        if($conexao->connect_errno){
            $erro = "Ocorreu um erro na conexão com o banco de dados.";
            exit;
        }
        $conexao->set_charset("utf8");

        $sql = "SELECT id,nome,dataNascimento,nomePai,nomeMae,telefone,email,sexo,bairro FROM aluno WHERE nome LIKE '%$nome%'";
        echo $sql."<hr>";

        $result = $conexao->query($sql);

        if($result->num_rows > 0){
            while($linha = $result->fetch_assoc()){
                echo "Id: ".$linha["id"]."<br>";
                echo "Nome: ".$linha["nome"]."<br>";
                echo "Data de Nascimento: ".$linha["dataNascimento"]."<br>";
                echo "Nome do Pai: ".$linha["nomePai"]."<br>";
                echo "Nome da Mãe: ".$linha["nomeMae"]."<br>";
                echo "Telefone: ".$linha["telefone"]."<br>";
                echo "Email: ".$linha["email"]."<br>";
                echo "Sexo: ".$linha["sexo"]."<br>";
                echo "Bairro: ".$linha["bairro"]."<br><hr>";
            }
        } else {
            echo "Sem resultado <br>";
        }
        $conexao->close();
    }
?>  

<hr class="border border-primary border-2 my-5">


<div class="d-flex flex-wrap justify-content-center gap-3">

    <form method="POST" action="formAluno.php">

        <input type="submit"
               value="Registrar Novo Aluno"
               class="btn btn-primary">

    </form>

    <form method="POST" action="listar.php">

        <input type="submit"
               value="Listar Alunos"
               class="btn btn-primary">

    </form>

    <form method="POST" action="atualizar.php">

        <input type="submit"
               value="Atualizar Dados do Aluno"
               class="btn btn-primary">

    </form>

    <form method="POST" action="apagar.php">

        <input type="submit"
               value="Excluir Dados do Aluno"
               class="btn btn-danger">

    </form>

</div>


<div class="text-center mt-5">

    <a href="index.php"
       class="btn btn-outline-primary mx-2">

        Home

    </a>

    <a href="../CRUD_MATRICULA/formMatricula.php"
       class="btn btn-outline-primary mx-2">

        Matrícula

    </a>

</div>

<hr>

<p class="text-center text-secondary">
    Prof. Sergio Luiz da Silveira
</p>

</div>

</body>
</html>
