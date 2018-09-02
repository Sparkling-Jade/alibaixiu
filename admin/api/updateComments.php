<?php

 //接收id

  $id=$_POST['id'];

  $status=$_POST['status'];

  //导入数据库
   require_once "sql/sql_tools.php";

  $sql="update comments set status='$status' where id in($id)";

  $res=sql_execute($sql);

  if ($res) {
      echo "ok";
  }else{
    echo "fail";
  }



?>