<?php
   $data=$_POST['data'];

   require_once "sql/sql_tools.php";

   $sql="update options set value='$data' where id=10";

   $res=sql_execute($sql);

   if($res){
       echo "ok";
   }else{
        echo "fail";
   }




?>