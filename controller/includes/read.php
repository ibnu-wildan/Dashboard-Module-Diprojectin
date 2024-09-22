<?php

// include "../app/db.php";
include __DIR__ . "/../app/db.php";


// read data
$query = "SELECT * FROM data_mahasiswa";
$result = $conn->query($query);

$data = [];

while ($row = $result->fetch_assoc()) {
    
    $data[] = $row;
    
}

?>