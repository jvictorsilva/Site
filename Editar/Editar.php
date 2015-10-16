<!DOCTYPE html>

<html>
    
    <head>
        <title>JCLi</title>
        <link rel="stylesheet" href="../Css/Css.css">
        <link rel="stylesheet" href="../Css/Menu.css">
    </head>
    
    <body>
        <?php
        include ("../classes/Estrutura.Class.php");
        $Es = new Estrutura;

        include ("../classes/Sql.Class.php");
        $Db = new Sql;
        $con = $Db->Conectar("diario");      
        
        if ($_GET['acao'] == "atividade") {
            
            $Es->Cabeca(2,"Editar Atividade",3);
            
            ?>
            
            <div id='conteudo'>

                <table border='1'>
                    <tr>
                        <td><b>N°</b></td>
                        <td><b>Nome</b></td>
                    </tr>

                <?php

                $res = $Db->Select(0,$con,"*","atividades","","ORDER BY id DESC");

                while ($atividades = mysql_fetch_array($res)) {

                    ?>
                    <tr>
                        <td><?php echo $atividades['id']; ?></td>
                        <td><?php echo $atividades['nome']; ?></td>
                        <td><a href='Formulario.php?id=<?php echo $atividades['id']; ?>&acao=atividades'>Editar</a></td>
                    </tr>
                    <?php    

                }

                ?>

                </table>

            </div>
        
        <?php
        
        } else if($_GET['acao'] == "componente"){
            
            $Es->Cabeca(2,"Editar Componente",3);
            
            ?> 
            
            <div id='conteudo'>
                
                <table border='1'>
                    <tr>
                        <td><b>N°</b></td>
                        <td><b>Nome</b></td>
                    </tr>

                <?php

                    $res = $Db->Select(0,$con,"*", "componentes","","");

                    while ($componentes = mysql_fetch_array($res)) {
                        ?>
                            <tr>
                                <td><?php echo $componentes['id']; ?></td>
                                <td><?php echo $componentes['nome']; ?></td>
                                <td><a href='Formulario.php?id=<?php echo $componentes['id']; ?>&acao=componentes'>Editar</a></td>
                            </tr>
                        <?php
                    }
                    ?>

                </table>

            </div>
        
            <?php
            
        } else if($_GET['acao'] == "individu") {
            
            $Es->Cabeca(2,"Editar Componente",3);
            
            ?> 
        
            <div id='conteudo'>

                <table border='1'>
                    <tr>
                        <td><b>Nome</b></td>
                        <td><b>Descrição</b></td>
                        <td><b>Nome da Atividade Geral</b></td>
                    </tr>
                <?php

                    $res = $Db->Select(0,$con,"*", "compativ", "","ORDER BY componente DESC");
                    while ($compativ = mysql_fetch_array($res)) {

                        $componente = $Db->Select(1,$con,"nome","componentes", "id=".$compativ['componente'],"");
                        $atividade = $Db->Select(1,$con,"nome", "atividades", "id=" . $compativ['atividade'],"");

                        ?>
                            <tr>
                                <td><a href='Formulario.php?id=<?php echo $compativ['componente']; ?>&acao=individu'><?php echo $componente['nome']; ?></a></td>
                                <td><a href='Formulario.php?id=<?php echo $compativ['componente']; ?>&acao=individu'><?php echo $compativ['descri']; ?></a></td>
                                <td><a href='Formulario.php?id=<?php echo $compativ['componente']; ?>&acao=individu'><?php echo $atividade['nome']; ?></a></td>
                            </tr>
                    <?php

                    }

                    ?>

                </table>
            
            </div>
            
            <?php
            
        } else {
            
            header("Location: Editar.php?acao=atividade");
            
        }
            
        ?>
                
    </body>
</html>