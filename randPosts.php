<?php
   require_once "admin/api/sql/sql_tools.php";

   //查出随机五篇文章
    $sql="select * from posts 
     order by rand()
     limit 5";

   $randPosts=sql_select($sql);

   foreach ($randPosts as  $value) :?>
    <li>
    <a href="detail.php?id=<?php echo $value['id'];?>">
      <p class="title"><?php echo $value['title'];?></p>
      <p class="reading">阅读(<?php echo $value['views'];?>)</p>
      <div class="pic">
        <img src="<?php echo $value['featture']?>" alt="">
      </div>
    </a>
  </li>
  <?php endforeach; 

?>