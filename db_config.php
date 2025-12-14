<?php

$db_host = getenv('DB_HOST') ?: 'localhost';
$db_user = getenv('DB_USER') ?: 'root';
$db_pass = getenv('DB_PASSWORD') ?: '';
$db_name = getenv('DB_NAME') ?: 'crud_db';


$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


mysqli_set_charset($conn, "utf8mb4");
?>
