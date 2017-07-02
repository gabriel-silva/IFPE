<?php

include "DBConnection/DBConnection.php";

class Update
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

        if (isset($_POST['deleteFuncionario'])) {

            $id = $_POST['deleteFuncionario'];
            $this->deleteFuncionario($id, "FUNCIONARIO");
            header("location: HomeAdmin.php");
        }

        if (isset($_POST['deleteEstudante'])) {

            $id = $_POST['deleteEstudante'];
            $this->deleteEstudante($id, "ESTUDANTE");
            header("location: HomeAdmin.php");
        }
    }

}

$update = new Delete();
$update->main();

?>