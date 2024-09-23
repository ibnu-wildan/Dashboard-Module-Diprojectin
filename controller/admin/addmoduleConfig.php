<?php

include __DIR__ . '/../../app/db.php';
include __DIR__ . '/../../app/url.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari FormData
    $module_name = $_POST['nama-module'];
    $module_category = $_POST['category-module'];
    $module_level = $_POST['level-module'];
    $module_uploader = $_POST['uploader'];
    $module_description = $_POST['description'];

    // Mendapatkan data selectedUser dari POST
    $reciever_id_json = $_POST['selectedUser'];

    // Mengubah JSON menjadi array
    $reciever_id = json_decode($reciever_id_json, true); // true untuk array asosiatif

    if (is_array($reciever_id)) {
        // Jika valid, encode kembali untuk disimpan di database
        //$reciever_id_json = json_encode($reciever_id);
        $reciever_id_string = implode(',', $reciever_id);

        // Upload file dan dapatkan path
        $uploadResult = uploadFile();

        if ($uploadResult['status']) {
            $pdfPath = $uploadResult['pdf'];
            $thumbnailPath = $uploadResult['thumbnail'];

            // Query untuk menyimpan ke database
            $query = "INSERT INTO data_module (name, level, category, uploader, module_path, thumbnail_path, `desc`, reciever_id) 
            VALUES ('$module_name', '$module_level', '$module_category', '$module_uploader', '$pdfPath', '$thumbnailPath', '$module_description', '$reciever_id_string')";

            $result = $conn->query($query);

            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'Module uploaded successfully!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $conn->error]);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error uploading files.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid receiver selection.']);
    }
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
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
