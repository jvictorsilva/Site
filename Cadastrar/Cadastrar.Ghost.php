<?php // Ola git
include ("../Classes/Estrutura.Class.php");
$Es = new Estrutura;

include ("../Classes/Sql.Class.php");
$Db = new Sql;
$con = $Db->Conectar("diario");
            
$dados = "";
$campos = "";
$tab = "";
$res = "";
$header = "";

if ($_GET['acao'] == "atividade"){
    
    $tab = "atividades";
    $dados = "'".$_POST['nome']."','".$_POST['data']."','".$_POST['inicio']."','".$_POST['termino']."','".$_POST['descri']."'";
    $campos = "nome,data,inicio,termino,descri";
    $header = "../Exibir.php?acao=atividades";
    
} else if ($_GET['acao'] == "componente"){
    
    $tab = "componentes";
    $dados = "'".$_POST['nome']."'";
    $campos = "nome";
    $header = "../Exibir.php?acao=componentes";
    
} else if ($_GET['acao'] == "individual"){
    
    $tab = "compativ";
    $dados = $_POST['componente'].",".$_GET['atividade'].",'".$_POST['descri']."'";
    $campos = "componente,atividade,descri";
    $header = "../Exibir.php?acao=atividades";
    
}

$sql = "INSERT INTO ". $tab ." (".$campos.") VALUES (".$dados.");";
$res = mysql_query($sql, $con) or die(mysql_error($con)."<br> Query: ".$sql);

$dado = $Db->Select(1,$con,"*",$tab,"","ORDER BY id DESC LIMIT 1");

header("Location: ".$header);