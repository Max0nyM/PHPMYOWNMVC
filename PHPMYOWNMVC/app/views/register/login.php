<?php $this->start('body'); ?>
<div class="container">
	<div class="row img">
		<div class="col-md-5">
			<img class="responsive-image" src="<?=PROOT?>images/login.png" alt="">
		</div>
	</div>
	<div class="row loginBox">
	<p>Enter your Username and Password</p>
	<form action="<?=PROOT?>register/login" method="POST">
	<div class="bg-danger"><?=$this->displayErrors;?></div>
		<input type="text" name="username">
		<input type="password" name="password">
		<button type="button" style="margin-top:50px;" class="btn btn-success buttona"><a href="<?=PROOT?>register/register">Register</a></button>
		<button type="button submit" class="btn btn-success buttona">SIGN IN</button>
	</form>
	</div>
</div>
<?php $this->end(); ?> 

