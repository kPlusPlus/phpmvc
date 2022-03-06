<!DOCTYPE htm>
<html>
<body>
	<ul>
		<?php
		clearstatcache();

		error_clear_last();
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

		require_once "database.php";
		//require_once "users.php";
		require_once "controller.php";
		$users = new Users();
		//foreach ($users->get() as $u) {
		foreach ($users->getsql("SELECT * FROM users ORDER BY id") as $u) {
			echo "<li>" . $u['name'] . " " . $u['id'] . "</li>";
		}
		?>		
	</ul>
</body>
</html>