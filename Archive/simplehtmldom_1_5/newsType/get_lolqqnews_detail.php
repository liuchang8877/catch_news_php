<?php
header('Content-type:text/html;charset=utf-8');
error_reporting(E_ALL);
//dom类
include_once('../simple_html_dom.php');
//新闻类
include_once('../class/newsClass.php');

class newsdetail{
    
    public $mynews;
    
	/**
	 * 折构方法
	 */
	public function __construct($mynews){
        
       	if(is_null($mynews)){
			exit('init err newsdetail');
		}
        
		$this->mynews=$mynews;
		
	}
    
	/**
     *获得lolqq详细内容html
	 */
	public function getDetail(){
        
        //echo $this->mynews.'</br>';
        
        // Create DOM from URL or file   
		$html  = file_get_html($this->mynews->url);  
      

		foreach($html->find('div[class=article]') as $div) 
		{
            //获得文章div base64加密
            $this->mynews->detail = $div;
            //获得单个第一张图
            foreach($div->find('p[style=text-align:center;] img') as $img) {
            
                //echo $img.'</br>';
                $this->mynews->img = $img->src;
                break;
            }
          
   		 }

        //新闻为论坛中内容
        /*if (is_null($this->mynews->detail)) {
        
            foreach($html->find('div[class=t_fsz]') as $div) {
            
            	//获得文章div
            	$this->mynews->detail = $div;
            	//获得单个第一张图
            	foreach($div->find('p[style=text-align:center;] img') as $img) {
            
                	//echo $img.'</br>';
                	$this->mynews->img = $img->src;
                	break;
            	}
            
            }
        }//if*/
        
        return $this->mynews;
        
    }//method
    
    
   	/**
     *获得tgbus详细内容html
	 */
	public function getTgbusDetail(){
        
        //echo $this->mynews.'</br>';
        
        // Create DOM from URL or file   
		$html  = file_get_html($this->mynews->url);  
      
        //fz14 lh28 mt10
        //ov mb10
		foreach($html->find('div[class=detail-word-wen mt15 tal lh24]') as $div) 
		{
            //获得文章div
            $this->mynews->detail = base64_encode($div);
            //获得单个第一张图
            foreach($div->find('p[style=text-align: center] img') as $img) {
            
                //echo $img.'</br>';
                $this->mynews->img = $img->src;
                break;
            }
          
   		 }
        
        return $this->mynews;
        
    }//methos

}
?>