<?php 
$googleAddress = 
	$model->streetAddress . "+" .  
	$model->city . "+" .  
	$model->region . "+" .  
	$model->postalCode . "+" .  
	$model->country;
?>
<div class="vcard">
	<div class="fn org"><?php echo $model->name; ?></div>
	<a href="http://maps.google.com?q=<?php echo $googleAddress; ?>" target="_blank" title="View Map">
		<div class="adr">
			<div class="street-address"><?php echo $model->streetAddress; ?></div>
			<div class="extended-address"><?php echo $model->extendedAddress; ?></div>
			<div> <span class="locality"><?php echo $model->city; ?></span>, <abbr class="region"><?php echo $model->region; ?></abbr> <span class="postal-code"><?php echo $model->postalCode; ?></span> <span class="country-name"><?php echo $model->country; ?></span>
			</div>
		</div>
	</a>
	<div><? echo $this->labels["phone"]; ?> : <span class="tel"><?php echo $model->telephone; ?></span></div>
	<?php if(isset($model->fax)) { ?>
		<div>
			<span class="tel"><span class="type">Fax</span>: 
			<span class="value"><?php echo $model->fax; ?></span></span>
		</div>
	<?php } ?>
</div>
