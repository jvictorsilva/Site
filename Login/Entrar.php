<html>
    
    <head>
        <title>JCLi</title>
        <link rel="stylesheet" href="../Css/Css.css">
        <link rel="stylesheet" href="../Css/Menu.css">
    </head>
    
    <?php
    
        include ("../classes/Estrutura.Class.php");
        $Es = new Estrutura;
        
        include ("../classes/Acesso.Class.php");
        $Acesso = new Acesso;
        
        include ("../classes/Sql.Class.php");
        $Db = new Sql; 
        
        $Es->Cabeca(2,"Login",1);
    
    ?>
    
    <body onload='load()'>

    
        <div id="conteudo">
            
            <?php
        
            if($_GET['acao'] != 0){
                
                if ($_GET['acao'] == 1) {
                    
                    $Acesso->FormCadastro();
                    
                } else {
                    
                    if ($_GET['acao'] == 2) {
                        
                        $sql = $Db->Login($_POST['login'],$_POST['senha']);
                        $con = $Db->Conectar();
                        
                        $res = mysql_query($sql,$con) or die ("Erro: " . mysql_error($con));
                        $dados = \mysql_fetch_array($res);

                        if ($dados['login'] != $_POST['login']){
                                
                            $_SESSION['login'] = $_POST['login'];
                            $_SESSION['senha'] = $_POST['senha'];

                            $sql = "INSERT INTO users(login,senha,nome) VALUES ('".$_POST['login']."','".$_POST['senha']."','".$_POST['nome']."');";
                            $res = mysql_query($sql,$con) or die ("Erro: " . mysql_error($con));
                            
                            header("Location: Acesso.php?erro=null&acao=0");
            
                        } else {
                            
                            header("Location: Acesso.php?erro=3&acao=2");
                            
                        }
                    }
                }
                
            } else {
                
                $Acesso->EntradaDados();
                
            }
            
            $Acesso->Erro($_GET['erro']);
            
            ?>
            
        </div>
        
        <?php $Es->Rodape() ?>
        
    </body>
</html>