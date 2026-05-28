<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro Aluno</title>

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
            <h1 class="text-primary">
                U.C Testes de Sistemas - SENAI SC
            </h1>

            <h3 class="text-primary">
                Formulário de Cadastro do Aluno
            </h3>
        </div>

        <hr class="border border-primary border-2">

        <!-- Card -->
        <div class="card shadow-lg border-0">

            <div class="card-body p-5">

                <h2 class="text-center text-primary mb-4">
                    Dados Pessoais
                </h2>

                <!-- FORM -->
                <form method="POST" action="cadastro.php">

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label">
                            Nome do Aluno(a)
                        </label>

                        <div class="col-md-9">
                            <input type="text"
                                   name="Nome"
                                   class="form-control">
                        </div>
                    </div>

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
                                   onkeydown="javascript:fMasc(this,mData)">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label">
                            Nome do Pai
                        </label>

                        <div class="col-md-9">
                            <input type="text"
                                   name="NomePai"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label">
                            Nome da Mãe
                        </label>

                        <div class="col-md-9">
                            <input type="text"
                                   name="NomeMae"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label">
                            Telefone
                        </label>

                        <div class="col-md-9">
                            <input type="text"
                                   name="Telefone"
                                   class="form-control"
                                   maxlength="14"
                                   onkeydown="javascript:fMasc(this,mTel)">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label">
                            E-Mail
                        </label>

                        <div class="col-md-9">
                            <input type="email"
                                   name="Email"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-md-3 col-form-label">
                            Sexo
                        </label>

                        <div class="col-md-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input"
                                       type="radio"
                                       name="Sexo"
                                       value="Masculino">

                                <label class="form-check-label">
                                    Masculino
                                </label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input"
                                       type="radio"
                                       name="Sexo"
                                       value="Feminino">

                                <label class="form-check-label">
                                    Feminino
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-md-3 col-form-label">
                            Bairro
                        </label>

                        <div class="col-md-9">
                            <select name="Bairro"
                                    class="form-select">

                                <option></option>
                                <option>Agua Verde</option>
                                <option>Alto da XV</option>
                                <option>Batel</option>
                                <option>Cajuru</option>
                                <option>Centro Civico</option>
                                <option>Ecoville</option>
                                <option>Hauer</option>
                                <option>Jardim Botanico</option>
                                <option>Jardim das Americas</option>
                                <option>Portão</option>
                                <option>Santa Candida</option>
                                <option>Sitio Cercado</option>
                                <option>Xaxim</option>
                                <option>Boqueirão</option>
                                <option>CIC</option>

                            </select>
                        </div>
                    </div>

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