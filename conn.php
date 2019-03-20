<?php

/* Credentials for database access */
$host = "localhost";
$username = "root";
$password = "";
$dbname = "arimax_db";

/* Connect to database */
$conn = new mysqli($host, $username, $password, $dbname);

/* Throw error if connection refused */
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>