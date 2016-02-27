<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title></title>
</head>
<center>
<?php
	require_once "config.inc.php";
	header("Content-Type:text/html;charset=utf-8");
	$id=$_GET['id']; 
	$query = "delete from orders where id = '$id'";
	mysql_query($query,$hd);
	mysql_close($hd);
	echo "delete成功!!!";
	echo"<meta http-equiv=\"Refresh\" content=\".2;URL=orders.php\">";
?>
</center>
</html>