<?php
   //删除session
 

   //先打开session
   session_start();

    //然后在删除session
    unset($_SESSION['userInfo']);

    //删除完跳回登录页
    header('location:../login.html');
?>