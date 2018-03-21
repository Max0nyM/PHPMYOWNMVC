<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?= $this->_siteTitle; ?></title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/7.0.0/normalize.css">
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css?family=Bellefair|Bitter|Cabin|Hind|Josefin+Sans|Khula|Muli|Nunito|Poppins|Zilla+Slab" rel="stylesheet">

    <link rel="stylesheet" href="<?=PROOT?>css/custom.css">
    <script src="<?=PROOT?>js/jquery-2.2.4.min.js"></script>
    <script src="<?=PROOT?>js/bootstrap.min.js"></script>
    <script src="<?=PROOT?>js/js.js"></script>

   <?= $this->content('head'); ?>

</head>
<body>
<?php include('main_menu.php') ?>
<div class="containter-fluid" style="min-height:call(100%-125px);">
<?= $this->content('body'); ?>
</div>
</body>
</html>