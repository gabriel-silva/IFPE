<?php

include 'DBConnection/DBConnection.php';

if (!isset($_SESSION["matriculaFuncionario"])) {
    echo '<script>alert("Ops, você está logado? Acho que não. :( ")</script>';
    echo '<script>window.location=\'Login.php\';</script>';
}

$con = DBConnection::getConnection();
$res = $con->connection->prepare("SELECT NOME FROM FUNCIONARIO WHERE MATRICULA = ?");
$res->execute(array($_SESSION["matriculaFuncionario"]));
$result = $res->fetchAll();
$_SESSION["nome"] = $result[0]["NOME"];

$res = $con->connection->query("SELECT ID, NOME, MATRICULA FROM ESTUDANTE");
$estudante = $res->fetchAll();

$res = $con->connection->query("SELECT REGISTRO.ID, ENTRADA_ESTUDANTE, MATRICULA, NOME, DATA FROM ENTRADA_DO_ALUNO, ESTUDANTE, REGISTRO
                                          WHERE ENTRADA_DO_ALUNO.ENTRADA_ESTUDANTE = ESTUDANTE.ID 
                                          AND ENTRADA_DO_ALUNO.ENTRADA_REGISTRO = REGISTRO.ID;");
$estudantePresente = $res->fetchAll();

?>
    <!DOCTYPE>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
              type="text/css">
        <link rel="stylesheet" href="https://pingendo.github.io/templates/blank/theme.css" type="text/css">
    </head>

    <body class="text-center w-100 h-100">
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="w-100 p-0 text-left mx-auto">Bem-vindo(a):&nbsp;<?= $_SESSION["nome"]; ?> </h1>
                </div>
                <form class="col-md-2" method="post" action="">
                    <button class="btn mx-auto btn-success" type="submit" name="sair">Logout</button>
                </form>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row px-0 mx-auto text-center w-100">
                <div class="col-md-12 w-100 mx-auto p-0">
                    <form class="btn-group w-100 mx-auto" method="post" action="">
                        <button type="submit" name="estudante" class="btn btn-success w-50">Lista de Estudantes</button>
                        <button type="submit" name="estudantePresente" class="btn btn-success w-50">Lista de Estudante
                            Presentes no Campus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <?php if (isset($_POST["estudante"])): ?>
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Matricula</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($estudante as $tableEstudante): ?>
                                <?= "<tr>" ?>
                                <?= "<td>" . $tableEstudante["ID"] . "</td>" ?>
                                <?= "<td>" . $tableEstudante["NOME"] . "</td>" ?>
                                <?= "<td>" . $tableEstudante["MATRICULA"] . "</td>" ?>
                                <?= "<td>
                                            <button onclick=window.location=\"Delete.php?deleteFuncionario={$tableEstudante["ID"]}\">
                                                <i class='fa fa-pencil' aria-hidden='true'></i>
                                            </button>&emsp;
                                            <button onclick=window.location=\"Delete.php?deleteFuncionario={$tableEstudante["ID"]}\">
                                                <i class='fa fa-times' aria-hidden='true'></i>
                                            </button>&emsp;
                                            <button onclick=window.location=\"AdicionarEstudantePresente.php?ENTRADA_ESTUDANTE={$tableEstudante["ID"]}\" >
                                                <i class=\"fa fa-user-plus\" aria-hidden=\"true\"></i>
                                             </button>
                                     </td>" ?>
                                <?= "</tr>" ?>
                            <?php endforeach; ?>
                            </tbody>
                        <?php endif; ?>

                        <?php if (isset($_POST["estudantePresente"])): ?>
                        <thead>
                        <tr>
                            <th>Registro da Entrada</th>
                            <th>Numero Estudante</th>
                            <th>Nome</th>
                            <th>Matricula</th>
                            <th>Data de Entrada</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($estudantePresente as $tableEstudantePresente): ?>
                            <?= "<tr>" ?>
                            <?= "<td>" . $tableEstudantePresente["ID"] . "</td>" ?>
                            <?= "<td>" . $tableEstudantePresente["ENTRADA_ESTUDANTE"] . "</td>" ?>
                            <?= "<td>" . $tableEstudantePresente["NOME"] . "</td>" ?>
                            <?= "<td>" . $tableEstudantePresente["MATRICULA"] . "</td>" ?>
                            <?= "<td>" . $tableEstudantePresente["DATA"] . "</td>" ?>
                            <?= "<td>
                                            <button onclick=window.location=\"Delete.php?deleteFuncionario={$tableEstudantePresente["ENTRADA_ESTUDANTE"]}\">
                                                <i class='fa fa-pencil' aria-hidden='true'></i>
                                            </button>&emsp;
                                            <button onclick=window.location=\"Delete.php?deleteFuncionario={$tableEstudantePresente["ENTRADA_ESTUDANTE"]}\">
                                                <i class='fa fa-times' aria-hidden='true'></i>
                                            </button>
                                     </td>" ?>
                            <?= "</tr>" ?>
                        <?php endforeach; ?>
                        <tbody>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>
    </body>
    </html>

<?php
if (isset($_POST["sair"])) {
    unset($_SESSION["matriculaFuncionario"]);
    unset($_SESSION["nome"]);
    echo '<script>alert("Tchauzinho! :( ")</script>';
    echo '<script>window.location=\'Login.php\';</script>';
}
?>