<?php

    session_start();
    if (isset($_SESSION['login_user']) && !empty($_SESSION['login_user'])) {
        include "shared/lock.php";
    }else{
        include "shared/config.php";
    }

    include "shared/head.php";

    if (isset($_SESSION['login_user']) && !empty($_SESSION['login_user'])) {
        include "shared/navbar.php";
    }
    else{
        include "shared/public_navbar.php";
    }

//    include ("notes/index.html");
    include ("about.html");
?>
