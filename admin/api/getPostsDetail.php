<?php
 //获取传递过来的id
 $id=$_GET['id'];

//导入数据库文件
 require_once "sql/sql_tools.php";
//准备SQL语句
  $sql="select * from posts where id='$id'";

  $arr=sql_select($sql);
 
 // var_dump ($arr);
  
 // 因为是个多维数组,取出来的数据是全部 修改的文章把id带过去要相对应,所以要转成$arr[0]格式
    
   echo json_encode($arr[0]);


?>