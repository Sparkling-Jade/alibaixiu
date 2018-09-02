<?php
   $link=mysqli_connect('127.0.0.1','root','root','baixiu');
  
   //查出所有文章的SQl语句
   $sql="select * from posts where status !='trashed'";
  //对查到的数组直接取长度,就是你查出来的所有文章的总数
  $posts=mysqli_query($link,$sql);
  $postsCount=count(mysqli_fetch_all($posts,1));

 
//   //查出所有草稿文章的数量
  $sql="select * from posts where status='drafted'";
   $drafted=mysqli_query($link,$sql);
   $draftedCount=count(mysqli_fetch_all($drafted,1));

//    //查出所有的分类数量
   $sql="select * from categories";
   $category=mysqli_query($link,$sql);
   $categoryCount=count(mysqli_fetch_all($category,1));

//    //查出所有评论的数量
   $sql="select * from comments where status !='trashsed'";
   $commests=mysqli_query($link,$sql);
   $commestsCount=count(mysqli_fetch_all($commests,1));

//    //查出待审核的数量
   $sql="select * from comments where status='held'";
   $held=mysqli_query($link,$sql);
   $heldCount=count(mysqli_fetch_all($held,1));

   

   $arrs=[
       "postsCount" =>$postsCount,
       "draftedCount"=>$draftedCount,
       "categoryCount"=>$categoryCount,
       "commestsCount"=>$commestsCount,
       "heldCount"=>$heldCount
   ];
   

   
   mysqli_close($link);

 //转成json字符串
  echo json_encode($arrs);
?>