<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>Conforming XHTML 1.0 Strict Template</title>

</head>

<body>


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
	<option value="<?php echo $timezone ?>"<?php if(isset($settings['compare']) && array_search($timezone, $settings['compare']) !== false): ?> selected<?php endif;?>><?php echo $nice ?></option>
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

</body>
</html>
