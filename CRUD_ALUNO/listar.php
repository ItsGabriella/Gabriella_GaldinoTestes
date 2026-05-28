<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Listar</title>
</head>
<body style="font-family: helvetica;">

    <p align="center">
        <font size="7" face="Arial">U.C Testes de Sistemas - SENAI SC</font>
    </p>
    <h4>
        <font color="green">
            <center>Listagem de Alunos</center>
        </font>   
    </h4>

    <hr width="100%" align="center" size="3" color="blue">
    
<?php
    $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
    if($conexao->connect_errno){
        $erro = "Ocorreu um erro na conexão com o banco de dados.";
        exit;
    }

    $conexao->set_charset("utf8");

    $sql = "SELECT * FROM `aluno`;";
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
?>

<hr class="border border-primary border-2 my-5">

<div class="d-flex flex-wrap justify-content-center gap-3">

    <form method="POST" action="formAluno.php">
        <input type="submit"
               value="Registrar Novo Aluno"
               class="btn btn-primary">
    </form>

    <form method="POST" action="procurar.php">
        <input type="submit"
               value="Consultar Aluno"
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

<!-- Navegação -->
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

<!-- Rodapé -->
<p class="text-center text-secondary">
    Prof. Sergio Luiz da Silveira
</p>

</div>

</body>
</html>
