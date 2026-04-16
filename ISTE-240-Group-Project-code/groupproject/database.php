<?php
session_start();

$mysqli = new mysqli("localhost", "enter_username", "enter_password", "enter_database_name");

if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}
?>