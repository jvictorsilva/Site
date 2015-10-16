<?php
Class Sql {
    
    function Conectar($bancos){

        $usuario = 'root';
        $banco = $bancos;
        $senha = '';
        $servidor = 'localhost';

        $con = mysql_connect ($servidor,$usuario,$senha) or die('ERRO AO CONECTAR NO BANCO DE DADOS '.mysql_error());
        mysql_select_db($banco) or die ('ERRO AO SELECIONAR O BANCO DE DADOS ' . mysql_error($con));

        return $con;
        
    }
    
    function Select($array,$con,$coluna,$tab,$where,$complemento){
        
        $condicional = "";
        
        if($where != ""){	
            
            $condicional = " WHERE ".$where;
            
        }
        
        if($array == 0){
            
            $sql = "SELECT ". $coluna ." FROM ". $tab . $condicional . " " . $complemento . ";";
            $res = mysql_query($sql, $con) or die(mysql_error($con));
            return $res;
            
        } else {
            
            $sql = "SELECT ". $coluna ." FROM ". $tab . $condicional . " " . $complemento . ";";
            $res = mysql_query($sql, $con) or die(mysql_error($con));
            $dados = mysql_fetch_array($res);
            return $dados;
            
        } 
        
    }
    
    function Insert($tab,$dados,$campos,$con){
        
        $sql = "INSERT INTO ". $tab ."(".$campos.") VALUES (".$dados.");";
        $res = mysql_query($sql, $con) or die(mysql_error($con));
        return $res;
    
    }
    
    function Delete($tab,$where,$con){
        
        $condicional = "";
        
        if($where != ""){
            
            $condicional = " WHERE ".$where;
            
        }
        
        $sql = "DELETE FROM ". $tab . $condicional .";";
        mysql_query($sql, $con) or die("<i style='color:darkred'><b>Erro Enquanto se iria apagar registros.</b></i><br>Mensagem do MySql: ".mysql_error($con));
        
    }
    
    function Update($tab,$alterar,$con,$condi){
        //UPDATE tabela SET <campo>=<valor>,<campo0>=<valor2>,...;
        $sql = "UPDATE " . $tab . " SET " . $alterar . " WHERE ".$condi." ;";
        mysql_query($sql, $con) or die("<i style='color:darkred'><b>Erro Enquanto se iria alterar registros.</b></i><br>Mensagem do MySql: ".mysql_error($con));
    }
    
}