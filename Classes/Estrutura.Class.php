<?php

class Estrutura {
    
    function Head(){
        
        
        
    }
    
    function Cabeca($nivel,$subtitu,$expansion){
        
        $complemento = "";
        $set = "";
        
        if($nivel == 2){
            
            $complemento = "../";
            
        }
        
        if($expansion == 1){
            
            $set = "
                <a class='bot' href='".$complemento."Exibir.php?acao=atividades'>Atividades</a>
                <a class='bot' href='".$complemento."Exibir.php?acao=componentes'>Componentes</a>
                <a class='bot' href='".$complemento."Cadastrar/Cadastrar.php'>Cadastrar</a>
                <a class='bot' href='".$complemento."Editar/Editar.php'>Editar</a>
            "; 
            
        } else if ($expansion == 2){
            
            $set = "
                <a class='bot' href='Form.php?acao=atividade'>Cadastrar Atividade</a>
                <a class='bot' href='Form.php?acao=componente'>Cadastrar Componente</a>
                <a class='bot' href='".$complemento."Editar/Editar.php'>Editar</a>
            ";
            
        } else if ($expansion == 3){
            
            $set = "
                <a class='bot' href='Editar.php?acao=atividade'>Editar Atividade</a>
                <a class='bot' href='Editar.php?acao=componente'>Editar Componente</a>
                <a class='bot' href='".$complemento."Cadastrar/Cadastrar.php'>Cadastrar</a>
            ";
            
        }
        
        ?>
            
        <div id="cabeca">
            <a href='<?php echo $complemento; ?>index.php'><img class='img-indice primeiro-bot' src='<?php echo $complemento; ?>Img/Site/logo.png'/></a>
            <span id='bots'>
                <?php echo $set; ?>
                <a class='bot' href='<?php echo $complemento; ?>Editar/Editar.php'>Sair</a>
            </span>
            
        </div><br>
        
        <?php
        
    }
    
    function FormOn($link){
        ?>

        <form action='<?php echo $link; ?>' method='post'>
            <table>
                
        <?php
            
    }
    
    function FormIn($titu,$name,$dado){
        
        ?>
                
        <tr><td><?php echo $titu; ?></td>
        <tr><td><input type='text' size='32' name='<?php echo $name; ?>' value='<?php echo $dado; ?>'/></td></tr>

        <tr><td><br /></td></tr>
        
        <?php
        
    }

    function FormDate($titu,$name,$dado){
        
        ?>
                
        <tr><td><?php echo $titu; ?></td>
        <tr><td><input type="date" name='<?php echo $name; ?>' value='<?php echo $dado; ?>' step="1"></td></tr>

        <tr><td><br /></td></tr>
        
        <?php
        
    }
    
    function FormTime($titu,$name,$dado){
        
        ?>
                
        <tr><td><?php echo $titu; ?></td>
        <tr><td><input type="time" name='<?php echo $name; ?>' value='<?php echo $dado; ?>' step="1"></td></tr>

        <tr><td><br /></td></tr>
        
        <?php
        
    }
    
    function FormText($titu,$name,$dado){
        
        ?>
                
        <tr><td><?php echo $titu; ?></td>
        <tr><td><textarea type="text" rows="8.5" cols="40" name='<?php echo $name; ?>' value='<?php echo $dado; ?>' step="1"></textarea></td></tr>

        <tr><td><br /></td></tr>
        
        <?php
        
    }
    
    function FormSelOn($titu,$name){

            ?>

            <tr>
                <td>
                    <select name="<?php echo $name; ?>">
                        <option><?php echo $titu; ?></option>


            <?php

    }
   
    function FormSelOff(){

            ?>

                            </select>
                    </td>
            </tr>

    <tr><td><br /></td></tr>

            <?php

    }

    function FormOff($value){
        ?>

        </table>

            <table>

                <tr>
                    <td><input type='submit' value='<?php echo $value; ?>'></td>
                </tr>

            </table>

                </form>

        <?php

    }
     
    function Falha($sql,$mysql_error,$warning){

        if($warning == 1){
            
            $alert = "Ao tentar acessar informações";
            
        } else if($warning == 2){
            
            $alert = "Quanto em se inserir dados";
            
        } else if($warning == 3){
            
            $alert = "Em alterar registros do banco de dados";
            
        } else {
            
            $alert = $warning;
            
        }
		
        ?>
			
            <div style="border:2px solid darkred;width:440px;padding-left:10px;padding-right:10px;margin-bottom:15px">
            <h3 style='color:darkred'><b>Erro do Banco de Dados</b></h3>
            <p style='color:darkred'><u><b><?php echo " ".$alert; ?></b></u></p>
            <p style='color:darkred'><u>Query utilizada</u>:<i> <?php echo $sql; ?></i></p>
            <p style='color:darkred'><u>Mensagem do Banco de Dados</u>:<i> <?php echo $mysql_error ; ?></i></p>

        <?php
        
    }
    
    function Rodape(){
        
        ?>
        
        <div id="rodape">
            <span style="margin-left:60px;">
                <span style="margin-left:15px;">© 2015 Rodrigo Ferreira</span>
                <span style="margin-left:15px;">ETEC Ubatuba</span>
                <span style="margin-left:15px;">TCC Informática</span>
                <span style="margin-left:15px;">Diario de Bordo de TCC</span>
            </span>
        </div>
        
        <?php
        
    }

}