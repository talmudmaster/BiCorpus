<?php
include "shared/resource.php";
include "shared/config.php";

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    if(empty($_POST["username"]) || empty($_POST["password"]))  
    {  
        echo '<script>alert("请完整填写用户名和密码")</script>';  
    } 	
	else
	{
		// username and password sent from form 

		$myusername=mysqli_real_escape_string($conn,$_POST['username']); 
		$mypassword=mysqli_real_escape_string($conn,$_POST['password']);

		$sql="SELECT * FROM users WHERE username='$myusername'";
		$result=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($result);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		$type=$row['type'];
	
		$userid=$row['id'];//获取登录用户的唯一ID
		$hashdecode = $row['password'];
	
		if($count==1)
		{
			if ($mypassword == $hashdecode) 
			{
				
				$_SESSION['login_user']=$myusername;
				$_SESSION['type']=$type;//获取登录用户的身份类型
				$_SESSION['userid']=$userid;//将登录用户的唯一ID至于会话中向后传递				
				
				// if($_SESSION['type']==1)
				// {
				// 	header("location: index.php");
				// }
				// elseif($_SESSION['type']==2)
				// {
				// 	header("location: index.php");
				// }

				header("location: index.php");
				
			}
			else
			{
				$error="用户名或密码不正确，请确认后重试。";
				echo "<div class='alert alert-danger alert-dismissable'>";						
				echo "		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>";
				echo "			× ";
				echo "		</button>";
				echo "		<h4> ";
				echo $error;
				echo "		</h4>";
				echo "	</div>";
			}
		}
		else 
		{
			
				$error="当前用户不存在，请确认后重试。";
				echo "<div class='alert alert-danger alert-dismissable'>";						
				echo "		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>";
				echo "			× ";
				echo "		</button>";
				echo "		<h4> ";
				echo $error;
				echo "		</h4>";
				echo "	</div>";
		
		}
	}
}
?>


<!DOCTYPE html>
<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $strings["title"];?></title>

<!-- 新 Bootstrap 核心 CSS 文件 -->
<link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
 
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
 
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
				<h2>
					<?php echo $strings["title"]; ?>
				</h2>
				<p>
					<?php echo $strings["description"]; ?>
				</p>
				<p>
					<a class="btn btn-primary btn-primary" href="index.php">前往主页</a>
				
					<a class="btn btn-primary btn-success" href="register.php">注册</a>

				</p>				
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
						
			<form action="" role="form" method="post">
				<div class="form-group">
					 
					<label>
						用户名
					</label>
					<input type="text" name="username" class="form-control" >
				</div>
				<div class="form-group">
					 
					<label >
						密码
					</label>
					<input type="password" name="password" class="form-control">
				</div>
				
				<div>
					<button type="submit" class="btn btn-success">
						登录
					</button>

					<!-- Button trigger modal -->
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" style="margin-left:20px">
						忘记密码
					</button>

					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">忘记密码</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p>请联系管理员重置密码</p>
									<p style="color:red" >并及时修改密码(默认密码为123456Aa)</p>
									<p>用户界面姓名前有*号的为管理员</p>
								</div>
								<div class="modal-footer" >
									<button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</form>
		</div>
		<div class="col-md-3">
		</div>
	</div>
</div>
  </body>
</html>