<?php

include "DBConnection/DBConnection.php";

class Delete
{

    public function deleteFuncionario($id, $tabela)
    {
        $con = DBConnection::getConnection();
        $exec = $con->connection->prepare("DELETE FROM $tabela WHERE ID = ?");
        $exec->execute(array($id));

    }

    public function deleteEstudante($id, $tabela)
    {
        $con = DBConnection::getConnection();
        $exec = $con->connection->prepare("DELETE FROM $tabela WHERE ID = ?");
        $exec->execute(array($id));

    }

    public function main()
    {

        if (isset($_GET['deleteFuncionario'])) {

            $id = $_GET['deleteFuncionario'];
            $this->deleteFuncionario($id, "FUNCIONARIO");
            header("location: HomeAdmin.php");
        } else {

            $id = $_GET['deleteEstudante'];
            $this->deleteEstudante($id, "ESTUDANTE");
            header("location: HomeAdmin.php");
        }
    }

}

if (!isset($_SESSION["matriculaAdmin"]) && !isset($_SESSION["matriculaFuncionario"])) {
    echo '<script>alert("Ops, você está logado? Acho que não. :( ")</script>';
    echo '<script>window.location=\'Login.php\';</script>';

} else {

    $delete = new Delete();
    $delete->main();

}

?>