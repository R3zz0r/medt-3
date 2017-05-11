<?php
	$host='localhost';
	$dbname='medt3';
	$user='root';
	$pwd='';
        try{
            $db=new PDO ( "mysql:host=$host;dbname=$dbname", $user, $pwd);
        }catch(PDOException $e){
            exit("<h2 class=\"bg-danger\">System nicht verfügbar!<br><br>$e</h2>");
        }
?>