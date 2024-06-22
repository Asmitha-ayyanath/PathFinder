<?php
// Connect to your database (e.g., MySQL)
$servername = "localhost";
$username = "id20679722_root";
$password = "Asmi#001";
$dbname = "id20679722_pathfinder";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database (e.g., a list of users)
$sql = "SELECT * FROM location";
$result = $conn->query($sql);

// Convert the data to JSON format
$i=0;
$data = array();
if ($result->num_rows >0) {
    while ($row = $result->fetch_assoc()) {
        $data[$i] = $row;
        $i++;
    }
}

$conn->close();

// Send the JSON data back to the client

header("Content-Type: application/json");
echo json_encode($data);
?>
