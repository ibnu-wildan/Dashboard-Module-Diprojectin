<?php

include __DIR__ . '/../../app/url.php';
include __DIR__ . '/../../app/db.php';

$query = "SELECT id, username, email, password FROM data_user;";
$result = $conn->query($query);

$users = [];

while ($row = $result->fetch_assoc()) {
    $users[] = [
        'id' => $row['id'],
        'name' => $row['username'],
        'email' => $row['email']
    ];
}
//json
header('Content-Type: application/json');
echo json_encode($users);

$conn->close();