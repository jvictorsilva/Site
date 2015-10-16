<?php 
    
    session_start();

    if (($_POST['login'] != "") || ($_POST['senha'] != "")){
        
        include ("classes/Sql.Class.php");
        $Db = new Sql;
        
        $sql = $Db->Login($_POST['login'],$_POST['senha']);
        $con = $Db->Conectar();

        $res = mysql_query($sql,$con) or die ("Erro: " . mysql_error($con));
        $dados = mysql_fetch_array($res);
        $num = mysql_num_rows($res);

        if (mysql_num_rows($res) > 0) {

            $_SESSION['login'] = $_POST['login'] ;
            $_SESSION['senha'] = $_POST['senha'];
            $_SESSION['nome'] = $dados['nome'];
            $_SESSION['img'] = $dados['img'];
            $_SESSION['id'] = $dados['id'];

            header("Location: Index.php?acao=0");

        } else {

            header("Location: Entrar.php?erro=1&acao=0");

        }

    } else {

        header("Location: Entrar.php?erro=2&acao=0");

    }    