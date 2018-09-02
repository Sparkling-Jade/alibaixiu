<?php
    function sql_execute($sql){
        //连接数据库
        $link=mysqli_connect('127.0.0.1','root','root','baixiu');

        $rows=mysqli_query($link,$sql);//操作增删改数据库方法
       
        mysqli_close($link);//关闭数据库

        return $rows;//返回受影响的函数

        //返回值是true或者false
    }

    function sql_select($sql){
      //  连接数据库
      $link=mysqli_connect('127.0.0.1','root','root','baixiu');

      $res=mysqli_query($link,$sql);//操作查数据库方法

      $arr=mysqli_fetch_all($res,1);//处理结果

      mysqli_close($link);//关闭数据库

      return $arr;//返回处理之后的数据
    }
?>