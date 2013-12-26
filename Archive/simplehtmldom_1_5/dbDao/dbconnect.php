<?php
include_once('../class/newsClass.php');

class mysqlTool{

    /*
    *	存储新闻列表
    *
    */
    public function setTheNews($myNewsList) {
        
        
       	$link = mysql_connect ( SAE_MYSQL_HOST_M . ':' . SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS );
    	    if ($link) {
        
        	    mysql_select_db ( SAE_MYSQL_DB, $link );
                mysql_set_charset("utf8");
                //echo ("<td>$user_name</td> </br>");
                $sql = "INSERT INTO lolnews (title,url,localurl,pubtime,detail,note,img,updateID) 
                		VALUES('".$myNewsList->title."','".$myNewsList->url."',
                            '".$myNewsList->localurl."','".$myNewsList->pubtime."','".$myNewsList->detail."',
                            '".$myNewsList->note."','".$myNewsList->img."','".$myNewsList->updateID."')";
                print_r ($sql);
                $result = mysql_query( $sql );
                //print_r($result);
                return $result ;
            }
    }
    
    
    /*
    *	获得新闻列表数组
    *
    */
    public function getNewsList() {
            $link = mysql_connect ( SAE_MYSQL_HOST_M . ':' . SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS );
    	    if ($link) {
                mysql_select_db ( SAE_MYSQL_DB, $link );
                mysql_set_charset("utf8");
                //echo ("<td>$user_name</td> </br>");
                $sql = "select * from lolnews";
                $result = mysql_query ( $sql );
                
                //echo (print_r(mysql_fetch_array($result)));
                $newListArr =  array();
                 while ( $row = mysql_fetch_array ( $result, MYSQL_NUM ) ) {
                     
                     $myNewslist = new news();
                     $myNewslist->setTheAllItem($row[0],$row[1],$row[2],$row[3],$row[4],'',$row[6],$row[7],$row[8]);
                    
                     
                     array_push($newListArr,$myNewslist);

                }
                //print_r($newListArr);
                
                return $newListArr;
            }
        
    }
    
    
    /*
    *	根据updateID 获得新闻
    *
    */
    public function getTheNewsByupdateID($updateID) {
        
            $link = mysql_connect ( SAE_MYSQL_HOST_M . ':' . SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS );
    	    if ($link) {
                mysql_select_db ( SAE_MYSQL_DB, $link );
                mysql_set_charset("utf8");

                $sql = "select * from lolnews where updateID = '".$updateID."'";
                //echo $sql;
                $result = mysql_query ( $sql );
           
                //echo (print_r(mysql_fetch_array($result)));
                $newListArr =  array();
                 while ( $row = mysql_fetch_array ( $result, MYSQL_NUM ) ) {
                     
                     //$proID,$title,$content,$queTime,$queType,$queTag
                             
                     $myNews = new news();
                     $myNews->setTheAllItem($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);

                    
                     //print_r $row[0];
                     array_push($newListArr,$myNews);

                }
                //print_r($newListArr);
                
                return $newListArr;
            }
        
    }
    
}

?>