<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

if (!isset($_SESSION['cars'])) {
    $_SESSION['cars'] = [];
}

$total_cars = count($_SESSION['cars']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Quadiro Technologies</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: "Poppins", sans-serif;
            background: linear-gradient(to right, #764BA2, #667EEA);
        }
        .dashboard-container {
            background-color: #f8f9fa; 
            border: 1px solid #dee2e6; 
            border-radius: 10px; 
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); 
            padding: 30px; 
        }

        .dashboard-header {
            border-bottom: 1px solid #dee2e6; 
            padding-bottom: 10px; 
            margin-bottom: 20px; 
        }

        @media (max-width: 576px) {
            .dashboard-container {
                padding: 20px; 
            }

            .btn {
                width: 100%; 
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5 dashboard-container">
        <div class="dashboard-header">
            <h1 class="text-center">Admin Dashboard</h1>
        </div>
        <h5 class="text-center mt-3">Total Cars: <?php echo $total_cars; ?></h5>
        <div class="text-center mt-4">
            <a href="manage_cars.php" class="btn btn-primary">Manage Cars</a>
        </div>
    </div>
</body>
</html>
