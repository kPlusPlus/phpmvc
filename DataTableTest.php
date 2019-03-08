<?php
	//use \RedBeanPHP\R as R;
    //R::setup( 'mysql:host=159.69.113.252;dbname=kapluspl_crc',
    //    'maniac', 'F3VA55TpNfsA' ); //for both mysql or mariaDB



/* connect to the db */
$connection = mysqli_connect('159.69.113.252','maniac','F3VA55TpNfsA','kapluspl_crc');
mysqli_select_db('my_db',$connection);
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

/* show tables */
$result = mysql_query('SHOW TABLES',$connection) or die('cannot show tables');
while($tableName = mysql_fetch_row($result)) {

	$table = $tableName[0];
	
	echo '<h3>',$table,'</h3>';
	$result2 = mysql_query('SHOW COLUMNS FROM '.$table) or die('cannot show columns from '.$table);
	if(mysql_num_rows($result2)) {
		echo '<table cellpadding="0" cellspacing="0" class="db-table">';
		echo '<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default<th>Extra</th></tr>';
		while($row2 = mysql_fetch_row($result2)) {
			echo '<tr>';
			foreach($row2 as $key=>$value) {
				echo '<td>',$value,'</td>';
			}
			echo '</tr>';
		}
		echo '</table><br />';
	}
}
?>