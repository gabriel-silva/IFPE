<?php

include "DBConnection/DBConnection.php";

class Insert
{

    public function insertFuncionario($nome, $matricula, $senha, $tabela)
    {
        $con = DBConnection::getConnection();
        $exec = $con->connection->prepare("INSERT INTO $tabela VALUES (?, ?, ?)");
        $exec->execute(array($nome, $matricula, $senha));

    }

    public function insertEstudante($nome, $matricula, $tabela)
    {
        $con = DBConnection::getConnection();
        $exec = $con->connection->prepare("INSERT INTO $tabela VALUES (?, ?)");
        $exec->execute(array($nome, $matricula));

    }


    public function insertEstudantePresente($numEntrada, $entradaEstudante, $entradaRegistro, $tabela)
    {
        $con = DBConnection::getConnection();
        $exec = $con->connection->prepare("INSERT INTO $tabela VALUES (?, ?, ?)");
        $exec->execute(array($numEntrada, $entradaEstudante, $entradaRegistro));
    }

    public function insertData($dataEntrada)
    {
        $con = DBConnection::getConnection();
        $execData = $con->connection->prepare("INSERT INTO REGISTRO(DATA) VALUES (?)");
        $execData->execute(array($dataEntrada));
    }

    public function main()
    {

        if (isset($_POST['AdicionarFuncionario'])) {

            $nome = $_POST["nome"];
            $matricula = $_POST["matricula"];
            $senha = $_POST["senha"];
            $this->insertFuncionario($nome, $matricula, $senha, "FUNCIONARIO(NOME, MATRICULA, SENHA)");
            header("location: HomeAdmin.php");
        }

        else if (isset($_POST['AdicionarEstudante'])) {

            $nome = $_POST["nome"];
            $matricula = $_POST["matricula"];
            $this->insertEstudante($nome, $matricula, "ESTUDANTE(NOME, MATRICULA)");
            header("location: HomeAdmin.php");

        }

        else if (isset($_POST['AdicionarEstudantePresente']) && isset($_SESSION["matriculaAdmin"])) {

            $arr = array($_POST["NUM_ENTRADA"], $_POST["ENTRADA_ESTUDANTE"], $_POST["ENTRADA_REGISTRO"]);
            $arr2 = array_map('intval', $arr);

            $numEntrada = $arr2[0];
            $entradaEstudante = $arr2[1];
            $entradaRegistro = $arr2[1];

            $dataEntrada = $_POST["DATA"];
            $this->insertData($dataEntrada);
            $this->insertEstudantePresente($numEntrada, $entradaEstudante,
                $entradaRegistro, "ENTRADA_DO_ALUNO(NUM_ENTRADA, ENTRADA_ESTUDANTE, ENTRADA_REGISTRO)");
            header("location: HomeAdmin.php");

        }

        else if (isset($_POST['AdicionarEstudantePresente']) && isset($_SESSION["matriculaFuncionario"])) {

            $arr = array($_POST["NUM_ENTRADA"], $_POST["ENTRADA_ESTUDANTE"], $_POST["ENTRADA_REGISTRO"]);
            $arr2 = array_map('intval', $arr);

            $numEntrada = $arr2[0];
            $entradaEstudante = $arr2[1];
            $entradaRegistro = $arr2[1];

            $dataEntrada = $_POST["DATA"];
            $this->insertData($dataEntrada);
            $this->insertEstudantePresente($numEntrada, $entradaEstudante,
                $entradaRegistro, "ENTRADA_DO_ALUNO(NUM_ENTRADA, ENTRADA_ESTUDANTE, ENTRADA_REGISTRO)");
            header("location: HomeAdmin.php");

        }

        else{
            echo '<script>alert("Ops, você está logado? acho que não. :( ")</script>';
            echo '<script>window.location=\'Login.php\';</script>';
        }

    }

}

$insert = new Insert();
$insert->main();


?>