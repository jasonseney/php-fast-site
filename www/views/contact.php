<?php // Contact Template ?>

<?php $this->startBlock("styles"); ?>
	<link rel="stylesheet" type="text/css" href="/css/views/contact.css" />
<?php $this->endBlock(); ?>

<?php $this->startBlock("scripts"); ?>
	<script type="text/javascript" src="/js/views/contact.js"></script>
<?php $this->endBlock(); ?>

<?php $this->startBlock("main"); ?>

<h2><?php echo $model->title ?></h2>

<h3>Contact Form Goes Here</h3>

<?php $this->endBlock(); ?>
