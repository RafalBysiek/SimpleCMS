<?php require('partials/head.php'); ?>

	<?php require('partials/nav_logged.php'); ?>

	<h1>Add new company</h1>

		<form method="POST" action="/login">
		<ul>
			Company name: 
			<li><input type="text" name="name_company"></li><br>
			Adress of company:
			<li><input type="text" name="adress_company"></li><br>
			Street:
			<li><input type="text" name="street_company"></li><br>
			City:
			<li><input type="text" name="street_company"></li><br>
			Country:
			<li><input type="text" name="country_company"></li><br>
			NIP:
			<li><input type="number" name="NIP_company"></li><br>
			Email of the company:
			<li><input type="email" name="email_company"></li><br>
			<input value="checkbox" type="checkbox"> Zgoda na przetwarzanie informacji.<br>
			<li><button type="submit" name="submit">Finish</button></li>
		</ul>
	</form>

<?php require('partials/footer.php'); ?>