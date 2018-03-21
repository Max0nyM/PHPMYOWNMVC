<?php

class Api extends Controller{
    public function __construct($controller,$action){
    parent::__construct($controller,$action);
    $this->load_model('Links');
    }

    public function indexAction(){
      $db = DB::getInstance();
      echo "{}";
      //$this->view->render('api/index');
    }


    public function shortUrlAction(){
      $db = DB::getInstance();
      $validation = new Validate();
        if($_POST){
          $validation->check($_POST,[
          'url'=>[
            'display'=>'URL',
            'required'=>true,
            'valid_url'=>true
           // 'unique'=>'links'
          ]
        ]);
    
        if($validation->passed()){
         $newLink = new Links();
        echo "{\"error\":false,\"message\":\"".urlencode(trim(SITE_URL.$newLink->newCode($_POST)))."\"}";
        }
        else
        {
          echo $validation->displayErrors();
        }
        }
   
    }
}