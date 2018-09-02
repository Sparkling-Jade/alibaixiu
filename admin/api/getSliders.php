<?php
   
   require_once "sql/sql_tools.php";

    $sql="select * from options where id =10";

    $arr=sql_select($sql);
     //var_dump($arr);
    echo $arr[0]['value'];
?>