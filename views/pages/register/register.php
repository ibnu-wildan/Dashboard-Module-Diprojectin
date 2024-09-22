<?php
include '../../../app/url.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/register.css">
</head>

<body>

    <!-- Alert container for Bootstrap alert -->
    <div id="alert-container" class="position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <!-- Alert will be injected here -->
    </div>

    <div class="login-container">
        <!-- <h1>Register</h1>

        <form action="<?php echo BASE_URL; ?>controller/includes/login.php" method="post">
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" minlength="8" required>
            <button type="submit" name="register">Submit</button>
        </form>
        <p>Sudah punya akun? <a href="../login/login.php">Login</a></p>
    </div> -->

        <form class="row g-3">
            <div class="col-12">
                <label for="inputAddress" class="form-label">Username</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword4">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Address 2</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">State</label>
                <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="inputZip">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        I agree to the terms and conditions
                    </label>
                </div>
            </div>
            <div class="d-grid col-11 gap-2 mx-auto">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-auto">
                        <p>
                            <a href="../login/login.php">Sudah punya akun? Login</a>
                        </p>
                    </div>
                </div>
            </div>

        </form>
    </div>


    <!-- Bootstrap JS (for alert) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- Script to trigger Bootstrap alert -->
    <script>
        // Check if registration is successful
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('status') === 'success') {
            // Create an alert div
            const alert = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Registrasi berhasil! Silahkan login.
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