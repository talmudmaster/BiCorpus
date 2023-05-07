<?php

    session_start();

    include "shared/lock.php";

    include "shared/head.php";

    include "shared/navbar.php";

?>

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">
            </div>

            <div class="col-md-6">
                <?php

                    function text_filter($content)
                    {
                        // 将特殊字符转换为 HTML 实体
                        $content = htmlspecialchars($content);
                        // 转义元字符集
                        $content = quotemeta($content);

                        // 自定义过滤字符串,可以根据业务需求进行扩展
                        $content = preg_replace('/\'/', "\'", $content);

                        $content = preg_replace('/\n/', "<br />", $content);

                        $content = preg_replace('/^\s+/', "", $content);

                        // . 不进行转换
                        //$content = preg_replace('/\\\./', ".", $content);

                        return $content;
                    }

                    $username = text_filter($_POST["username"]);
                    $fullname = text_filter($_POST["fullname"]);
                    $university = text_filter($_POST["university"]);
                    $password = text_filter($_POST["password"]);
                    $type = text_filter($_POST["type"]);

                    if($type==""||$type=="user"){
                        $type=2;
                    }elseif($type=="root"){
                        $type=1;
                    }

                    if( $username=="" || $fullname=="" || $university=="" || $password=="" ){
                        // echo '
                        //     <div class="alert alert-warning" role="alert">
                        //         请将注册信息全部填写完整
                        //     </div>
                        // ';
                        
                        echo "<script>alert('请将注册信息全部填写完整');history.go(-1);</script>";
                    }else{
                        if(!preg_match(" /^.*(?=.{6,}).*$/",$username)){
                            // echo '<script>alert("用户名最短6位")</script>';
                            // echo "<meta http-equiv=\"Refresh\" content=\"0.1;url=register.php\"/>";
                            echo "<script>alert('用户名最短6位');history.go(-1);</script>";
                        }else{
                            //密码最短6位,必须包含1个数字,1个小写字母,1个大写字母
                            if(!preg_match(" /^.*(?=.{6,})(?=.*\d)(?=.*[A-Z])(?=.*[a-z]).*$/",$password)){
                                // echo '<script>alert("密码最短6位,必须包含1个数字,1个小写字母,1个大写字母")</script>';
                                // echo "<meta http-equiv=\"Refresh\" content=\"0.1;url=register.php\"/>";
                                echo "<script>alert('密码最短6位,必须包含1个数字,1个小写字母,1个大写字母');history.go(-1);</script>";
                            }else{
                                
                                mysqli_select_db($conn,DB_DATABASE); //连接数据库

                                $sql = "SELECT username FROM users WHERE username = '$username' ";
                               
                                $result = $conn->query($sql);

                                if($result->num_rows > 0){

                                    echo "<script>alert('该用户名已被注册');history.go(-1);</script>";

                                }else{

                                    $insert = "INSERT INTO users (username, fullname, university, password, type) VALUES ('{$username}', '{$fullname}', '{$university}','{$password}','{$type}')";

                                    $result = mysqli_query($conn,$insert);

                                    if($result){

                                        echo '
                                            <div class="alert alert-success alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                已成功添加新用户。
                                            </div>
                                        ';

                                        if($user_type ==1 ){
                                            echo "<meta http-equiv=\"Refresh\" content=\"1.5;url=team.php\"/>";
                                        }else{
                                            echo "<meta http-equiv=\"Refresh\" content=\"1.5;url=login.php\"/>";
                                        }

                                    }else{
                                        echo '
                                            <div class="alert alert-success alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                新用户添加失败，请返回重试。
                                            </div>
                                        ';

                                        echo "<meta http-equiv=\"Refresh\" content=\"1.5;url=register.php\"/>";
                                    }
                                }  
                            }
                        }
                    }
                    

                ?>

            </div>

            <div class="col-md-3">
            </div>
        </div>
    </div>

</div>

