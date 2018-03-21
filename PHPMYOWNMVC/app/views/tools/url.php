<?php $this->start('body'); ?>
<div class="container">
	<div class="row img">
		<div class="col-md-5">
			
		</div>
	</div>
	<div class="row loginBox">
	<p>Enter URL FOR SHORTENING</p>
	<div class="bg-danger" id="bg-danger"><?=$this->displayErrors;?></div>
    
		<input type="text" name="url">
		<button  action="<?=PROOT?>api/shortUrl" id="url" type="button submit" class="btn btn-success buttona">SHORT</button>

	</div>
</div>
<?php $this->end(); ?> 

