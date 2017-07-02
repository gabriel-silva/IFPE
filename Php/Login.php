<?php

session_start();

if (isset($_SESSION["matriculaAdmin"])) {
    header("location: HomeAdmin.php");
} else {
    if (isset($_SESSION["matriculaFuncionario"])) {
        header("location: HomeFuncionario.php");
    }
}

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

<body class="h-100 w-100">
<div class="p-0 m-0 h-100">
    <div class="container">
        <div class="row w-100 mx-auto">
            <div class="w-75 py-5 h-75 text-center col-sm-7 mx-auto">
                <form class="text-center py-5 my-5 w-100" method="post" action="Validacao.php">
                    <div class="form-group w-100"><label class="">Matricula<br></label>
                        <input type="text" class="form-control" placeholder="Informe sua matricula" name="matricula">
                    </div>
                    <div class="form-group w-100"><label>Senha</label>
                        <input type="password" class="form-control" placeholder="Informe sua senha" name="senha"></div>
                    <button type="submit" name="submit"
                            class="btn text-center text-uppercase text-white btn-block btn-success"
                            data-toggle="">Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>
</body>
</html>