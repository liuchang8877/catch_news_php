<?php
header('Content-type:text/html;charset=utf-8');
//error_reporting(E_ALL);
include_once('../simple_html_dom.php');
//新闻类
include_once('../class/newsClass.php');
//新闻详情
include_once('get_lolqqnews_detail.php');
//数据库操作
include_once('../dbDao/dbconnect.php');

class tgbusnews{
    
	/**
	 * 折构方法
	 */
	public function __construct(){
		
	}
    
    public function starSave() {

$mynews = new news();

// Create DOM from URL or file   
$html  = file_get_html( 'http://lol.tgbus.com/news/' );  
      

foreach($html->find('div[class=ctt] div[id=tbc_01] div[class=huadong pa10] div[class=list1 fz14] ul') as $div) 
{
       foreach($div->find('li') as $li) 
       {
           
           foreach ($li->find('span[class=fr]') as $newsTime) {
               $mynews->pubtime = $newsTime;
           }
           
           foreach ($li->find('a') as $a) {
               $mynews->url = $a->href;
               $mynews->title =  $a->title;
           }
           
           
    		//设置更新ID
    		$mynews->updateID =  substr($mynews->url, strlen($mynews->url) - 12, 6);
    		//
    		$mynews->localurl = '1';
    
    		//查询详情
    		$mydetail = new newsdetail($mynews);
    		//执行查询详情
    		$mydetailstr = $mydetail->getTgbusDetail();
    
    		//数据库操作初始化
    		$myDB = new mysqlTool();
    
   			//根据updateID获得news
			$myNewsArrByID = $myDB->getTheNewsByupdateID($mynews->updateID);
    
    		if (count($myNewsArrByID) > 0) {
				//已经存在
        		echo 'updateID has added before'.$mynews->updateID.'</br>';
    		} else {
        
   		 		//存储
    		$result = $myDB->setTheNews($mynews);
    	}

           
  }

    
    /*
    echo $mynews->title .'</br>';
    echo $mynews->url .'</br>';
    echo $mynews->updateID .'</br>';
    echo $mynews->pubtime .'</br>'.'</br>'.'</br>';
   
    echo $mydetailstr->img .'</br>';
    echo $mydetailstr->detail.'</br>';
   */
}    
   
    }
    
    
}

 
?>