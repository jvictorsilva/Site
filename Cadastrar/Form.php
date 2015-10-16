<!DOCTYPE html>
<html>
    
    <head>
        <title>JCLi</title>
        <link rel="stylesheet" href="../Css/Css.css">
        <link rel="stylesheet" href="../Css/Menu.css">
    </head>
            
    <body>
        
        <?php
        
            include ("../Classes/Estrutura.Class.php");
            $Es = new Estrutura;
            
            include ("../Classes/Sql.Class.php");
            $Db = new Sql;
            $con = $Db->Conectar("diario");
            
            if($_GET['acao'] == "atividade"){
                
                $Es->Cabeca(2,"Cadastrar Atividade",2);
                
                echo "<div id='conteudo'>";
                
                $Es->FormOn("Cadastrar.Ghost.php?acao=atividade");
                    $Es->FormIn("Nome da Atividade","nome","");
                    $Es->FormDate("Data","data","");
                    $Es->FormTime("Inicio","inicio","");
                    $Es->FormTime("Termino","termino","");
                    $Es->FormText("Descrição da Atividade","descri","");
                $Es->FormOff("Cadastrar");
                
                echo "</div>";
                
            } else if($_GET['acao'] == "componente"){
                
                $Es->Cabeca(2,"Cadastrar Componente",2);
                
                echo "<div id='conteudo'>";
                
                $Es->FormOn("Cadastrar.Ghost.php?acao=componente");
                    $Es->FormIn("Nome do Componente","nome","");
                $Es->FormOff("Cadastrar");

                echo "</div>";
                
            } else if($_GET['acao'] == "individu"){
                
                $Es->Cabeca(2,"Cadastrar Atividade Individual",2);
                
                echo "<div id='conteudo'>";
                
                $res = $Db->Select(0,$con,"*","atividades","","");
                
                ?>
                <h3>Selecione uma Atividade Geral</h3>
                <table border='1'>
                    <tr>
                        <td><b>Nome da Atividade</b></td>
                        <td><b>Data</b></td>
                    </tr>
                <?php
                while ($atividades = mysql_fetch_array($res)){
                    ?>
                    <tr>
                        <td><a class='bot' href='Form.php?acao=individu2&atividade=<?php echo $atividades['id']; ?>&nome=<?php echo $atividades['nome']; ?>&data=<?php echo $atividades['data']; ?>' style='margin-left:7px;'>
                            <?php echo $atividades['nome']; ?>
                        </a></td>
                        <td><?php echo $atividades['data']; ?></td>
                    </tr>
                    <?php
                }

                echo "</div>";
            
            } else if($_GET['acao'] == "individu2"){
                
                $Es->Cabeca(2,"Registrar Atividade Individual <br>".$_GET['nome']." - Data: ".$_GET['data'],2);
                
                echo "<div id='conteudo'>";
                
                $Es->FormOn("Cadastrar.Ghost.php?acao=individual&atividade=".$_GET['atividade']);
                    
                    $res = $Db->Select(0,$con,"*","componentes","","");
                    
                    $Es->FormSelOn("Selecione o componente","componente");
                        while ($componentes = mysql_fetch_array($res)){
                            ?>
                                <option value='<?php echo $componentes['id']; ?>'>
                                    <?php echo $componentes['nome']; ?>
                                </option>
                            <?php
                        }
                    $Es->FormSelOff();
                    
                    $Es->FormIn("Descrição","descri","");
                    
                $Es->FormOff("Registrar");
            
                echo "</div>";
                
            } else {
                
                header("Location: Cadastrar.php");
                
            }
        ?>
        
    </body>
    
</html>