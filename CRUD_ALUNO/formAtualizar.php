<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Atualizar Dados</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script>
        function fMasc(objeto, mascara){
            obj = objeto;
            masc = mascara;
            setTimeout("fMascEx()",1);
        }

        function fMascEx(){
            obj.value = masc(obj.value);
        }

        function mData(cpf){
            cpf = cpf.replace(/\D/g,"");
            cpf = cpf.replace(/(\d{6})(\d)/,"$1/$2");
            cpf = cpf.replace(/(\d{4})(\d)/,"$1/$2");
            return cpf;
        }

        function mTel(tel){
            tel = tel.replace(/\D/g,"");
            tel = tel.replace(/^(\d)/,"($1");
            tel = tel.replace(/(.{3})(\d)/,"$1)$2");

            if (tel.length == 9) {
                tel = tel.replace(/(.{1})$/,"-$1");
            } else if (tel.length == 10) {
                tel = tel.replace(/(.{2})$/,"-$1");
            } else if (tel.length == 11) {
                tel = tel.replace(/(.{3})$/,"-$1");
            } else if (tel.length >= 12) {
                tel = tel.replace(/(.{4})$/,"-$1");
            }

            return tel;
        }
    </script>
</head>

<body class="bg-light">

<div class="container py-5">

    <!-- Título -->
    <div class="text-center mb-4">

        <h1 class="text-primary fw-bold">
            U.C Testes de Sistemas - SENAI SC
        </h1>

        <h3 class="text-primary">
            Formulário de Alteração de Dados do Aluno
        </h3>

    </div>

    <hr class="border border-primary border-2">

<?php 

    if(empty($_POST["ID"])){

        echo '
        <div class="alert alert-danger text-center">
            Por favor preencher o campo ID
        </div>';

    } else {

        $ID = $_POST["ID"];

        $conexao = new mysqli("127.0.0.1","root","","sistemaescola");

        if($conexao->connect_errno){

            echo '
            <div class="alert alert-danger text-center">
                Ocorreu um erro na conexão com o banco de dados.
            </div>';

            exit;
        }

        $conexao->set_charset("utf8");

        $sql = "SELECT * FROM aluno WHERE id ='$ID'";

        $result = $conexao->query($sql);

        if($result){

            if($result->num_rows > 0){

                while($linha = $result->fetch_assoc()){

                    $ID = $linha["id"];
                    $nome = $linha["nome"];
                    $dataNasc = $linha["dataNascimento"];
                    $nomePai = $linha["nomePai"];
                    $nomeMae = $linha["nomeMae"];
                    $telefone = $linha["telefone"];
                    $email = $linha["email"];
                    $sexo = $linha["sexo"];
                    $bairro = $linha["bairro"];
                }

            } else {

                echo '
                <div class="alert alert-warning text-center">
                    ID não encontrado.
                </div>';
            }

        } else {

            echo '
            <div class="alert alert-danger text-center">
                Erro na consulta SQL.
            </div>';
        }

        $conexao->close();
    }

?>

    <!-- Card -->
    <div class="card shadow-lg border-0 mt-4">

        <div class="card-body p-5">

            <h2 class="text-center text-primary mb-4">
                Dados do Aluno
            </h2>

            <form method="POST" action="atualiza.php">

                <input type="hidden" name="ID" value="<?=$ID?>">

                <!-- Nome -->
                <div class="row mb-3">

                    <label class="col-md-3 col-form-label">
                        Nome do Aluno(a)
                    </label>

                    <div class="col-md-9">
                        <input type="text"
                               name="Nome"
                               class="form-control"
                               value="<?=$nome?>">
                    </div>

                </div>

                <!-- Data -->
                <div class="row mb-3">

                    <label class="col-md-3 col-form-label">
                        Data de Nascimento
                    </label>

                    <div class="col-md-9">
                        <input type="text"
                               name="DataNasc"
                               class="form-control"
                               placeholder="aaaa/mm/dd"
                               maxlength="10"
                               value="<?=$dataNasc?>"
                               onkeydown="javascript:fMasc(this,mData)">
                    </div>

                </div>

                <!-- Pai -->
                <div class="row mb-3">

                    <label class="col-md-3 col-form-label">
                        Nome do Pai
                    </label>

                    <div class="col-md-9">
                        <input type="text"
                               name="NomePai"
                               class="form-control"
                               value="<?=$nomePai?>">
                    </div>

                </div>

                <!-- Mãe -->
                <div class="row mb-3">

                    <label class="col-md-3 col-form-label">
                        Nome da Mãe
                    </label>

                    <div class="col-md-9">
                        <input type="text"
                               name="NomeMae"
                               class="form-control"
                               value="<?=$nomeMae?>">
                    </div>

                </div>

                <!-- Telefone -->
                <div class="row mb-3">

                    <label class="col-md-3 col-form-label">
                        Telefone
                    </label>

                    <div class="col-md-9">
                        <input type="text"
                               name="Telefone"
                               class="form-control"
                               maxlength="14"
                               value="<?=$telefone?>"
                               onkeydown="javascript:fMasc(this,mTel)">
                    </div>

                </div>

                <!-- Email -->
                <div class="row mb-3">

                    <label class="col-md-3 col-form-label">
                        E-Mail
                    </label>

                    <div class="col-md-9">
                        <input type="email"
                               name="Email"
                               class="form-control"
                               value="<?=$email?>">
                    </div>

                </div>

                <!-- Sexo -->
                <div class="row mb-4">

                    <label class="col-md-3 col-form-label">
                        Sexo
                    </label>

                    <div class="col-md-9">

                        <div class="form-check form-check-inline">

                            <input class="form-check-input"
                                   type="radio"
                                   name="Sexo"
                                   value="Masculino"
                                   <?php echo($sexo == 'Masculino') ? "checked" : ""; ?>>

                            <label class="form-check-label">
                                Masculino
                            </label>

                        </div>

                        <div class="form-check form-check-inline">

                            <input class="form-check-input"
                                   type="radio"
                                   name="Sexo"
                                   value="Feminino"
                                   <?php echo($sexo == 'Feminino') ? "checked" : ""; ?>>

                            <label class="form-check-label">
                                Feminino
                            </label>

                        </div>

                    </div>

                </div>

                <!-- Bairro -->
                <div class="row mb-4">

                    <label class="col-md-3 col-form-label">
                        Bairro
                    </label>

                    <div class="col-md-9">

                        <select name="Bairro" class="form-select">

                            <option></option>

                            <option <?=($bairro == 'Agua Verde') ? "selected" : ""; ?>>Agua Verde</option>

                            <option <?=($bairro == 'Alto da XV') ? "selected" : ""; ?>>Alto da XV</option>

                            <option <?=($bairro == 'Batel') ? "selected" : ""; ?>>Batel</option>

                            <option <?=($bairro == 'Cajuru') ? "selected" : ""; ?>>Cajuru</option>

                            <option <?=($bairro == 'Centro Civico') ? "selected" : ""; ?>>Centro Civico</option>

                            <option <?=($bairro == 'Ecoville') ? "selected" : ""; ?>>Ecoville</option>

                            <option <?=($bairro == 'Hauer') ? "selected" : ""; ?>>Hauer</option>

                            <option <?=($bairro == 'Jardim Botanico') ? "selected" : ""; ?>>Jardim Botanico</option>

                            <option <?=($bairro == 'Jardim das Americas') ? "selected" : ""; ?>>Jardim das Americas</option>

                            <option <?=($bairro == 'Portão') ? "selected" : ""; ?>>Portão</option>

                            <option <?=($bairro == 'Santa Candida') ? "selected" : ""; ?>>Santa Candida</option>

                            <option <?=($bairro == 'Sitio Cercado') ? "selected" : ""; ?>>Sitio Cercado</option>

                            <option <?=($bairro == 'Xaxim') ? "selected" : ""; ?>>Xaxim</option>

                            <option <?=($bairro == 'Boqueirão') ? "selected" : ""; ?>>Boqueirão</option>

                            <option <?=($bairro == 'CIC') ? "selected" : ""; ?>>CIC</option>

                        </select>

                    </div>

                </div>

                <!-- Botões -->
                <div class="text-center">

                    <input type="submit"
                           value="Atualizar Dados"
                           class="btn btn-primary px-4">

                    <input type="reset"
                           value="Limpar Dados"
                           class="btn btn-outline-primary px-4">

                </div>

            </form>

        </div>

    </div>

    <!-- Menu -->
    <hr class="border border-primary border-2 my-5">

    <div class="d-flex flex-wrap justify-content-center gap-3">

        <form method="POST" action="listar.php">
            <input type="submit"
                   value="Listar Alunos"
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