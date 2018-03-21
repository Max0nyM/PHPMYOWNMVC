<?php
function getSslPage($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
?>
<iframe id="frame" src="<?=PROOT?>ad/ad1.html" scrolling="no" frameborder="0" style="position: fixed; top: 70%; left: 40%; margin-top: -140px; margin-left: -158px; overflow:hidden; height: 580px; z-index: 100000; width:575px;"></iframe>
<iframe id="frame" src="<?=PROOT?>ad/ad2.html" scrolling="no" frameborder="0" style="position: fixed; top: 55%; left: 20%; margin-top: -140px; margin-left: -278px; overflow:hidden; height: 390px; z-index: 100000; width:300px;"></iframe>
<iframe id="frame" src="<?=PROOT?>ad/ad3.html" scrolling="no" frameborder="0" style="position: fixed; top: 37%; left: 80%; margin-top: -140px;margin-left: -278px; overflow:hidden; height: 280px; z-index: 100000; width:575px;"></iframe> 
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


   <?= $this->content('head'); ?>

</head>
<body>

    <div class="container-fluid" id="ads-block">
        <div class="row">
            <div class="col-sm-12">
 <div class="row" style="height:500px;">	
       <div class="col-sm-12"></div>
 </div>
<iframe class='iframe' width='100%' height='100%' border='0' src='https://news.am/arm/news/404061.html' scrolling='auto' frameborder='0' ></iframe>     </div>
        </div>
    </div>
		
	

</body>
</html>