<form method="post" class="form-contact-minor" action="/process.php">
	<div class="form-field form-field--spaced">
		<label class="form-label" for="Message">Message:</label>
		<textarea class="form-item" name="Message" id="Message" required></textarea>
	</div>
	<div class="form-field form-field--spaced">
		<label class="form-label" for="Name">Name:</label>
		<input  class="form-item" type="text" name="Name" id="Name" required/>
	</div>
	<div class="form-field form-field--spaced">
		<label class="form-label" for="Email">Email:</label>
		<input class="form-item" type="email" name="Email" id="Email" required/>
	</div>
	<div class="form-field form-field--spaced">
		<label class="form-label" for="Tel">Phone:</label>
		<input class="form-item" type="tel" name="Tel" id="Tel" placeholder="Optional"/>
	</div>
	<input type="submit" name="submit" value="Submit" class="button"/>
</form>