<!DOCTYPE html>
<!--GitHub Host Version-->
<html>
    
    <head>
        <title>JCLi</title>
        <link rel="stylesheet" href="Css/Css.css">
        <link rel="stylesheet" href="Css/Menu.css">
        <link rel="stylesheet" href="Css/Index.css">
        <link rel="stylesheet" href="Css/Fontes.css">
    </head>
    
    <body>
        
        <?php
        
            include ("Classes/Estrutura.Class.php");
            $Es = new Estrutura;
            
        ?>
        
        <div id='conteudo-index'>
            
            <br><h1>O Projeto JCLi</h1><br>
            
            <div class="slide azul">
                
                <img src='Img/Site/slide6.png' >
                <div class='slide-content'>
                    
                    <h2>Objetivo</h2>
                    <p class='descri'>

                        A plataforma de Jornadas de Coleta para Lixo de Informatica propõe organizar o acesso de 
                        instituições de coleta de lixo eletrônico até as pessoas que os possuirem.
                        
                    </p>
                    
                </div>

            </div>
            
            <div class="slide-direita wheat center">
                
                <img src='Img/Site/slide2.png' class='img-direita'>
                <div class='slide-content'>
                    
                    <h2>Solução</h2>
                    <p class='descri'>
                        
                        Assinalar os problemas que o acumulo de lixo eletrônico dá para a sociedade.
                        
                    </p>
                    
                </div>

            </div>
            
            <div class="slide cinza right">
                
                <img src='Img/Site/slide5.png' class='img-direita'>
                <div class='slide-content'>
                    
                    <h2>Ferramentas</h2>
                    <p class='descri'>
                        
                        Descrever os metodos que o site poderá proporcionar aos seu usários fim de que
                        o projeto cumpra seu objetivo.
                        
                    </p>
                    
                </div>

            </div>
            
        </div>
        <?php
        
            $Es->Cabeca(1,"Saudações",1);
        
        ?>
    </body>
    
</html>