<!DOCTYPE htm>
<html>
<body>
	<ul>
		<?php
		require_once "database.php";
		//require_once "users.php";
		require_once "controller.php";
		$users = new Users();
		//foreach ($users->get() as $u) {
		foreach ($users->getsql("SELECT * FROM users ORDER BY id") as $u) {
			echo "<li>" . $u['name'] . " " . $u['id'] . "</li>";
		}
		?></ul>
	</body>
	</html>