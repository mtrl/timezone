<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="stylesheet" href="/css/style.css">

	<script src="/js/libs/modernizr-2.0.6.min.js"></script>
</head>
<body>

<div id="container">
	<header>

	</header>
	<div id="main" role="main">

<h1>Compare time across multiple timezones</h1>

<form action="/home/results" method="get">
1. Select your timezone
<br />
<select name="user-timezone">
<?php foreach($timezones as $timezone => $nice): ?>
	<option value="<?php echo $timezone ?>"<?php if($timezone == @$settings['user-timezone']): ?> selected<?php endif;?>><?php echo $nice ?></option>
<?php endforeach;?>	
</select>
<br />
2. Enter the time you want to compare (e.g. 23:53)
<br />
<input type="text" name="time" value="<?php echo @$settings['time']?>" />
<br />
3. Enter the date you want to compare (e.g. 2011/12/23)
<br />
<input type="text" name="date" value="<?php echo @$settings['date']?>" />
<br />
4. Select the timezones you want to compare across
<br />
<select name="compare[]" multiple="multiple" class="compare">
<?php foreach($timezones as $timezone => $nice): ?>
	<option value="<?php echo $timezone ?>"<?php if(isset($settings['compare']) && $settings['compare'] != null && array_search($timezone, $settings['compare']) !== false): ?> selected<?php endif;?>><?php echo $nice ?></option>
<?php endforeach;?>
</select>
<br />
<input type="submit" value="Go!" />
</form>
<?php // RESULTS ?>
<?php if(isset($times)):?>
	<h2>At <strong><?php echo $this->input->get('time') ?></strong> on <strong><?php echo $this->input->get('date') ?></strong> in <?php echo $this->input->get('user-timezone') ?> (UTC: <?php echo $utc_time?>)</h2>
	<p>It will be</p>
	<?php foreach($times as $time):?>
		<p><strong><?php echo $time['time'] ?></strong> in <strong><?php echo $time['nice']?></strong></p>
	<?php endforeach;?>
<?php endif; ?>

</div>
	<footer>

	</footer>
</div> <!--! end of #container -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/js/libs/jquery-1.6.2.min.js"><\/script>')</script>

<!-- scripts concatenated and minified via ant build script-->
<script src="/js/plugins.js"></script>
<script src="/js/script.js"></script>
<!-- end scripts-->

<script>
	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
	<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->

</body>
</html>
