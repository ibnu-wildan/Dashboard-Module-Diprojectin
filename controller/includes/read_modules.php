<?php

include __DIR__ . '/../../app/db.php';

$query = "SELECT * FROM data_module";
$result = $conn->query($query);

if (!$result) {
    die("Error querying database: " . $conn->error);
    exit();
}

// if ($result) {
//     // Flag untuk mengecek apakah ada data
//     $hasModules = false;

//     // Loop untuk menampilkan setiap modul
//     while ($module = $result->fetch_assoc()) {

//         $moduleName = htmlspecialchars($module['name']);
//         $moduleLevel = htmlspecialchars($module['category']);
//         $moduleUploader = htmlspecialchars($module['uploader']);
//         $moduleDesc = htmlspecialchars($module['desc']);
//         $moduleThumbnailPath = htmlspecialchars($module['thumbnail_path']); // Pastikan ini path yang benar
//         $moduleFilePath = htmlspecialchars($module['module_path']); // Pastikan ini path yang benar

//         // Set flag true jika ada data
//         $hasModules = true;

//     }

//     if (!$hasModules) {
//         echo "<p>No modules found.</p>";
//     } else {
//         echo "<p>Error retrieving data.</p>";
//     }
// }

?>