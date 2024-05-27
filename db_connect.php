<?php
//database menggunakan postgres
// File: db_connect.php
function connect_db() {
    $host = 'localhost';
    $dbname = 'postgres';
    $user = 'postgres';
    $password = null;
    
    $conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

    if (!$conn) {
        die("Error: Unable to connect to the database.\n");
    }

    return $conn;
}
?>