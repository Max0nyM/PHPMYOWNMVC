<?php

class Users extends Model {
    private $_isLoggedIn,$_sessionName,$_cookieName;
    public static $currentLoggedInUser = null;

public function __construct($user=''){
$table = 'users';
parent::__construct($table);
$this->_sessionName = CURRENT_USER_SESSION_NAME;
$this->_cookieName = REMEMBER_USER_COOKIE_NAME;
$this->_softDelete = true;
if($user != ''){
    if(is_int($user)){
        $u = $this->_db->findFirst('users',array('conditions'=>'id = ?','bind'=>array($user)));
    }else{
        $u = $this->_db->findFirst('users',array('conditions'=>'username = ?','bind'=>array($user)));
    }
    if($u){
        foreach($u as $key =>$val){
            $this->$key = $val;
        }
    }
}

}

public function findByUsername($username){
   return $this->findFirst(array('conditions'=>"username = ?",'bind'=>array($username)));
}

public static function currentLoggedInUser(){
    if(!isset(self::$currentLoggedInUser) && Session::exists(CURRENT_USER_SESSION_NAME)) {
     $U = new Users((int)Session::get(CURRENT_USER_SESSION_NAME));
     self::$currentLoggedInUser = $U;
    }
    return self::$currentLoggedInUser;
}

public function login($rememberMe=false){
    Session::set($this->_sessionName,$this->id);
    if($rememberMe){
        $hash = md5(uniqid()+rand(0,999));
        $user_agent = Session::uagent_no_version();
        Cookie::set($this->_cookieName,$hash,REMEMBER_ME_EXPIRY);
        $fields = array('session'=>$hash,'user_agent'=>$user_agent,'user_id'=>$this->id);
        $this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?",array($this->id,$user_agent));
        $this->_db->insert('user_sessions',$fields);
    }
}

public function logout(){
    $userSession = UserSessions::getFromCookie();
    if($userSession) $userSession->delete();
    Session::delete(CURRENT_USER_SESSION_NAME);
    if(Cookie::exists(REMEMBER_USER_COOKIE_NAME)){
        Cookie::delete(REMEMBER_USER_COOKIE_NAME);
    }
    self::$currentLoggedInUser = null;
    return true;
}

public static function loginUserFromCookie(){
    $userSession = UserSessions::getFromCookie();
    $user_session_model = new UserSessions();
    $user_session = $user_session_model->findFirst(array('conditions'=>"user_agent = ? AND session = ?",'bind'=> array(Session::uagent_no_version(),Cookie::get(REMEMBER_USER_COOKIE_NAME))));
    if($user_session->user_id != ''){
        $user = new self($user_session->user_id);
        
    }
    $user->login();
    return $user;
}

public function registerNewUser($params)
{
    $this->assign($params);
    $this->deleted = 0;
    
    $this->password = password_hash($this->password,PASSWORD_DEFAULT);
    $this->save();
}

public function acls(){
    if(empty($this->acl)) return [];
    return json_decode($this->acl,true);
}

}