<?php

include __DIR__ . '/../../app/db.php';
include __DIR__ . '/../../app/url.php';

if (isset($_POST['submit-module'])) {

    $module_name = $_POST['nama-module'];
    $module_level = $_POST['level-module'];
    $module_uploader = $_POST['uploader'];
    $module_description = $_POST['description'];

    // Upload file dan dapatkan path
    $uploadResult = uploadFile();

    if ($uploadResult['status']) {
        $pdfPath = $uploadResult['pdf'];
        $thumbnailPath = $uploadResult['thumbnail'];

        // Query untuk menyimpan ke database
        $query = "INSERT INTO data_module (name, category, uploader, module_path, thumbnail_path, `desc`) 
        VALUES ('$module_name', '$module_level', '$module_uploader', '$pdfPath', '$thumbnailPath', '$module_description')";

        $result = $conn->query($query);

        if ($result) {
            echo "Module uploaded successfully!";
            header("Location: " . BASE_URL);
            exit();
        } else {
            die("Error: " . $conn->error);
        }
    } else {
        echo "Error uploading files.";
    }
    $conn->close();
}

function uploadFile()
{

    $uploadDir = '../../assets/upload/';
    $rootPath = BASE_URL . 'assets/upload/';

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir);
    }

    // Cek dan buat direktori jika belum ada
    if (!is_dir($uploadDir . 'image/')) {
        mkdir($uploadDir . 'image/');
        mkdir($uploadDir . 'image/thumbnail/');
    }

    if (!is_dir($uploadDir . 'doc/')) {
        mkdir($uploadDir . 'doc/');
        mkdir($uploadDir . 'doc/modules/');
    }

    // Ambil informasi file thumbnail
    $thumbnail = $_FILES['thumbnail'];
    $thumbnailName = uniqid() . '-' . basename($thumbnail['name']);


    // Ambil informasi file PDF
    $pdfFile = $_FILES['file'];
    $pdfName = uniqid() . '-' . basename($pdfFile['name']);


    // uplaod path
    $thumbnailupPath = $uploadDir . 'image/thumbnail/' . $thumbnailName;
    $pdfupPath = $uploadDir . 'doc/modules/' . $pdfName;

    // accessible path
    $thumbnailPath = $rootPath . 'image/thumbnail/' . $thumbnailName;
    $pdfPath = $rootPath . 'doc/modules/' . $pdfName;


    // Proses Upload Thumbnail dan PDF
    if (move_uploaded_file($thumbnail['tmp_name'], $thumbnailupPath) && move_uploaded_file($pdfFile['tmp_name'], $pdfupPath)) {
        return ['status' => true, 'thumbnail' => $thumbnailPath, 'pdf' => $pdfPath];
    } else {
        return ['status' => false];
    }
}
