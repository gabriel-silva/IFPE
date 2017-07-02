<?php

include "DBConnection/DBConnection.php";

class validacao
{

    public function validacaoUsuario($matricula, $senha, $tabela)
    {
        $con = DBConnection::getConnection();
        $exec = $con->connection->prepare("SELECT * FROM $tabela WHERE MATRICULA = ? AND SENHA = ?");
        $exec->execute(array($matricula, $senha));
        $res = $exec->fetchAll();
        return count($res);

    }

    public function main()
    {

        if (isset($_POST['submit'])) {

            $matricula = $_POST["matricula"];
            $senha = $_POST["senha"];

            $validacaoAdmin = $this->validacaoUsuario($matricula, $senha, "ADMIN");
            $validacaoFuncionario = $this->validacaoUsuario($matricula, $senha, "FUNCIONARIO");

            if ($validacaoAdmin > 0) {

                $_SESSION['matriculaAdmin'] = $matricula;
                header("location: HomeAdmin.php");

            } else if ($validacaoFuncionario > 0) {

                $_SESSION['matriculaFuncionario'] = $matricula;
                header("location: HomeFuncionario.php");

            } else {
                echo "ops, tem algo de errado!";
            }

        }
    }
}

$val = new validacao();
$val->main();

?>