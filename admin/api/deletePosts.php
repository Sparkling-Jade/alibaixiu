<?php

   $ids=$_POST['ids'];

   require_once "sql/sql_tools.php";

   $sql="update posts set stauts='trashed' where id in($ids)";

   $res=sql_execute($sql);

   if ($res) {
      echo "ok";
   }else{
       echo "fail";
   }



?>