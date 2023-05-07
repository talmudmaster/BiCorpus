<?php

	session_start();

	include "shared/lock.php";

	include "shared/head.php";

	include "shared/navbar.php";

?>

<?php

    $password = $_POST["password"];
   
    mysqli_select_db($conn,DB_DATABASE); //连接数据库

    mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况

    $sql = "SELECT * FROM users WHERE id = '{$user_id}'";
				
	$result = mysqli_query($conn,$sql);

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if($password==""){
        echo "<script>alert('请输入要修改的信息！');history.go(-1);</script>";
    }else{
        if(!preg_match(" /^.*(?=.{6,})(?=.*\d)(?=.*[A-Z])(?=.*[a-z]).*$/",$password)){
            echo "<script>alert('密码最短6位,必须包含1个数字,1个小写字母,1个大写字母');history.go(-1);</script>";
        }else{
            $sql_updateuserinfo = "UPDATE `users` SET `password` = '{$password}' WHERE `users`.`id` = {$row["id"]}";
            mysqli_query($conn,$sql_updateuserinfo);
            if(mysqli_query($conn,$sql_updateuserinfo)) {  
                echo "<script>alert('修改密码成功！');parent.location.href='updateuser.php' </script>";
            } else {  
                echo "<script>alert('修改密码失败！');history.go(-1);</script>";
            }
        }
        
    }

?>