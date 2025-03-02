<?php
session_start();
$HOST = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DB = "form_login";
$CONNECTION = new mysqli($HOST, $USERNAME, $PASSWORD, $DB);

if ($CONNECTION->connect_error) {
	die("Connection failed: " . $CONNECTION->connect_error);
}
?>