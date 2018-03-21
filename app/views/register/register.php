<?php $this->start('body'); ?>
<div class="container">
	<div class="row img">
		<div class="col-md-5">
			<img class="responsive-image" src="<?=PROOT?>images/login.png" alt="">
		</div>
	</div>
	<div class="row loginBox">
	<p>Enter your Username and Password</p>
	<form action="<?=PROOT?>register/register" method="POST">
	<div class="bg-danger"><?=$this->displayErrors;?></div>
    <input type="text" id="fname" name="fname" value="<?=$this->post['fname']?>">
    <input type="text" id="lname" name="lname" value="<?=$this->post['lname']?>">
    <input type="email" id="email" name="email" value="<?=$this->post['email']?>">
	<input type="text" id="username" name="username" value="<?=$this->post['username']?>">
	<input type="password" id="password" name="password" value="<?=$this->post['password']?>">
    <input type="password" id="confirm" name="confirm" value="<?=$this->post['confirm']?>">
	<button type="button submit" class="btn btn-success buttona">SIGN IN</button>
	</form>
	</div>
</div>
<?php $this->end(); ?> 

