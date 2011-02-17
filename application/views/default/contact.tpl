<form id="contact" method="post" action="contact<?php echo ($_isXHR)? '.json' : '.html'; ?>">
	<div>
		<label for="name">Name</label>
		<input type="text" id="name" name="name" value="<?php echo $name; ?>" size="20" maxlength="30" tabindex="1" />
		<div class="error"><?php if (isset($errors['name'])) echo $errors['name']; ?></div>
	</div>
	<div>
		<label for="email">E-Mail</label>
		<input type="text" id="email" name="email" value="<?php echo $email; ?>" size="35" maxlength="250" tabindex="2" />
		<div class="error"><?php if (isset($errors['email'])) echo $errors['email']; ?></div>
	</div>
	<div>
		<label for="message">Message</label>
		<div class="error"><?php if (isset($errors['message'])) echo $errors['message']; ?></div>
		<textarea id="message" name="message" rows="5" cols="45" tabindex="3"><?php echo $message; ?></textarea>
	</div>
	<div>
		<input type="checkbox" name="cc" value="1" tabindex="4" />Send me a CC of the e-mail
	</div>
<?php if (!$_isXHR): ?>
	<button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" type="submit" tabindex="5">
		<span class="ui-button-icon-primary ui-icon ui-icon-mail-closed" />
		<span class="ui-button-text">Save</span>
	</button>
	<button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" type="reset" tabindex="6">
		<span class="ui-button-icon-primary ui-icon ui-icon-cancel" />
		<span class="ui-button-text">Reset</span>
	</button>
<?php endif; ?>
</form>