<?php
	error_clear_last();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once __DIR__ . '/vendor/autoload.php';
	
	use \RedBeanPHP\R as R;
    R::setup( 'mysql:host=192.168.1.111;dbname=kapluspl_miau',
        'maniac', 'F3VA55TpNfsA' ); //for both mysql or mariaDB
	//echo "pipica 555"

	$users = R::findAll('cities');
	foreach ($users as $user){
    echo $user->name.'<br>';
}
?>