<!DOCTYPE html>
<html>
    
    <head>
        <title>JCLi</title>
        <link rel="stylesheet" href="Css/Css.css">
        <link rel="stylesheet" href="Css/Menu.css">
        <link rel="stylesheet" href="Css/Fontes.css">
        <link rel="stylesheet" href="Css/Atividades.css">
    </head>
    
    <body>
        
        <?php
        include ("classes/Estrutura.Class.php");
        $Es = new Estrutura;

        include ("classes/Sql.Class.php");
        $Db = new Sql;
        $con = $Db->Conectar("diario");
        
        if ($_GET['acao'] == "atividades") {
            
            $Es->Cabeca(1,"Atividades",1);
            
            ?>
            
            <div id='conteudo'>
                
                <h1>Atividades</h1>
                
                <div class="descri-pagina"><h3 class="center">Segue abaixo a lista de das tarefas que referêm-se ao desenvolvimento da plataforma com seu dia e horário, sendo também listadas as sub-tarefas e os respectivos que nela trabalharam.</h3></div>
            
            <?php
            
            $res = $Db->Select(0,$con,"*","atividades","","ORDER BY id DESC");
            while ($atividades = mysql_fetch_array($res)) {

            ?>
                
                <table class='tabela-atividades conteudo-table'>

                    <tr>
                        <td colspan="4">
                            <p style="
                               
                                font-size:30px;
/*                                color:#8B658B;*/
                                color:#008B8B;
                                
                                ">
                                <?php echo $atividades['nome'];?>
                            </p>
                            <p style="
                               
                                margin-top:10px;
                                margin-bottom:7px;
                                
                                ">
                                <a style="background:#008B8B;" class='link' href='Editar/Formulario.php?acao=atividades&id=<?php echo $atividades['id'];?>'>Editar</a>
                                <a style="background:#008B8B;" class='link' href='Excluir/Excluir.php?id=<?php echo $atividades['id']; ?>&acao=atividades'>Excluir</a>
                            </p>
                            
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2">
                            <p>
                            <img src='Img/Formulario/dia.png' width='25' height='25'>
                                <span class='cubo'></span>Data: 
                                <?php echo $atividades['data']; ?>
                            </p>
                        </td>
                        
                        <td>
                            <p>
                                <img src='Img/Formulario/relogio.png' width='25' height='25'>
                                <span class='cubo'></span>Horario de Início:
                                <?php echo $atividades['inicio']; ?>
                            </p>
                        </td>
                        
                        <td>
                            <p>
                                <img src='Img/Formulario/relogio.png' width='25' height='25'>
                                <span class='cubo'></span>Horario de Término:
                                <?php echo $atividades['termino']; ?>
                            </p>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <p>
                                <img src='Img/Formulario/notas.png' width='25' height='25'/>
                                <span class='cubo'></span>Descrição da Atividade
                            </p>
                        </td> 
                        <td colspan="3"><?php echo $atividades['descri']; ?></td> 
                    </tr>
                            
                    <tr>
                        
                        <?php
                        $rowspan = 0;
                        $res_individu = $Db->Select(0,$con,"*","compativ","atividade=".$atividades['id'],"ORDER BY id DESC");
                        while ($individu = mysql_fetch_array($res_individu)) {
                            
                            $rowspan += 1;
                                    
                        }
                        ?>
                        
                        <td rowspan="<?php echo $rowspan; ?>">
                            
                            <p>
                                <img src='Img/Formulario/user.png' width='25' height='25'/>
                                <span class='cubo'></span>Participações
                                <a class='link' href='Cadastrar/Form.php?acao=individu2&atividade=<?php echo $atividades['id']; ?>&nome=<?php echo $atividades['descri']; ?>&data=<?php echo $atividades['data']; ?>'>+</a>
                            </p>
                        </td>
                        
                        <?php
                        
                        $res_individu = $Db->Select(0,$con,"*","compativ","atividade=".$atividades['id'],"ORDER BY id DESC");
                        $i = 0;
                        while ($individu = mysql_fetch_array($res_individu)) {
                            echo $i > 0? "<tr>" : "";
                            $componente = $Db->Select(1,$con,"*","componentes","id=".$individu['componente'],"ORDER BY id DESC");
                        
                            ?>
                            <td><?php echo $componente['nome'];?></td>
                            <td colspan='2'>
                                <?php echo $individu['descri']; ?>
                                <a class='link' href='Editar/Formulario.php?id=<?php echo $individu['id']; ?>&acao=individu'>Editar</a>
                                <a class='link' href='Excluir/Excluir.php?id=<?php echo $individu['id']; ?>&acao=individu'>Apagar</a>
                            </td></tr>
                            <?php
                            $i++;
                        }
                        ?>
                    </tr>
                </table><br>
                
                <?php

                }
                echo "</div>";
                
            } else if ($_GET['acao'] == "componentes") {
                
                $Es->Cabeca(1,"Componentes",1);
                ?>
                
                <div id='conteudo'>
                    
                    <table class="table-componentes">
                        
                        <tr>
                            <td><b>Nome</b></td>
                            <td><b>Opções</b></td>
                        </tr>
                        
                    <?php

                    $res = $Db->Select(0,$con,"*", "componentes", "", "ORDER BY id DESC");
                    while ($componentes = mysql_fetch_array($res)) {
                        
                    ?>
                        <tr>
                            <td><?php echo $componentes['nome']; ?></td>
                            <td><a class="link" href='Excluir/Excluir.php?id=<?php echo $componentes['id']; ?>&acao=componentes'>Apagar</a></td>
                            <td><a class="link" href='Exibir.php?acao=individu&id=<?php echo $componentes['id']; ?>'>Participações</a></td>
                        </tr>
                    <?php
                    
                    }
                    ?>

                    </table>
                    
                </div>
                
                <?php
                
            } else if ($_GET['acao'] == "individu") {
                
                $componente = $Db->Select(1,$con,"*","componentes","id=".$_GET['id'],"");
                
                $Es->Cabeca(1,"Tarefas Individuais - ".$componente['nome'],1);
                ?> 
            <div id='conteudo'>
                <table border='1'>
                    <tr>
                        <td><b>Data</b></td>
                        <td><b>Descrição</b></td>
                        <td><b>Nome da Atividade Geral</b></td>
                    </tr>
                <?php

                $res = $Db->Select(0,$con,"*","compativ","componente=".$_GET['id'],"ORDER BY componente DESC");
                while ($compativ = mysql_fetch_array($res)) {

                    $atividade = $Db->Select(1,$con,"*","atividades","id=" . $compativ['atividade'],"");

                    ?>
                        <tr>
                            <td><?php echo $atividade['data']; ?></td>
                            <td><?php echo $compativ['descri']; ?></td>
                            <td><?php echo $atividade['nome']; ?></td>
                        </tr>
                    <?php

                }
            
        ?>

            </table>
            </div>
        <?php
        
        } else {
            
            header("Location: ../index.php");
            
        }
        
        ?>

    </body>
</html>
