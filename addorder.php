
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
	$name=$_POST['name']; 
	$type=$_POST['type'];
	$phone=$_POST['phone'];
	$price=$_POST['price'];
	$address=$_POST['address'];
	$day = $_POST['day'];
    $riqi = date("Y-m-d H:i:s");
    $region = $_POST['region'];
    echo $region;
    if(is_array($_GET)&&count($_GET)>0)  //url have id, must update the mysql
    {
    	$id=$_GET['id'];
    	$query="update orders set client_names='$name',address='$address',warranty_time='$day',prices='$price',phone='$phone',machine_type='$type' where id='$id'";
    	$message ="更新";
    }
    else{
    	$query="insert into `orders`(`date`,`client_names`,`address`,`phone`,`warranty_time`,`prices`,`machine_type`) values ('$riqi','$name','$address','$phone','$day',$price,'$type')";
    	$message="添加";
    }
	mysql_query($query,$hd);
	mysql_close($hd);
	echo "订单".$message."成功!!!";
	echo"<meta http-equiv=\"Refresh\" content=\"20;URL=orders.php\">";
?>
</center>
</html>