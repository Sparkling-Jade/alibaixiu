<?php
  //接收数据
  $id=$_POST['id'];
  $slug=$_POST['slug'];
  $name=$_POST['name'];

  //修改数据库
   require_once "sql/sql_tools.php";

   //准备SQL数据
   $sql="update categories set name='$name',slug='$slug' where id='$id'";

   $res=sql_execute($sql);

   if($res){
       echo "ok";
   }else{
       echo "fail";
   }


?>