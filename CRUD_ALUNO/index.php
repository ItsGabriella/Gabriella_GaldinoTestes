<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Home</title>
</head>
<body style="font-family: helvetica;">
    <form action="">
        <p align="center">
            <font size="7" face="Arial">U.C Testes de Sistemas - SENAI SC</font>
        </p>
        </form>
        <h4>
            <center>Formulário de Cadastro do Aluno</center>
        </h4>
        <hr width="100%" align="center" size="3" color="blue"> <br>

        <table align="center">
            <tr>

                <td>
                    <form method="POST" action="formAluno.php" >
                        <center>
                            <button type="submit" class="btn btn-primary">Cadastrar Aluno</button>
                           
                        </center>
                    </form>
                </td>
                <td>
                    <form method="POST" action="../CRUD_MATRICULA/formMatricula.php" >
                        <center>
                            <button type="submit" class="btn btn-primary">Cadastrar Matricula</button>
                            
                        </center>
                    </form>
                </td>
                
            </tr>
        </table>
        <hr>
        <p align="center" class="text-info bg-dark" id="texto">Prof. Sergio Luiz da Silveira</p>
       
</body>
</html>