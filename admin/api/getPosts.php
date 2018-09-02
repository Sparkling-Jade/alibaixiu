<?php
   //导入SQL语句函数
    require_once "sql/sql_tools.php";

    //接收页码
    $pageIndex=$_GET['pageIndex'];
    //接收页容量
    $pageSize=$_GET['pageSize'];
    //接收筛选的分类id
    $category_id=$_GET['category_id'];
    //接收筛选的状态
    $status=$_GET['status'];
    //根据公式计算起始索引  公式:(页码减1)*页容量
   $start=($pageIndex-1)*$pageSize;
    //SQL语句查询页容量.起始索引
 $sql="select p.id,p.title,u.nickname,c.name,p.created,p.status
 from posts p
inner join users u
  on p.user_id =u.id
inner join categories c
  on p.category_id=c.id
where p.status !='trashed'";
 
 //在接口里判断category_id是否为空，如果不为空，就多加一个条件 and category_id=$category_id
  if ($category_id != "") {
     $sql.= " and category_id=$category_id";
  }
 // 在接口里判断status是否为空，如果不为空，就多加一个条件 and status='$stutus'
   if($status !=""){
    $sql.=" and p.status='$status'";
   }

  $sql.= " limit $start, $pageSize";  //limit限制取值的范围
  

    //得到查出数据
    $data=sql_select($sql);

    //SQL语句查询总数据
    $sql="select p.id,p.title,u.nickname,c.name,p.created,p.status 
    from posts p
 inner join users u
    on p.user_id = u.id
 inner join categories c
    on p.category_id = c.id
 where p.status != 'trashed'";
 
 //在接口里判断category_id是否为空，如果不为空，就多加一个条件 and category_id=$category_id
 if ($category_id != "") {
    $sql.= " and category_id=$category_id";
 }
// 在接口里判断status是否为空，如果不为空，就多加一个条件 and status='$stutus'
  if($status !=""){
       $sql.=" and p.status='$status'";
  }
    
  //得到总数量
   $totalCount=count(sql_select($sql));
    //根据得出的数据计算总页数  公式:总数量除以页容量,向下取整
   $totalPage=ceil($totalCount/$pageSize);
    //接收数据
  $arr=[
      "data"=>$data,
      "totalPage"=>$totalPage
  ];
    //把数据转成json格式输出
  echo json_encode($arr);

?>