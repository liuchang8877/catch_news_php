catch_news_php
==============
QQ交流群：323783445
//用了PHP simplehtmldom 库
SQL：
//对应数据表1.新闻主表


create table lolnews (
newsID        int(255) auto_increment primary key,
title              varchar(300),

url                varchar(300),

localurl         varchar(30),

pubtime        varchar(30),

detail            varchar(30000),

note              varchar(30),

img                varchar(30),

updateID       varchar(30)

) ;

用于手机端新闻展示
//Archive.zip 直接上传 SAE 新浪的云服务可以使用，有定制执行在config.yaml 对应的名字版本号修改就好

//单个新闻展示
http://1.orange2014.sinaapp.com/simplehtmldom_1_5/newsType/show_news.php?updateID=**

//这个路径是json串 location 是分页查询
http://1.orange2014.sinaapp.com/simplehtmldom_1_5/newsType/ios_getNews.php?location=**

//是定时触发的入口，可以手动
http://1.orange2014.sinaapp.com/simplehtmldom_1_5/newsType/phpBackGround.php

//获得新闻主体
http://1.orange2014.sinaapp.com/simplehtmldom_1_5/newsType/get_tgbusnews.php

//获得新闻
http://1.orange2014.sinaapp.com/simplehtmldom_1_5/newsType/get_lolqqnews_detail.php
