<?php

include __DIR__ . '/../../app/url.php';
include __DIR__ . '/../../app/db.php';

session_start();

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // cek username dan password
    $query = "SELECT * FROM data_user WHERE username = '$username'";

    $result = $conn->query($query);
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['email'];
        $_SESSION['user_name'] = $user['username'];

        header("Location: " . BASE_URL . "index.php");

    } else if ($username == 'admin' && $password == 'admin#123') {

        $_SESSION['admin_id'] = 'admin@diprojectin.com';
        $_SESSION['admin_name'] = 'admin';

        header("Location: " . BASE_URL . "index.php");
    }
} elseif (isset($_POST['register'])) {

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    //hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //insert into database
    $query = "INSERT INTO data_user (email, username, password) VALUES ('$email', '$username', '$hashed_password')";
    $result = $conn->query($query);

    if (mysqli_affected_rows($conn) > 0) {
        header("Location: " . BASE_URL . "views/pages/register/register.php?status=success");
    } else {
        echo "Gagal";
    }
}

if (isset($_POST['logout'])) {

    session_start();
    session_unset();
    session_destroy();
    header("Location: " . BASE_URL. "index.php");
    die();
}
// } elseif (isset($_GET['action'])) {

//     if ($_GET['action'] == 'logout') {
//         session_start();
//         session_unset();
//         session_destroy();
//         header("Location: " . BASE_URL . "views/public/login/login.php");
//     }

// }

