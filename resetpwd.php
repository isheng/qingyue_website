<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title></title>
</head>
<center>
<?php
	if (isset($_COOKIE["user"]))
	{
	    $user=$_COOKIE["user"];
	    echo $user;
	}
	else
	    echo"<meta http-equiv=\"Refresh\" content=\".1;URL=sign-in.html\">";

	require_once "config.inc.php";
	header("Content-Type:text/html;charset=utf-8");
	$pwd = $_POST["news"];
	$query = "update users set pwd='$pwd' where uid = '$user'";
	echo $query;
	mysql_query($query,$hd);
	mysql_close($hd);
	echo "update成功!!!";
	echo"<meta http-equiv=\"Refresh\" content=\"20;URL=index.php\">";
?>
</center>
</html>