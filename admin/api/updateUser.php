<?php
  //接收数据
   $slug=$_POST['slug'];
   $nickname=$_POST['nickname'];
   $bio=$_POST['bio'];
    
   //打开session
    session_start();
    //获取id
    $userID=$_SESSION['userInfo']['id'];

   //拿到文件信息
   $avatar=$_FILES['avatar'];
   //拿到文件名 
  $name=$avatar['name'];
  //拿到临时目录
  $tmp=$avatar['tmp_name'];
  // 把utf-8转成gbk
  $gbkName=iconv('utf-8','gbk',$name);
  //创建新路径
  $path="../../uploads/$gbkName";
  //把临时目录移到新路径
  move_uploaded_file($tmp,$path);

  //导入数据库
   require_once "sql/sql_tools.php";
   //准备SQL前先把gbk格式改成utf-8
   $path="../../uploads/$name";

   //准备SQL语句
   if($name !=""){
   $sql="update users set slug='$slug',nickname='$nickname',bio='$bio',avatar='$path' where id='$userID'";

  }else{
     
    $sql="update users set slug='$slug',nickname='$nickname',bio='$bio' where id='$userID'";
  }

  $res=sql_execute($sql);

  if($res){
      echo "ok";
      $_SESSION['userInfo']['bio']=$bio;
      $_SESSION['userInfo']['nickname']=$nickname;
      $_SESSION['userInfo']['slug']=$slug;
     if($name !=""){
       $_SESSION['userInfo']['avatar']=$path;
     }
  }else{
      echo "fail";
  }



?>  