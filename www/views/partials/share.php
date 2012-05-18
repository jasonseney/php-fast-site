<div class="share">
	<div class="trigger"><?php echo $this->labels["share"]; ?></div>
	<ul class="links hidden">
		<li><a class="open-email" href="#"><?php echo $this->labels["email"]; ?></a></li>
		<li><a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode($model->url) ?>" target="_blank">Facebook</a></li>
		<li><a href="http://www.twitter.com/intent/tweet?url=<?php echo urlencode($model->url) ?>" target="_blank">Twitter</a></li>
		<li><a href="http://www.tumblr.com/share/link?url=<?php echo urlencode($model->url) ?>&name=<?php echo urlencode($model->title) ?>&description=<?php echo urlencode($model->description) ?>" target="_blank">Tumblr</a></li>
	</ul>

	<form class="email-form" name="share" action='/api/email.php' method='post'>
		<input type='hidden' name='title' value='<?php echo $model->title ?>' />
		<input type='hidden' name='url' value='<?php echo $model->url ?>' />
		<div class='title'>
			<span><?php echo $this->labels["emailFriend"]; ?></span>
		</div>
		<ul class='fields'>
			<li class='name'>
				<label for='name'><?php echo $this->labels["yourname"]; ?></label>
				<input type='text' name='name' required/>
			</li>
			<li class='from'>
				<label for='from'><?php echo $this->labels["youremail"]; ?></label>
				<input type='email' name='from' required/>            
			</li>
			<li class='to'>
				<label for='to'><?php echo $this->labels["recipientsemail"]; ?></label>
				<input type='email' name='to' required/>    
			<li class='message'>
			<label for='message'><?php echo $this->labels["message"]; ?></label>
				<textarea name='message'></textarea>
			</li>
		</ul>
		<div class='buttons'>
			<button type='reset'><?php echo $this->labels["cancel"]; ?></button>
			<button type='submit'><?php echo $this->labels["send"]; ?></button>
		</div>
		<div style="clear:both;"></div>
	</form>
</div>
