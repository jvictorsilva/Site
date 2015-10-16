<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Css/Css.css">
        <title></title>
    </head>
    <body>
        
        <?php
            
            include ("classes/Estrutura.Class.php");
            $Es = new Estrutura;
            
            include ("classes/Sql.Class.php");
            $Db = new Sql;
            $con = $Db->Conectar("diario");
        
            if($_GET['acao']=="atividades"){
                
                $atividade = $Db->Select(1,$con,"*","atividades","id=".$_GET['id'],"","");
                $Es->Cabeca(1,"Atividade: ".$atividade['nome'],1);
                
                ?>
                
                <h3>Definições Técnicas - <a class='bot' href='Editar/Formulario.php?acao=atividades&id=<?php echo $atividade['id']; ?>'>Editar</a></h3>
                <table border='1'>
                
                    <tr>
                        <td>Nome </td>
                        <td><?php echo $atividade['nome']?></td>
                    </tr>

                    <tr>
                        <td>Descrição Geral </td>
                        <td><?php echo $atividade['descri']?></td>
                    </tr>

                    <tr>
                        <td>Data </td>
                        <td><?php echo $atividade['data']?></td>
                    </tr>

                    <tr>
                        <td>Ínicio </td>
                        <td><?php echo $atividade['inicio']?></td>  
                    </tr>

                    <tr>
                        <td>Termino </td>
                        <td><?php echo $atividade['termino']?></td>
                    </tr>

                </table>   

                <h3>Participações Nessa Atividade - <a class='bot' href='Cadastrar/Form.php?acao=individu2&atividade=<?php echo $atividade['id']; ?>&nome=<?php echo $atividade['nome']; ?>&data=<?php echo $atividade['data']; ?>'>Adicionar</a></h3>
                
                <table border='1'>
                    <tr>
                        <td><b>Nome do Autor</b></td>
                        <td><b>Descrição</b></td>
                    </tr>
                <?php
                
                $res = $Db->Select(0,$con,"*", "compativ","atividade=".$atividade['id'], "ORDER BY componente DESC");
                while ($compativ = mysql_fetch_array($res)) {

                    $componente = $Db->Select(1,$con,"nome","componentes","id=".$compativ['componente'],"");
                    
                    ?>
                        <tr>
                            <td><?php echo $componente['nome']; ?></a></td>
                            <td><?php echo $compativ['descri']; ?></a></td>
                            <td><a href='Excluir/Excluir.php?id=<?php echo $compativ['id']; ?>&acao=individu'>Apagar</a></td>
                            <td><a href='Editar/Formulario.php?id=<?php echo $compativ['id']; ?>&acao=individu'>Editar</a></td>
                        </tr>
                    <?php

                }

                ?>

                </table>
            
                <?php
                
            }
            else if($_GET['acao'] == "componentes"){
                
                
                
            }
            else if($_GET['acao']=="individu"){
                
                
                
            }
            else {
                
                header("Location: index.php");
                
            }
        ?>
        
    </body>
</html>
