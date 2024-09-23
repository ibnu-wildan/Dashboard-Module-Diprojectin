<?php

include __DIR__ . '/../../app/url.php';
include __DIR__ . '/../../app/db.php';

session_start();

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


    // cek username dan password
    $query = "SELECT username, email, password FROM data_user WHERE email = '$email'";

    $result = $conn->query($query);
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['email'];
        $_SESSION['user_name'] = $user['username'];

        header("Location: " . BASE_URL . "index.php");

    } else if ($email == 'admin@diprojectin.com' && $password == 'admin#123') {

        $_SESSION['admin_id'] = 'admin@diprojectin.com';
        $_SESSION['admin_name'] = 'admin';

        header("Location: " . BASE_URL . "index.php");
    } else {
        header("Location: " . BASE_URL. "views/pages/login/login.php?status=wrong_password");
        die();
    }
} elseif (isset($_POST['register'])) {

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    //hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //check if user already registered
    $query = "SELECT email FROM data_user WHERE email = '$email' OR username = '$username'";
    $resultExist = $conn->query($query);
    $userExist = $resultExist->fetch_assoc();

    if ($userExist) {
        header("Location: " . BASE_URL . "views/pages/register/register.php?status=exist");
        die();
    } else {
        //insert into database
        $query = "INSERT INTO data_user (email, username, password, address) VALUES ('$email', '$username', '$hashed_password', '$address')";
        $result = $conn->query($query);

        if (mysqli_affected_rows($conn) > 0) {
            header("Location: " . BASE_URL . "views/pages/register/register.php?status=success");
            die();
        } else {
            echo "Gagal";
            die();
        }
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

