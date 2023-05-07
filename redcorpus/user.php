<?php

	session_start();

	include "shared/lock.php";

	include "shared/head.php";

	include "shared/navbar.php";

?>

<?php

	$sql = "
	SELECT * FROM users WHERE id = '{$user_id}'
	";

	mysqli_select_db($conn,DB_DATABASE); 
	mysqli_query($conn,"set names utf8"); 
				
	$result = mysqli_query($conn,$sql);

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>


<div class="container">
   <div class="row">
   	  <h2 style="text-align:center">个人信息</h2>
      <div class="col-md-12">
		<div class="col-md-2">
		</div>

		<div class="col-md-8">
			
		<table class='table table-bordered table-striped'>
			<thead>
				<td width='30%'>用户名</td>
				<td width='70%'><?php echo $row["username"];?></td>
			</thead>
			<tr>
				<td width='30%'>成果主页</td>
				<td width='70%'>
					<?php 
						echo "
						<!--<a href='contribution.php?id=".$row["id"]."' target='_blank'>查看</a> -->
						<a class='btn btn-success' href='contribution.php?id=".$row["id"]."' target='_blank'>你的成果主页</a>
						";
					?>
				</td>
			</tr>
			<tr>
				<td width='30%'>姓名</td>
				<td width='70%'>
					<div width='100%' style="display:flex;justify-content: space-between;">
						<div><?php echo $row["fullname"];?></div>
						<!-- <div><button type="submit" class='btn btn-Info' >修改姓名</button></div> -->
					</div>
				</td>
			</tr>
			<tr>
				<td width='30%'>单位</td>
				<td width='70%'>
					<div width='100%' style="display:flex;justify-content: space-between;">
						<div><?php echo $row["university"];?></div>
						<!-- <div><button type="submit" class='btn btn-Info' >修改单位</button></div> -->
						
					</div>
				</td>
			</tr>
			<tr>
				<td width='30%'>密码</td>
				<!-- <td width='70%'>******</td> -->
				<td width='70%'>
					<!-- <div width='100%' style="display:flex;justify-content: space-between;"> -->
						<!-- <div><?php echo $row["password"];?></div> -->
						<!-- <div><button type="submit" class='btn btn-Info' >修改密码</button></div> -->
						<!-- Button trigger modal -->
					<!-- </div> -->
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
						查看密码
					</button>

					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">你的密码</h5>
									
								</div>
								<div class="modal-body">
									<p><?php echo $row["password"];?></p>
								</div>
								<div class="modal-footer" >
									<button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
								</div>
							</div>
						</div>
					</div>
					
				</td>
			</tr>
			<tr>
				<td width='30%'>操作</td>
				<!-- <td width='70%'>******</td> -->
				<td width='70%'>
					<div width='100%' style="display:flex;justify-content: space-between;">
						<a class='btn btn-success' href='updateuser.php'>修改信息</a>

						<!-- <td width='20%'  style='vertical-align: middle;text-align: center;'>操作</td> -->
					</div>
				</td>
			</tr>
		</table>
			
		</div>

		<div class="col-md-2">
		</div>		
	  </div>
   </div>
</div>