<?php $this->startBlock("styles"); ?>
<link rel="stylesheet" type="text/css" href="/css/views/basic.css" />
<?php $this->endBlock(); ?>

<?php $this->startBlock("main"); ?>
<div class="basic">

	<div id="pageTitle">
		<h2><?php echo $model->title ?></h2>
	</div>

	<div><?php echo $model->content ?></div>

</div>
<?php $this->endBlock(); ?>
