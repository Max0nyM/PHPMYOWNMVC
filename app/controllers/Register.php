<?php

class Register extends Controller{
    public function __construct($controller,$action){
    parent::__construct($controller,$action);
    $this->load_model('Users');
    $this->view->setLayout('default');
    }

    public function loginAction(){
      $validation = new Validate();
      
      $db = DB::getInstance();
      if($_POST){
        $validation->check($_POST,array('username'=>array('display'=>'Username','required'=>true),'password'=> array('display'=>'Password','required'=>true,'min'=>3)));
        if($validation->passed()){
          
          $user = $this->UsersModel->findByUsername($_POST['username']);
          if($user && password_verify(Input::get('password') , $user->password)){
          
            $user->login(true);
        
            Router::redirect('');
          }
        else{
          $validation->addError("There is an error with username or password");
        }
        }

      }
      $this->view->displayErrors = $validation->displayErrors();
      $this->view->render('register/login');
    }

  public function logoutAction(){
   if(currentUser()){
      currentUser()->logout();
      }
       Router::redirect('register/login');
    }

    public function registerAction(){
      $validation = new Validate();
      $posted_values = ['fname'=>'','lname'=>'','username'=>'','email'=>'','password'=>'','confirm'=>''];

     
      if($_POST){
        $posted_values = posted_values($_POST);
        $validation->check($_POST,[
        'fname'=>[
          'display'  => 'First Name',
          'required' => true
        ], 
         'lname'=>[
          'display'  => 'Last Name',
          'required' => true
        ],
        'username'=>
        [
          'display'  => 'Username',
          'required' => true,
          'min'=>4,
          'unique'=>'users'
        ],
        'email'=>[
          'display'=>'Email',
          'required'=>true,
          'valid_email'=>true,
          'unique'=>'users'
        ],
        'password'=>[
          'display'=>'Password',
          'required'=>true,
          'min'=>4,
          'max'=>150
        ],
        'confirm'=>[
          'display'=>'Confirm',
          'required'=>true,
           'min'=>4,
          'max'=>150,
          'matches'=>'password'
        ]
        ]);
      if($validation->passed()){
        $newUser = new Users();
        $newUser->registerNewUser($_POST);
        $newUser->login();
        Router::redirect('');
      }

      }
      $this->view->post = $posted_values;
      $this->view->displayErrors = $validation->displayErrors();
      $this->view->render('register/register');
    }
}