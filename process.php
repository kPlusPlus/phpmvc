<?php
// INIT
error_reporting(E_ALL & ~E_NOTICE);
require "config.php";
require "address_book.php";
$ab = new address();
$pass = true;
$message = "";
$data = null;

// PROCESS
header('Content-Type: application/json');
if (isset($_POST['req'])) { 
	switch ($_POST['req']) {
		default:
		$pass = false;
		$message = "Invalid Request";
		break;

		case "create":
		$pass = $ab->create($_POST['address']);
		$message = $pass ? "Entry Created" : $ab->error;
		break;

		case "read":
		$pass = true;
		$data = $ab->read();
		break;

		case "update":
		$pass = $ab->update($_POST['address'], $_POST['id']);
		$message = $pass ? "Entry Updated" : $ab->error;
		break;

		case "delete":
		$pass = $ab->delete($_POST['id']);
		$message = $pass ? "Entry Deleted" : $ab->error;
		break;
	}
}

// SERVER RESPONSE
echo json_encode([
	"status" => $pass,
	"message" => $message,
	"data" => $data
]);
?>