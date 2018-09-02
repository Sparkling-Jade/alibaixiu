## 登录的接口

       url:api/doLogin.php
       type:post
       data: email: 登录的email
       possword: 登录的密码
    
       success: string

        返回值ok 就是fail


## 判断是否登录的接口
       url:api/checkLogin.php
       type:get
       data:不需要参数
       success: string

        返回值ok 就是fail


## 获得用户信息的接口
        url:api/getUserInfo.php
        type:get
        data:不需要
        success:  json
          {name:jack,
          password:123456}


##  获取网站信息的接口

        url:api/getWebInfo.php
       type:get
       data:不需要
       success:  json
        { postsCount:10,
        draftedCount:2 
        categoryCount:12 
        commentsCount:3,
        heldCount:4}



##  获取所有评论数据的接口
         url:api/getComments.php
       type:get
       data: pageIndex 页码,查第几页
        pageSize   页容量.一页显示多少条
       success:   json
        { 
          data:[
            {"id":1,"author":"小周","content":"评论内容","title":"文章标题","created":"时间","status":"状态"}  
            {}  
            {} 
         ]
          totalPage:53;
      }
      
 ## 修改评论状态的接口

       url:api/updateComments.php    
       type:post
       data:
         id:  根据id来修改
               可以传一个也可以传多个id,用,号隔开 例如 3,4,5,
         status: 要修改成什么转态

       uccess:
        接收普通字符串就可以
        ok fail


## 获取文章的接口文档
        url:"api/getPosts.php"
        type:get
        data:
            pageIndex: 代表查第几页
            pageSize:页容量
            category_id: 根据分类来筛选,如果是空字符串代表所有分类
            status: 根据转态来筛选,如果是空字符串代表所有状态
       success:{
        data:[]
        totalPage:64

  }

  ## 获取所有分类的接口
       url:api/getCategory.php;
       type:get
       diata:无
       success:
       json[

             {"id":3 "slug":"live","name":"会生活"},
       ]

  ## 新增文章的接口
        url:api/addPosts.php
        type:post
        data: 
            title
             content
             slug
             feature
             category
             created
             status
       success:
        string
       ok   fail

## 获得某篇文章详情的接口
 
        url: api/getPostsDetail.php
        type:get
        data:id
        success 
       json
       {"id":1, "slug":xx,"title"....}

## 修改文章的接口
        url:api/updatePosts.php
        type:post
        data:
       id:文章的id
        title
         content
         slug
          feature
          category
          created
          status
       success:
       string
       ok or fail

##  修改用户的接口  
        url:api/updateUser.php
        type:post
        data:
            avatar:头像的数据
            slug
            nickname
            bio
        success:
            string
            ok or fail    
   
## 修改密码的接口
        url:api/updatepassword.php
       type:post
       data:
         oldpassword
         newpassword
         id
       success:
          返回状态码
          {code:0  msg:修改成功 
           code:1  msg:旧密码输入错误
           code:2  msg:修改失败
          }

## 增加分类接口
       url:api/addCategory.php
       type:post
       data:
           slug  别名
           name  分类名
       success:
            string
            ok  fail

## 修改分类的接口
        url:api/updateCategory.php
        type:post
        data:
       id
       name
       slug
       success:
      of  fail
   
## 删除分类的接口
       url:  api/deletecategory.php
       type:post
       data:
             id
       success:
             ok  fail

## 获取轮播图的接口
       url:api/getSliders.php
       type:get
       data:无
       success:
          json
          [
                 {"image":"/uploads/slide_1.jpg","text":"轮播项一","link":"https://zce.me"},{"image":"/uploads/slide_2.jpg","text":"轮播项二","link":"https://zce.me"}
          ]

##  上传图片并返回服务器上的路径接口
       url:api/uploadImg.php
       type:post
       data:
          img:上传的图片
       success:
            string
            图片的路径

##  添加轮播图的接口
       url:api/updateSlider.php
       type:post
       data:
            newdata:轮播图json字符串   这个字符串本质上就是一个字符串
       success:
           ok  fail

