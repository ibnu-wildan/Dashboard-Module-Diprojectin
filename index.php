<?php

include __DIR__ . '/app/url.php';

session_start();

if (isset($_SESSION['user_id'])) {
    echo $_SESSION['user_name'];
    echo '<br>';
    echo $_SESSION['user_id'];
    header('Location: '. BASE_URL . 'views/pages/index.php');
} else if (isset($_SESSION['admin_id'])) {
    echo $_SESSION['admin_id'];
    header('Location: '. BASE_URL . 'views/admin/index.php');
} else {
    header('Location: '. BASE_URL . 'views/pages/login/login.php');
}


?>