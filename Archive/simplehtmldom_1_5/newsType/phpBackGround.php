<?php
header('Content-type:text/html;charset=utf-8');
//error_reporting(E_ALL);
include_once('get_tgbusnews.php');


    //执行新闻存储
 	$mytgbusnews = new tgbusnews();

 	$mytgbusnews->starSave();


?>