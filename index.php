<h4>Attempting MySQL connection from php...</h4>
<?php
require_once './connection.php';
$databaseConnection = new DatabaseConnection('mysql');
$conn = $databaseConnection->getConnection();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to MySQL successfully!";
}

phpinfo();
?>
