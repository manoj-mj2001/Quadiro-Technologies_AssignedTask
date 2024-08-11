<?php
session_start();

if (!isset($_SESSION['user_logged_in'])) {
    header('Location: user_login.php');
    exit();
}

if (!isset($_SESSION['cars'])) {
    $_SESSION['cars'] = [];
}

$cars = $_SESSION['cars'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Cars - Quadiro Technologies</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

        body{
            font-family: "Poppins", sans-serif;
            background: linear-gradient(to right, #764BA2, #667EEA);
        }

        .car-list-container {
            background-color: #f8f9fa;
            border-radius: 10px; 
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); 
            padding: 30px;
            margin-top: 50px;
        }

        .list-group-item {
            border: none; 
            border-bottom: 1px solid #dee2e6;
            padding: 20px;
            margin-bottom: 10px; 
        }

        .list-group-item:last-child {
            border-bottom: none; 
        }

        .list-group-item h2 {
            font-size: 1.25rem; 
            margin-bottom: 10px;
        }

        .list-group-item p {
            font-size: 1rem; 
            margin-bottom: 5px;
        }

        @media (max-width: 576px) {
            .car-list-container {
                padding: 20px;
                margin-top: 20px; 
            }

            .list-group-item h2 {
                font-size: 1.1rem; 
            }

            .list-group-item p {
                font-size: 0.9rem; 
            }
        }
    </style>
</head>
<body>
    <div class="container car-list-container">
        <h1 class="text-center">Available Cars</h1>
        <ul class="list-group">
            <?php if (empty($cars)) { ?>
                <li class="list-group-item">
                    <h2>No Cars Available</h2>
                </li>
            <?php } else { ?>
                <?php foreach ($cars as $car) { ?>
                    <li class="list-group-item">
                        <h2><?php echo htmlspecialchars($car['car_name']); ?></h2>
                        <p>Year: <?php echo htmlspecialchars($car['manufacturing_year']); ?></p>
                        <p>Price: Rs. <?php echo htmlspecialchars(number_format($car['price'], 2)); ?></p>
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
