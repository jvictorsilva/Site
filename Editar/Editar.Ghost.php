<?php
include ("../classes/Sql.Class.php");
$Db = new Sql;
$con = $Db->Conectar("diario");

include ("../classes/Estrutura.Class.php");
$Es = new Estrutura;

if ($_GET['acao'] == "atividades") {

    $tab = "atividades";
    $alterar = "nome='".$_POST['nome']."',"."data='" . $_POST['data'] . "',inicio='" . $_POST['inicio'] . "',termino='" . $_POST['termino'] . "',descri='" . $_POST['descri'] . "'";
    $header = "../Exibir.php?acao=atividades";
    
} else if ($_GET['acao'] == "componentes") {

    $tab = "componentes";
    $alterar = "nome='" . $_POST['nome'] . "'";
    $header = "Lista.php?acao=componente";
    
}
 else if ($_GET['acao'] == "individu") {

    $tab = "compativ";
    $alterar = "descri='" . $_POST['descri'] . "'";
    $header = "../Exibir.php?acao=atividades";
    
} else {
    
    header("Location: Editar.php");
    
}

$sql = "UPDATE ".$tab. " SET " . $alterar . " WHERE id = ".$_GET['id'].";";
$res=mysql_query($sql, $con) or die($Es->Falha($sql, mysql_error($con), 3));

header("Location: ".$header);