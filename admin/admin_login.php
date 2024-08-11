<?php
session_start();
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
        $_SESSION['admin_logged_in'] = true;
        $success = true;
    } else {
        $error = "Invalid credentials!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login - Quadiro Technologies</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    <style>
        body {
            width: 100%;
            height: 100%;
            font-family: "Poppins", sans-serif;
            background: linear-gradient(to right, #764BA2, #667EEA);
        }
        .login-container {
            max-width: 400px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            margin-top: 100px;
        }

        @media (max-width: 576px) {
            .login-container {
                max-width: 100%;
                margin-top: 80px;
                padding: 15px;
                border-radius: 0;
            }

            h3 {
                font-size: 1.4rem;
            }

            h5 {
                font-size: 1.1rem;
            }

            .form-group label {
                font-size: 1rem;
            }

            .form-control {
                font-size: 1rem;
                padding: 10px;
            }

            .btn-primary {
                font-size: 1.1rem;
                padding: 10px;
            }
        }
        
        @media (min-width: 577px) and (max-width: 768px) {
            .login-container {
                max-width: 350px;
                padding: 20px;
                margin-top: 90px;
            }

            h3 {
                font-size: 1.6rem;
            }

            h5 {
                font-size: 1.2rem;
            }

            .form-group label {
                font-size: 1.1rem;
            }

            .form-control {
                font-size: 1.1rem;
                padding: 12px;
            }

            .btn-primary {
                font-size: 1.2rem;
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Quadiro Tech</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a id="userLoginBtn" class="btn btn-outline-light" href="../user/user_login.php">User Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container d-flex justify-content-center">
        <div class="login-container">
            <h3 class="text-center">Assignment for Quadiro Technologies</h3>
            <h5 class="mt-3 text-center">Admin Login</h5>
            <form method="POST">
                <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
                <div class="form-group mt-5">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>

    <?php if ($success): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Login Successful!',
                text: 'You will be redirected to the dashboard.',
                showConfirmButton: false,
                timer: 2000
            }).then(() => {
                window.location.href = 'admin_dashboard.php';
            });
        </script>
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('userLoginBtn').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior
            Swal.fire({
                icon: 'info',
                title: 'Redirecting to User Login',
                text: 'You will be redirected in 2 seconds.',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = this.href;
            });
        });
    </script>
</body>
</html>
