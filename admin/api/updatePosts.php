 <?php

//拿到提交来的数据
$title=$_POST['title'];

$content=$_POST['content'];

$slug=$_POST['slug'];

$category=$_POST['category'];

$created=$_POST['created'];

$status=$_POST['status'];

$id=$_POST['id'];

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

  //引入数据库文件
  require_once "sql/sql_tools.php";

   $path="../../uploads/$name";

  //准备SQL语句
  if($name !=""){
       $sql="update posts set slug='$slug',title='$title',feature='$path',created='$created',content='$content',status='$status',category_id='$category' where id=$id";
    }else{
        $sql="update posts set slug='$slug',title='$title',created='$created',content='$content',status='$status',category_id='$category' where id=$id";
    }
 
 $rows=sql_execute($sql);
//  var_dump($rows);

 //echo "$rows";
   
  if($rows){
      echo "ok";
  }else{
      echo "fail";
  }
?> 

