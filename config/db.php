<?php

$servername = "localhost";
$username = "";
$password = "";
$dbName = "test_project";
$table = "subscriptions";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error
    );
}

// Make $dbName the current database
$db_selected = mysqli_select_db($conn, $dbName);

// If database is not exist create one
if (!$db_selected) {
    // If we couldn't, then it either doesn't exist, or we can't see it.
    $sql = "CREATE DATABASE " . $dbName;

    if (mysqli_query($conn, $sql)) {
        //echo "Database $dbName created successfully\n";
        //select db
        mysqli_select_db($conn, $dbName);
    } else {
        //echo "Error creating database: " . $conn->error;
    }
}


function table_exists($conn, $tablename, $dbName)
{

    $sql = "SELECT COUNT(*) AS count 
        FROM information_schema.tables 
        WHERE table_schema = '$dbName' 
        AND table_name = '$tablename'";
    $res = mysqli_query($conn, $sql)->fetch_object()->count;;
    return $res;

}

// Check to see if table exists, if doesn't create
if (!table_exists($conn, $table, $dbName)) {
    // sql to create table
    $sql = "CREATE TABLE $table (
    sid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    created TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        //echo "Table $table created successfully";
    } else {
        //echo "Error creating table: " . $conn->error;
    }
    
}

