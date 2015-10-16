<!DOCTYPE html>
<html lang='pt-BR'>
    
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
            
        if ($_GET['acao'] == "atividades") {     
            
            $Es->Cabeca(2,"Editar Atividade",3);
            
            echo "<div id='conteudo'>";
            
            $atividade = $Db->Select(1,$con,"*","atividades","id=".$_GET['id'],"");
            
            $Es->FormOn("Editar.Ghost.php?id=".$_GET['id']."&acao=atividades");			
                $Es->FormIn("Descrição","nome",$atividade['nome']);
                $Es->FormDate("Data","data",$atividade['data']);
                $Es->FormTime("Hora de Início","inicio",$atividade['inicio']);
                $Es->FormTime("Hora de Término","termino",$atividade['termino']);
                $Es->FormIn("Descrição","descri",$atividade['descri']);
            $Es->FormOff("Salvar");
            echo "<a href='../Exibir.php?acao=atividades'>Voltar/Cancelar</a><br>";
            
            echo "</div>";
            
        } else if ($_GET['acao'] == "componentes"){
            
            $Es->Cabeca(2,"Editar Componente",3);
            
            $componentes = $Db->Select(1,$con,"*", "componentes", "id=" . $_GET['id'],"");
            
            $Es->FormOn("Editar.Ghost.php?id=" . $_GET['id']."&acao=componentes");
                $Es->FormIn("Nome", "nome", $componentes['nome']);
            $Es->FormOff("Salvar");
            
        } else if ($_GET['acao'] == "individu"){
            
            $Es->Cabeca(2,"Participação Individual",3);
            
            echo "<div id='conteudo'>";
            
            $individu = $Db->Select(1,$con,"*", "compativ", "id=" . $_GET['id'],"");
            $componente = $Db->Select(1,$con,"nome", "componentes", "id=" . $individu['componente'],"");
            
            echo "<p>Autor da Tarefa, ".$componente['nome']."</p>";
            
            $Es->FormOn("Editar.Ghost.php?id=" . $_GET['id'] . "&acao=individu");
                $Es->FormIn("Descrição","descri",$individu['descri']);
            $Es->FormOff("Salvar");
            
            echo "</div>";
            
        }else {
            
            header("Location: Editar.php");       
            
        }
        ?>
    </body>
</html>
