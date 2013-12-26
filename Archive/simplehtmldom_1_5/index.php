<?php
header('Content-type:text/html;charset=utf-8');
error_reporting(E_ALL);
include_once('simple_html_dom.php');
//新闻类
include_once('class/newsClass.php');


$myhost = "http://lol.qq.com";
$mynews = new news();

// Create DOM from URL or file   
$html  = file_get_html( 'http://lol.qq.com/webplat/info/news_version3/152/4579/m3105/list_2.shtml' );  
     
  
// Extract images   
foreach ( $html ->find( 'li[class=news_lst plr25] a[target=_blank]' )  as   $element )  {
	
    //echo $element->a. '<br>';

} 
    

foreach($html->find('li[class=news_lst plr25]') as $li) 
{
       foreach($li->find('a[target=_blank]') as $a) 
       {
           
            $mynews->title = $a->plaintext;
            $mynews->url   = $myhost . $a->href;
       }
    
       foreach($li->find('span[class=fr]') as $span) 
       {
            $mynews->pubtime = $span;
       }
    
    
    echo $mynews->title .'</br>';
    echo $mynews->url .'</br>';
    echo $mynews->pubtime .'</br>'.'</br>'.'</br>';
}

//echo   $element->find('a[target=_blank]')  . '<br>' ;  
?>