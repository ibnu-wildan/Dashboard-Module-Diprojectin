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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <!-- Alert container for Bootstrap alert -->
    <div id="alert-container" class="position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <!-- Alert will be injected here -->
    </div>
    <div class="login-container">
        <h1>Login</h1>
        <form class="row g-3" action="<?php echo BASE_URL; ?>controller/includes/login.php" method="post">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                <label for="email">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" aria-label="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <button type="submit" name="login" class="button-submit">Login</button>
        </form>
        <p>Belum punya akun? <a href="../register/register.php">Daftar</a></p>
    </div>

    <!-- Script to trigger Bootstrap alert -->
    <script>
        // Check if registration is successful
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('status') === 'wrong_password') {
            // Create an alert div
            const alert = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Email atau Password ente salah. Silahkan coba lagi.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>`;
            // Insert the alert into the alert container
            document.getElementById('alert-container').innerHTML = alert;

            // Auto-dismiss the alert after 5 seconds
            setTimeout(() => {
                const alertElem = document.querySelector('.alert');
                if (alertElem) {
                    alertElem.classList.remove('show');
                }
            }, 5000);
        }
    </script>
</body>

</html>