<?php
  $id=$_POST['id'];

  //导入数据库
  require_once "sql/sql_tools.php";

  //准备SQL数据

  $sql="delete from categories where id in ($id)";

  $res=sql_execute($sql);

  if ($res) {
      echo "ok";
  }else{
      echo "fail";
  }




?>