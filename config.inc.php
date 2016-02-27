<?php
 $server="localhost";  
 $user="root";        
 $pass="shengsheng";         
 $db_name="qingyuan";   
 $hd=mysql_connect($server,$user,$pass) or die("mysql connet error !!!");
 $db=mysql_select_db($db_name,$hd);
 mysql_query("SET NAMES 'utf8'");
 // mysql_query("SET CHARACTER SET utf8"); 
?>
