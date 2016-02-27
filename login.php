<?php
	require_once "config.inc.php";
	$user=$_POST['uid'];
	setcookie('user',$user,time()+7200,"/");
?>
<body>
<center>
<?php
	
	$password=$_POST['pwd'];
	$query="select pwd from users where uid='$user'";
	$result=mysql_query($query,$hd);
	$psw=$result==null?null:mysql_fetch_array($result);
	if($password==$psw['pwd'])
	{
		echo 'login sussess';
		echo"<meta http-equiv=\"Refresh\" content=\".1;URL=index.php\">";
		
	}
	else
	{
		echo 'login fails!';
		echo"<meta http-equiv=\"Refresh\" content=\".1;URL=sign-in.html\">";
	}
	mysql_close($hd);
?>
</center>
</body>
