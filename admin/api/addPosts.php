<?php
//拿到提交来的数据
 $title=$_POST['title'];

 $content=$_POST['content'];

 $slug=$_POST['slug'];

 $category=$_POST['category'];

 $created=$_POST['created'];

 $status=$_POST['status'];

//通过$_FILES拿上传的图片
 $feature=$_FILES['feature'];
 //拿到上传的图片文字
  $name=$feature['name'];
 //拿到临时路劲
 $tmp=$feature['tmp_name'];
 //utf-8转GBK
 $gbkName=iconv('utf-8','gbk',$name);
 //准备一个新的路劲,PHP不支持根目录的写法
  $path="../../uploads/$gbkName";
 //把临时路劲移动到准备得新的路劲 
  move_uploaded_file($tmp,$path);

  //打开session
  session_start();
  //为获取到当前登录用户的id
  $userID=$_SESSION['userInfo']['id'];

 //导入SQL文件
 require_once "sql/sql_tools.php";

  //把路径保存到数据库之前，记得先把路径转换为UTF-8的路径，因为数据库用的是UTF-8编码
     $path="../../uploads/$name";
 
 //准备sql语句
  $sql="insert into 
  posts(slug,title,feature,created,content,status,user_id,category_id) 
      values('$slug','$title','$path','$created','$content','$status','$userID','$category');";

    $res=sql_execute($sql);


    if($res){
        echo "ok";
    }else{
        echo "fail";
    }

 


?>