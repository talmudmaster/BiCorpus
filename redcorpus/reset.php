<?php

	session_start();

	include "shared/lock.php";

	if($user_type != 1) {
		header("Location: index.php");
	}

	include "shared/head.php";

	include "shared/navbar.php";

?>

<?php
   
   mysqli_select_db($conn,DB_DATABASE); //连接数据库
   
   mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况
   
   $id=$_GET["id"];

   $sql_reset = "UPDATE `users` SET `password` = '123456Aa' WHERE `users`.`id` = {$id}";
   mysqli_query($conn,$sql_reset);
   
	if(mysqli_query($conn,$sql_reset)) {  
		echo "<script>alert('重置用户密码成功！请提醒用户尽快修改密码');history.go(-1);</script>";
	} else {  
		echo "<script>alert('重置用户密码失败！');history.go(-1);</script>";
	}
	// echo "<script>his</script>";
?>