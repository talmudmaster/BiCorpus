<?php

    session_start();
    if (isset($_SESSION['login_user']) && !empty($_SESSION['login_user'])) {

        include "shared/lock.php";

		include "shared/head.php";

		include "shared/navbar.php";

    }else{

        include "shared/config.php";

		include "shared/head.php";

		include "shared/public_navbar.php";
        
    }

?>

    <div class="container-fluid" >
        <div class="row" >
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-1">
                    </div>

                    <div class="col-md-10">
                        <?php
                            echo '
			
								<form action="usercreate.php" method="post" class="form-horizontal" role="form">

									<div class="form-group">
										<label>
											用户名
										</label>
										<textarea class="form-control" rows="1" name="username" placeholder="请输入您的用户名，用户名不少于6位"></textarea>
									</div>

									<div class="form-group">
										<label>
											姓名
										</label>
										<textarea class="form-control" rows="1" name="fullname" placeholder="请输入您的姓名"></textarea>
									</div>

									<div class="form-group">
										<label>
											单位
										</label>
										<textarea class="form-control" rows="1" name="university" placeholder="请输入您的单位"></textarea>
									</div>

									<div class="form-group">
										<label>
											密码
										</label>
										<textarea class="form-control" rows="1" name="password" placeholder="请输入您的密码，密码不少于6位,必须包含1个数字,1个小写字母,1个大写字母"></textarea>
									</div>

									<div class="form-group" align="center">

										<button type="submit" name="submit" value="Submit" class="btn btn-primary" >创建</button>
									</div>

								</form>

							'
                        ?>
                    </div>

                    <div class="col-md-1">
                    </div>

                </div>

            </div>

            <div class="col-md-3">
            </div>

        </div>

    </div>

<?php
	include "shared/foot.php";
?>