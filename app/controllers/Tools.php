<?php

class Tools extends Controller
{
  public function __construct($controller,$action){
    parent::__construct($controller,$action);
    $this->view->setLayout('default');
  } 

  public function indexAction(){
      $this->view->render('tools/index');
  } 

    public function firstAction(){
      $this->view->render('tools/first');
  } 

      public function secondAction(){
      $this->view->render('tools/second');
  } 

    public function shortUrlAction(){
       $validation = new Validate();
      $this->view->displayErrors = $validation->displayErrors();
      $this->view->render('tools/url');
  } 
}