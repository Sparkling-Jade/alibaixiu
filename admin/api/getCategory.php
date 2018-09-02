<?php
  require_once "sql/sql_tools.php";

  $sql="select * from categories";

  $arr=sql_select($sql);
  //var_dump ($arr);
  
  echo json_encode($arr);



?>