<?php require('partials/head.php'); ?>

	<?php require('partials/nav.php'); ?>

	<h1>Sign Up</h1>

	<form mehtod="POST" action="/login">
		<ul>
			<li><input type="email" name="email"></li>
			<li><input type="password" name="password"></li>
			<li><button name="login">zaloguj</button></li>
		</ul>
	</form>

<?php require('partials/footer.php'); ?>