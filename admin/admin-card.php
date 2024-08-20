<?php
include('../includes/config.php');

// Fetch data counts from the database (Replace these with your actual table names)
$total_students_query = "SELECT COUNT(*) AS total_students FROM student_records";

$total_students_query = "SELECT COUNT(*) AS total_students FROM students";
$total_teachers_query = "SELECT COUNT(*) AS total_teachers FROM teachers";
$total_classes_query = "SELECT COUNT(*) AS total_classes FROM classes";
$total_subjects_query = "SELECT COUNT(*) AS total_subjects FROM subjects";

$total_students_result = mysqli_query($db_conn, $total_students_query);
$total_teachers_result = mysqli_query($db_conn, $total_teachers_query);
$total_classes_result = mysqli_query($db_conn, $total_classes_query);
$total_subjects_result = mysqli_query($db_conn, $total_subjects_query);

$total_students = mysqli_fetch_assoc($total_students_result)['total_students'];
$total_teachers = mysqli_fetch_assoc($total_teachers_result)['total_teachers'];
$total_classes = mysqli_fetch_assoc($total_classes_result)['total_classes'];
$total_subjects = mysqli_fetch_assoc($total_subjects_result)['total_subjects'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - School Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-title {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .card-text {
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Admin Dashboard</h1>
        <div class="row">
            <!-- Total Students Card -->
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Students</h5>
                        <p class="card-text"><?php echo $total_students; ?></p>
                    </div>
                </div>
            </div>

            <!-- Total Teachers Card -->
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Teachers</h5>
                        <p class="card-text"><?php echo $total_teachers; ?></p>
                    </div>
                </div>
            </div>

            <!-- Total Classes Card -->
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Classes</h5>
                        <p class="card-text"><?php echo $total_classes; ?></p>
                    </div>
                </div>
            </div>

            <!-- Total Subjects Card -->
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Subjects</h5>
                        <p class="card-text"><?php echo $total_subjects; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (for interactivity) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
