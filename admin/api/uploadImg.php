<?php
   //拿到上传的图片信息
   $img=$_FILES['img'];

   //取出图片名
   $name=$img['name'];
   $tmp=$img['tmp_name'];

   //转成gbk
   $gbkName=iconv('utf-8','gbk',$name);

   //新的路劲
   $path="../../uploads/$gbkName";

   //移动到新路径
   move_uploaded_file($tmp,$path);

   //返回服务器上的永久路径
   echo "../../uploads/$name";

?>