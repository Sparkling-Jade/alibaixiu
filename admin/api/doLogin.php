<?php
   $email=$_POST['email'];
   $password=$_POST['password'];

   //连接数据库
   $link=mysqli_connect('127.0.0.1','root','root','baixiu');
    //查询数据库语法
   $sql="select * from users where email='$email' and password='$password'";

   $res=mysqli_query($link,$sql);

   $arr=mysqli_fetch_all($res,1);

   //关闭数据库

   mysqli_close($link);

   if (count($arr)>0) {
       
       session_start();
       $_SESSION['userInfo']=$arr[0];

       echo "ok";
   }else{
       echo "fail";
   }


?>