<!DOCTYPE html>
<html class="no-js">
	<head>
		<meta charset="utf-8">

		<?php /* Tip: Set global title/description in config file, add on action specific names in model. */ ?>
		<title><?php echo $this->labels["title"] ?><?php echo $model->title ?></title>
		<meta name="description" content="<?php echo strtoupper($this->labels["description"]); ?><?php echo $model->description ?>" />

		<meta name="viewport" content="width=960px"/>  

		<?php /* Tip: Add FB Open Graph meta elements to this block */ ?>
		<?php echo $this->renderBlock("meta"); ?>

		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>
		<link rel="apple-touch-icon-precomposed" href="/favicon-ios.png">

		<script type="text/javascript">
			/*<![CDATA[*/
			document.getElementsByTagName('html')[0].className = 'js';
			/*]]>*/
		</script>

		<link rel="stylesheet" href="/css/base.css" type="text/css" />

		<?php /* Tip: Add template specific stylesheets to this block */ ?>
		<?php echo $this->renderBlock("styles"); ?>

		<script type="text/javascript" src="/js/util.js"></script>

	</head>
	<body>

<div id="container" class="">
		<div id="top"></div>	

		<div id="header">

			<h1><a href="/"><?php echo $this->labels["title"] ?></a></h1>

			<ul id="topmenu">
				<li><a href="<?php echo $model->features["links"]["facebook"]; ?>" class="facebook" target="_blank"><?php echo $this->labels["facebook"] ?></a></li>
				<li><a href="<?php echo $model->features["links"]["twitter"]; ?>" class="twitter" target="_blank" ><?php echo $this->labels["twitter"] ?></a></li>
			</ul>

			<?php echo $this->renderTemplate(ABSPATH."views/partials/nav.php", $model->features["nav"]["menu"]); ?>

		</div><!-- end header div -->

		<div id="content">

				<?php /* Tip: All your main content will go in this block. */ ?>
				<?php echo $this->renderBlock("main"); ?>

		</div><!-- end #content -->

		<div id="footer" class="clear">
			<?php echo $this->renderTemplate(ABSPATH."views/partials/footer.php", $model); ?>
		</div>

		<?php echo $this->renderTemplate(
				ABSPATH."views/partials/googleAnalytics.php", 
				$model->features["googleAnalyticsId"]
		); ?>

		<?php /* Tip: Add template specific JavaScript to this block. */ ?>
		<?php echo $this->renderBlock("scripts"); ?>
</div>
	</body>
</html>
