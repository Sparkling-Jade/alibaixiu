<?php
   
   session_start();
    
 if (isset($_SESSION['userInfo'])) {

     //如果有 就代表刚刚登录过  所以就返回ok
    echo "ok";

 }else{

     echo "fail";
     
 }


?>