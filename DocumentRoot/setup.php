<?php
$servername = "dockerized-lamp_mariadb_1";
$username = "testuser";
$password = "testpassword";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS Persons (
ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
age int,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
  echo "Table Persons created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}


$random_firstName = [
  1 => "Tom",
  2 => "Sita",
  3 => "Shyam",
  4 => "Happy"];

$random_lastName = [
  1 => "Sharma",
  2 => "Singh",
  3 => "Gupta",
  4 => "Verma"
];

$sql = "INSERT into Persons (firstName, lastName, age) VALUES ( ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

for ($i=0; $i<10; $i++) {
   $stmt->bind_param('ssi', $random_firstName[rand(1,4)], $random_lastName[rand(1,4)], rand(19, 75));
   $stmt->execute();
}