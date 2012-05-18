<ul id="menu">

	<?php foreach ($model as $navItem) {
		echo $this->renderTemplate(ABSPATH."views/partials/navItem.php", $navItem);
	} ?>

</ul>
