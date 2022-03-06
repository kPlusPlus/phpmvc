<?php
	require_once __DIR__ . '/vendor/autoload.php';
	
	use \RedBeanPHP\R as R;
    R::setup( 'mysql:host=192.168.1.111;dbname=kapluspl_crc',
        'maniac', 'F3VA55TpNfsA' ); //for both mysql or mariaDB
?>