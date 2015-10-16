<!DOCTYPE html>

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
            
            if($_GET['acao'] == "atividades"){
                
                $atividade = $Db->Select(1,$con,"*","atividades","id=".$_GET['id'],"");
                
                $Es->Cabeca(2,"Excluir Atividade",0);
                
                ?>
                <p>Deseja excluir a atividade <i><?php echo $atividade['nome']; ?></i>?</p>
                <a href='../Exibir.php?acao=atividades'>Não</a>
                <br><a href='Excluir.Ghost.php?id=<?php echo $atividade['id']; ?>&acao=atividades'>Sim</a>
                <?php
                
            }
            else if($_GET['acao'] == "componentes"){
                
                $componente = $Db->Select(1,$con,"*","componentes","id=".$_GET['id'],"");
                
                $Es->Cabeca(2,"Excluir Componente",0);
                
                ?>
                <p>Deseja excluir o componente "<i><?php echo $componente['nome']; ?></i>"?</p>
                <a href='../Exibir.php?acao=componente'>Não</a>
                <br><a href='Excluir.Ghost.php?id=<?php echo $componente['id']; ?>&acao=componentes'>Sim</a>
                <?php
                
            }
            else if($_GET['acao'] == "individu"){
                
                $individu = $Db->Select(1,$con,"*","compativ","id=".$_GET['id'],"");
                
                $Es->Cabeca(2,"Excluir Atividade Individual",0);
                
                ?>
                <p>Deseja excluir a atividade individual "<i><?php echo $individu['descri']; ?></i>"?</p>
                <a href='../Exibir.php?acao=atividades'>Não</a>
                <br><a href='Excluir.Ghost.php?id=<?php echo $individu['id']; ?>&acao=individu&atividade=<?php echo $individu['atividade']; ?>'>Sim</a>
                <?php
                
            } else {
                header("Location: ../index.php");
            }
        ?>
        <br>
    </body>
</html>