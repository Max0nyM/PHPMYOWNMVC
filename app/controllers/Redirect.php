<?php

class Redirect extends Controller{
    public function __construct($controller,$action){
    parent::__construct($controller,$action);
    $this->load_model('Links');
    $this->view->setLayout('adDef');
    }

    public function indexAction($code){
      $db = DB::getInstance();
      $link = new Links();
      if($link->isBot()){
      Router::redirectTo($url);
      }
      else
      {  
      $url = $link->getUrl(["code"=>$code]);
      $this->view->setAdUrl($url);
      //
      $this->view->render('redirect/index');
      }
    }
}