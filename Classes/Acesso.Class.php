<?php

Class Acesso{

    function EntradaDados(){

        ?>
        
        <div id='acesso'>

            <form action='Verificar.php' method='post'>

                <table>
                
                    <tr><td>Login</td>
                    <tr><td><input class='input-text' type='text' size='30' name='login'/></td></tr>

                    <tr><td style='height:20px;'></td></tr>

                    <tr><td>Senha</td></tr>
                    <tr><td><input class='input-text' type='password' size='30' name='senha'/></td></tr>
                
                </table>

                <br />

                <table>
            
                    <tr>
                        <td>
                            <input class='link' type='submit' value='Entrar'>
                            <a style='margin-left:10px;' href='Entrar.php?erro=null&acao=1'>Cadastrar-se</a>
                        </td>
                    </tr>

                </table>

            </form>
            
        </div>

        <?php
        
    }
    
    function FormCadastro(){
        
        ?>
        
        <div id='acesso'>

            <form action='Acesso.php?erro=null&acao=2' method='post'>

                <table>
        
                    <tr>
                        <td>Nome</td>
                        <td><input type='text' size='32' value='' name='nome'/></td>
                    </tr>

                    <tr>
                        <td>Login</td>
                        <td><input type='text' size='32' value='' name='login'/></td>
                    </tr>

                    <tr>
                        <td>Senha</td>
                        <td>Confirmar senha</td>
                    </tr>
                    
                    <tr><td><input type='password' size='32' id='entrada' class='input-text load' name='senha'/></td><td><input type='password' size='32' id='entrada' class='input-text load' style='margin-left:100px' name='senhaConf'/></td></tr>
                    
                </table>

                <br />

                <table id='bots'>
                    
                    <tr>
                        <td><input type='submit' value='Entrar' class='buttom load' style='margin-left:50px'></td>
                        <td><a href='Entrar.php?erro=null&acao=0' class='buttom-ancor input-gray'>Cancelar</a></td>
                    </tr>

                </table>

            </form>
            
        </div>

        <?php
        
    }
    
    function Erro($erro){
        
        if($erro == 1){
        
            ?>

            <div class='erro'>
                
                <div class='tarja'></div>
                <p>O senha e/ou login errados. ERRO[1]</p>
                
            </div>

            <?php
            
        } else {
            if($erro == 2){

                ?>
                
                <div class='erro'>
                    <p>Voce precisa digitar todos os seus dados. ERRO[2]</p>
                    <div class='tarja'></div>
                </div>

                <?php
                
            } else {
                
                if($erro == 3){
                
                    ?>

                    <div class='erro'>
                        <p>Este já é um login no Student Web. Tente um login diferente. ERRO[2]</p>
                        <div class='tarja'></div>
                    </div>

                    <?php
                    
                }
                
            }
            
        }
        
    }
    
}