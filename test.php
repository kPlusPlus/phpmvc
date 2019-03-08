<?php
	require_once __DIR__ . '/vendor/autoload.php';
	
	use \RedBeanPHP\R as R;
    R::setup( 'mysql:host=159.69.113.252;dbname=kapluspl_crc',
        'maniac', 'F3VA55TpNfsA' ); //for both mysql or mariaDB
?>