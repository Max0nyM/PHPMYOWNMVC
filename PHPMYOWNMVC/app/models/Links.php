<?php

class Links extends Model {

protected $_id,$_code,$_user_agent_to_filter;

public function __construct(){
$table = 'links';
parent::__construct($table);
$this->_sessionName = CURRENT_USER_SESSION_NAME;
$this->_cookieName = REMEMBER_USER_COOKIE_NAME;
}


public function isBot(){
return  $_SERVER['HTTP_USER_AGENT'] == "facebookexternalhit/1.1";
}


    public function getUrl($code)
    {
        $this->assign($code);
        $res =  $this->_db->findFirst('links',['conditions'=>'code = ?','bind'=>[$this->code]]);
        $this->_url = $res->url;
        return $res->url;
    }

    public function newCode($params)
    {
        $this->assign($params);
        $check =  $this->_db->findFirst('links',['conditions'=>'url = ?','bind'=>[$this->url]]);
        if(!$check){
         $this->_id=rand(1000000000,PHP_INT_MAX);  
         $this->_code=base_convert($this->_id,10,36); 
         $this->code = $this->_code;
         $this->save();
         return $this->_code;
         }
         return $check->code;

    }

   
}