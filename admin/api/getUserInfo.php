<?php

 session_start();

 $userInfo=$_SESSION['userInfo'];

 //转成json字符输出
 echo json_encode($userInfo);



?>