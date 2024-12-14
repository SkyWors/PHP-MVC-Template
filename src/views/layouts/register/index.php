<?php
	use App\Utils\Lang;
?>

<h1>Register</h1>

<form method="POST">
	<input
		type="text"
		name="name"
		value="<?= isset($_POST["name"]) ? $_POST["name"] : "" ?>"
		placeholder="<?= Lang::translate("MAIN_NAME") ?>"
		require
		autofocus
	>
	<input
		type="text"
		name="surname"
		value="<?= isset($_POST["surname"]) ? $_POST["surname"] : "" ?>"
		placeholder="<?= Lang::translate("MAIN_SURNAME") ?>"
		require
	>
	<input
		type="text"
		name="email"
		value="<?= isset($_POST["email"]) ? $_POST["email"] : "" ?>"
		placeholder="<?= Lang::translate("MAIN_EMAIL") ?>"
		require
	>
	<input
		type="password"
		name="password"
		value="<?= isset($_POST["password"]) ? $_POST["password"] : "" ?>"
		placeholder="<?= Lang::translate("MAIN_PASSWORD") ?>"
		require
	>
	<input
		type="password"
		name="password_confirm"
		value="<?= isset($_POST["password_confirm"]) ? $_POST["password_confirm"] : "" ?>"
		placeholder="<?= Lang::translate("REGISTER_PASSWORD_CONFIRM") ?>"
		require
	>

	<button type="submit"><?= Lang::translate("REGISTER_SUBMIT") ?></button>
</form>
