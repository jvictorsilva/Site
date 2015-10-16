<?php
include ("../classes/Sql.Class.php");
$Db = new Sql;
$con = $Db->Conectar("diario");

include ("../classes/Estrutura.Class.php");
$Es = new Estrutura;

if ($_GET['acao'] == "atividades") {

    $tab = "atividades";
    $header = "../Exibir.php?acao=atividades";
    
} else if ($_GET['acao'] == "componentes") {

    $tab = "componentes";
    $header = "../Exibir.php?acao=componentes";
    
}
 else if ($_GET['acao'] == "individu") {

    $tab = "compativ";
    $header = "../Exibir.php?acao=atividades";
    
} else {
    
    header("Location: ../Exibir.php");
    
}

$sql = "DELETE FROM ".$tab. " WHERE id = ".$_GET['id'].";";
$res = mysql_query($sql, $con) or die($Es->Falha($sql, mysql_error($con), 3));

header("Location: ".$header);