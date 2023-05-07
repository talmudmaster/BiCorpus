<?php

	session_start();

	include "shared/lock.php";

	include "shared/head.php";

	include "shared/navbar.php";

?>

<?php

	$sql = "SELECT * FROM users WHERE id = '{$user_id}'";

	mysqli_select_db($conn,DB_DATABASE); 
	mysqli_query($conn,"set names utf8"); 
				
	$result = mysqli_query($conn,$sql);

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>


<div class="container">
   <div class="row">
	   <h2 style="text-align:center">修改个人信息</h2>
      <div class="col-md-12">
		<div class="col-md-2">
		</div>

		<div class="col-md-8">
			
		<table class='table table-bordered table-striped'>
			<tr>
				<td width='30%' style="color:red">注意事项</td>
				<td width='70%'>
                    <div width='100%' style="display:flex;justify-content: space-between;">
                        <div style="color:red">每次点击按钮只能修改对应的个人信息</div>
                    </div>
                </td>
			</tr>

			<tr>
				<td width='30%'>用户名</td>
				<td width='70%'>
                    <div width='100%' style="display:flex;">
                        <div><?php echo $row["username"];?></div>
                        <!-- <div><button type="submit" class='btn btn-Info' >修改用户名</button></div> -->
                    </div>
                </td>   
			</tr>

			<?php
                echo '
					<form action="updatefullname.php" method="post" class="form-horizontal" role="form">
						<tr>
							<td width="30%">姓名</td>
							<td width="70%">
								<div width="100%" style="display:flex;">
									<div>
										<textarea class="form-control" rows="1" name="fullname" placeholder="请输入修改后的姓名"></textarea>
									</div>
									<div style="margin-left:20px">
										<button type="submit" name="submit" value="Submit" class="btn btn-success" >修改姓名</button>     
									</div>
								</div>
							</td>
						</tr>
					</form>

					<form action="updateuniversity.php" method="post" class="form-horizontal" role="form">
						<tr>
							<td width="30%">单位</td>
							<td width="70%">
								<div width="100%" style="display:flex;">
									<div>
										<textarea class="form-control" rows="1" name="university" placeholder="请输入修改后的单位"></textarea>
									</div>
									<div style="margin-left:20px">
										<button type="submit" name="submit" value="Submit" class="btn btn-success" >修改单位</button> 
									</div>    
								</div>
							</td>
						</tr>
					</form>

					<form action="updatepassword.php" method="post" class="form-horizontal" role="form">
						<tr>
							<td width="30%">密码</td>
							<td width="70%">
								<div width="100%" style="display:flex;">
									<div>
										<textarea class="form-control" rows="1" name="password" placeholder="请输入修改后的密码"></textarea>
									</div>
									<div style="margin-left:20px">
										<button type="submit" name="submit" value="Submit" class="btn btn-success" >修改密码</button>     
									</div>
								</div>
							</td>
						</tr>
					</form>
				'
            ?>

			<td width='30%'>返回</td>
			<td width='70%'>
				<div width='100%' style="display:flex;justify-content: space-between;">
					<a class='btn btn-info' href='user.php'>返回个人信息页面</a>
				</div>
			</td>

		</table>
			
		</div>

		<div class="col-md-2">
		</div>		
	  </div>
   </div>
</div>