<?php
include __DIR__ . '../../../../app/url.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="<?php echo BASE_URL; ?>assets/img/diprojectin/favicon.ico" type="image/x-icon" />
    <!-- <link rel="stylesheet" type="text/css" href="../public/css/login.css"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/login.css" />
</head>

<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="<?php echo BASE_URL; ?>controller/includes/login.php" method="post">
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="submit" name="login" class="button-submit">Login</button>
        </form>
        <p>Belum punya akun? <a href="../register/register.php">Daftar</a></p>
    </div>
</body>

</html>