<?php
header('Content-type:text/html;charset=utf-8');
//数据库操作
include_once('../dbDao/dbconnect.php');

	//数据库操作初始化
    $myDB = new mysqlTool();

	$result = $myDB->getNewsList();

	$myArr = array('article'=> $result);

	echo json_encode($myArr,true);
?>