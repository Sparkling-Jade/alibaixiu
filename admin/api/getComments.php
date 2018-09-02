<?php
//接收页码
 $pageIndex=$_GET['pageIndex'];

//接收页容量
$pageSize=$_GET['pageSize'];

      /*  推算结果
        假设页容量为10
        第1页：开始索引 0   limit 0,10    (1 - 1) * 10 = 0
        第2页：开始索引 10  limit 10,10   (2 - 1) * 10 = 10
        第3页：开始索引 20  limit 20,10   (3 - 1) * 10 = 20
        第4页：开始索引 30  limit 30,10   (4 - 1) * 10 = 30

        结论： limit右边那个值就是页容量
            左边那个值等于  （页码 - 1） * 页容量
    */

  //根据公式计算出起始索引
   $start=($pageIndex-1)*$pageSize;

   //引入封装数据库
    require_once "sql/sql_tools.php";

  //操作数据库
   $sql="select c.id, c.content, p.title, c.created,c.status
   from comments c
   inner join posts p
    on c.post_id=p.id
   where c.status !='trashed'
  limit $start,$pageSize";

  //得到分页数据
  $data=sql_select($sql);

  //查出总页数
  $sql="select c.id,c.author,c.content,p.title,c.created,c.status 
  from comments  c
  inner join posts  p
  on c.post_id = p.id
  where c.status != 'trashed'";

  //得到总数量
  $totalCount=count(sql_select($sql));
//   echo json_encode($totalCount);
  //计算总页数 
  $totalPage=ceil($totalCount/$pageSize);

  //先把这两个值拼成关联型数组
   $arr=[
       "data"=>$data,
       "totalPage"=>$totalPage
   ];

   //把数据转换成json数据
   echo json_encode($arr);
?>