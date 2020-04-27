<?php

$host = "localhost";
$db_name = "mvc";
$user = "root";
$password = "";

$conn = new mysqli($host, $user, $password, $db_name);

if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
} else {
    echo "Connected successfully, connection data are ok.";
}
