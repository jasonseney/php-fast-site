<?php 
	$url = isset($model["url"]) ? $model["url"] : null;
?>

<li <?php echo getMenuClass($this->request->fullpath(),$url) ?> >

		<?php if(isset($url)) { ?>
			<a  href="<?php echo buildPath(array($this->site->language["path"], $url)); ?>">
		<?php } ?>

			<?php /* Tip: The actual text for each menu item is in the language specific labels config */ ?>
			<span <?php echo getMenuClass($this->request->fullpath(), $url,"name") ?>><?php echo $this->labels[$model["name"]] ?></span>

		<?php if(isset($url)) { ?>
			</a>
		<?php } ?>

	<?php if(isset($model["sections"])) { ?>
		<div class="nav-sublist">
			<ul>
				<?php foreach ($model["sections"] as $navItem) {
					echo $this->renderTemplate(ABSPATH."views/partials/navItem.php", $navItem);
				} ?>
			</ul>
		</div>
	<?php } ?>

</li>
