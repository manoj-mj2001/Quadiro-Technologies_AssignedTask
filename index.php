<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page - Quadiro Technologies</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body{
            font-family: "Poppins", sans-serif;
            background: linear-gradient(to right, #764BA2, #667EEA);
        }
        .navbar {
            padding: 15px;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar-nav .nav-item .btn {
            padding: 10px 20px;
            font-size: 1rem;
        }

        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1.2rem;
            }

            .navbar-nav .nav-item .btn {
                width: 50%;
                margin: 10px;
                margin-bottom: 20px;
                font-size: 0.9rem;
                padding: 10px 20px;
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
                        <a id="adminLoginBtn" class="btn mr-4 btn-outline-light" href="./admin/admin_login.php">Admin Login</a>
                    </li>
                    <li class="nav-item">
                        <a id="userLoginBtn" class="btn btn-outline-light" href="./user/user_login.php">User Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<h1 class="text-center mt-5 text-white">This is my Assignment Task given by Quadiro Tech</h1te>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('adminLoginBtn').addEventListener('click', function(event) {
            event.preventDefault(); 
            Swal.fire({
                icon: 'info',
                title: 'Redirecting to Admin Login',
                text: 'You will be redirected in 2 seconds.',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = this.href;
            });
        });

        document.getElementById('userLoginBtn').addEventListener('click', function(event) {
            event.preventDefault(); 
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
