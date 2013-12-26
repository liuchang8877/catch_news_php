<?php
header('Content-type:text/html;charset=utf-8');
//数据库操作
include_once('../dbDao/dbconnect.php');


	$updateID = $_GET['updateID'];
	
//echo $updateID."</br>";

/*  //数据库操作初始化
    $myDB = new mysqlTool();
	
	$myNewsArr = $myDB->getNewsList();
	
	$myNews = $myNewsArr[0];

	echo base64_decode($myNews->detail); 
	//echo json_encode($myNewsArr,true);
*/		

	//数据库操作初始化
    $myDB = new mysqlTool();
	//根据updateID获得news
	$myNewsArrByID = $myDB->getTheNewsByupdateID($updateID);
	
	$myNews = $myNewsArrByID[0];
	
	if (count($myNewsArrByID) > 0) {
		echo base64_decode($myNews->detail);
    } else {
        //无数据
        echo 'updateID'.$updateID.'</br>';
    }

	
?>