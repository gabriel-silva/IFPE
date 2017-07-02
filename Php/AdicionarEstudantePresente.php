<?php

session_start();

if (!isset($_SESSION["matriculaAdmin"]) && !isset($_SESSION["matriculaFuncionario"])) {
    echo '<script>alert("Ops, você está logado? Acho que não. :( ")</script>';
    echo '<script>window.location=\'Login.php\';</script>';
}

?>

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
                <form class="text-center py-5 my-5 w-100" method="post" action="Insert.php">
                    <div class="form-group w-100">
                        <input type="hidden" class="form-control" name="ENTRADA_ESTUDANTE"
                               value="<?php echo $_GET["ENTRADA_ESTUDANTE"]; ?>"></div>
                    <div class="form-group w-100"><label class="">NÚMERO DA ENTRADA: <br></label>
                        <input type="number" class="form-control" placeholder="Informe o Número da Entrada"
                               name="NUM_ENTRADA"></div>
                    <div class="form-group w-100"><label>DATA DA ENTRADA: </label>
                        <input type="date" class="form-control" placeholder="data do dia" name="DATA" required="">
                    </div>
                    <button type="submit" name="AdicionarEstudantePresente"
                            class="btn text-center text-uppercase text-white btn-block btn-success" data-toggle="">
                        ADICIONAR ESTUDANTE PRESENTE
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