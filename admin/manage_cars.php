<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: admin_login.php');
    exit();
}

// Handle adding, updating, and deleting cars (session-based)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $new_car = [
            'id' => count($_SESSION['cars']) + 1,
            'car_name' => $_POST['car_name'],
            'manufacturing_year' => $_POST['manufacturing_year'],
            'price' => $_POST['price']
        ];
        $_SESSION['cars'][] = $new_car;
        $success_message = "Car added successfully!";
    }

    if (isset($_POST['update'])) {
        foreach ($_SESSION['cars'] as &$car) {
            if ($car['id'] == $_POST['id']) {
                $car['car_name'] = $_POST['car_name'];
                $car['manufacturing_year'] = $_POST['manufacturing_year'];
                $car['price'] = $_POST['price'];
                $success_message = "Car updated successfully!";
                break;
            }
        }
    }

    if (isset($_POST['delete'])) {
        $_SESSION['cars'] = array_filter($_SESSION['cars'], function ($car) {
            return $car['id'] != $_POST['id'];
        });

        // Reindex the array and reassign IDs to make them sequential
        $_SESSION['cars'] = array_values($_SESSION['cars']);
        foreach ($_SESSION['cars'] as $index => &$car) {
            $car['id'] = $index + 1;
        }

        $success_message = "Car deleted successfully!";
    }
}

$cars = isset($_SESSION['cars']) ? $_SESSION['cars'] : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Cars</title>
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

        .car-management-container {
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 30px;
        }

        @media (max-width: 767px) {
            .car-management-container {
                padding: 15px;
                margin-top: 20px;
            }

            .form-group label {
                font-size: 14px;
            }

            .form-control {
                font-size: 14px;
            }

            .btn {
                font-size: 14px;
            }

            table.table thead th,
            table.table tbody td {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container car-management-container">
        <h1 class="text-center">Manage Cars</h1>
        <form method="POST">
            <h3 class="mt-4">Add New Car</h3>
            <div class="form-group">
                <label for="car_name">Car Name:</label>
                <input type="text" class="form-control" id="car_name" name="car_name" required>
            </div>
            <div class="form-group">
                <label for="manufacturing_year">Manufacturing Year:</label>
                <input type="number" class="form-control" id="manufacturing_year" name="manufacturing_year" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
            </div>
            <button type="submit" name="add" class="btn btn-primary mt-3">Add Car</button>
        </form>
        
        <h3 class="mt-5">Existing Cars</h3>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Car Name</th>
                        <th>Manufacturing Year</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cars as $car) { ?>
                        <tr>
                            <form method="POST">
                                <td><?php echo $car['id']; ?></td>
                                <td><input type="text" name="car_name" value="<?php echo $car['car_name']; ?>" required class="form-control"></td>
                                <td><input type="number" name="manufacturing_year" value="<?php echo $car['manufacturing_year']; ?>" required class="form-control"></td>
                                <td><input type="number" name="price" step="0.01" value="<?php echo $car['price']; ?>" required class="form-control"></td>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo $car['id']; ?>">
                                    <button type="submit" name="update" class="btn btn-success btn-sm mr-2">Update</button>
                                    <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </form>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php if (isset($success_message)) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: '<?php echo $success_message; ?>',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    <?php } ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
