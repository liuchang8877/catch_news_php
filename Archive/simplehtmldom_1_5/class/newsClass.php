<?php

class news{
    
    public $newsID;
    
    public $title;
    
    public $url;
    
    public $localurl;
    
    public $pubtime;
    
    public $detail;
    
    public $note;
    
    public $img;
    
    public $updateID;
	
	/**
	 * 折构方法
	 */
	public function __construct(){
		
	}
    
    /**
     * 设置类各个项数值
     *
     */
    public function setTheAllItem($newsID,$title,$url,$localurl,$pubtime,$detail,$note,$img,$updateID){
        
    	if(is_null($newsID)){
			exit('newsID初始化错误');
		}
		if(is_null($title)){
			exit('title初始化错误');
		}
		if(is_null($url)){
			exit('url初始化错误');
		}
		if(is_null($localurl)){
			exit('localurl初始化错误');
		}
		if(is_null($pubtime)){
			exit('pubtime初始化错误');
		}
        if(is_null($detail)){
			exit('detail初始化错误');
		}
        if(is_null($note)){
			exit('note初始化错误');
		}
        if(is_null($img)){
			exit('img初始化错误');
		}
        if(is_null($updateID)){
			exit('updateID初始化错误');
		}
        
		$this->newsID=$newsID;
        $this->title=$title;
        $this->url=$url;
        $this->localurl=$localurl;
        $this->pubtime=$pubtime;
        $this->detail=$detail;
        $this->note=$note;
        $this->img=$img;
        $this->updateID=$updateID;
    
    }

}
 ?>