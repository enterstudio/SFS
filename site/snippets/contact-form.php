<form method="post" action="/process.php">
	<div class="form-field form-field--spaced">
		<label class="form-label" for="Message">Message:</label>
		<textarea class="form-item" name="Message" rows="5" cols="5" id="Message"></textarea>
	</div>
	<div class="form-field form-field--spaced">
		<label class="form-label" for="Name">Name:</label>
		<input  class="form-item" type="text" name="Name" id="Name" />
	</div>
	<div class="form-field form-field--spaced">
		<label class="form-label" for="Email">Email:</label>
		<input class="form-item" type="email" name="Email" id="Email" />
	</div>
	<div class="form-field form-field--spaced">
		<label class="form-label" for="Tel">Phone:</label>
		<input class="form-item" type="tel" name="Tel" id="Tel" />
	</div>
	<div class="form-field form-field--spaced">
		<input type="submit" name="submit" value="Submit" class="button" />
	</div>
</form>