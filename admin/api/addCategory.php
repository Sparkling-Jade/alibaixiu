<?php

 // 接收数据
  $slug=$_POST['slug'];
  $name=$_POST['name'];

   //导入数据库
   require_once "sql/sql_tools.php";

   //准备sql语句

   $sql="insert into categories(slug,name) values('$slug','$name')";

   $res=sql_execute($sql);

   if($res){
       echo "ok";
   }else{
       echo "fail";
   }

 


?>