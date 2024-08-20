<?php
include('../includes/config.php');
include('header.php');
include('sidebar.php');
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Teacher</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-graduation-cap"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Students</span>
                        <span class="info-box-number">2000</span>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Teachers</span>
                        <span class="info-box-number">50</span>
                    </div>
                </div>
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book-open"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Courses</span>
                        <span class="info-box-number">100</span>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-question"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">New Inquiries</span>
                        <span class="info-box-number">10</span>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <hr>

        <?php
        $std_id = 1; // Replace this with the actual student ID if it's not defined elsewhere
        $current_month = strtolower(date('F'));
        $current_year = date('Y');
        $current_date = date('d');

        // Fetch attendance data
        $sql = "SELECT * FROM `attendance` WHERE `attendance_month` = '$current_month' AND YEAR(current_session) = $current_year AND std_id = $std_id";
        $query = mysqli_query($db_conn, $sql);

        // Initialize $attendance to an empty array
        $attendance = [];
        if ($query && mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_object($query);
            if ($row && isset($row->attendance_value)) {
                $attendance = unserialize($row->attendance_value);
            }
        }

        if (isset($_POST['sign-in'])) {
            $attendance[$current_date] = [
                'signin_at' => time(),
                'signout_at' => '',
                'date' => $current_date
            ];

            $att_data = serialize($attendance);
            $sql = "UPDATE `attendance` SET `attendance_value` = '$att_data' WHERE `attendance_month` = '$current_month' AND std_id = $std_id";
            mysqli_query($db_conn, $sql) or die('DB error');
        }

        if (isset($_POST['sign-out'])) {
            if (isset($attendance[$current_date])) {
                $attendance[$current_date]['signout_at'] = time();
            } else {
                $attendance[$current_date] = [
                    'signin_at' => '',
                    'signout_at' => time(),
                    'date' => $current_date
                ];
            }

            $att_data = serialize($attendance);
            $sql = "UPDATE `attendance` SET `attendance_value` = '$att_data' WHERE `attendance_month` = '$current_month' AND std_id = $std_id";
            mysqli_query($db_conn, $sql) or die('DB error');
        }
        ?>

        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        Sign in Info
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <?php
                            if (isset($attendance[$current_date])) {
                                if (empty($attendance[$current_date]['signin_at']) || $attendance[$current_date]['signout_at']) {
                                    echo '<button name="sign-in" class="btn btn-primary">Sign in</button>';
                                } else {
                                    echo '<button name="sign-out" class="btn btn-primary">Sign Out</button>';
                                }
                            } else {
                                echo '<button name="sign-in" class="btn btn-primary">Sign in</button>';
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/. container-fluid -->
</section>
<!-- /.content -->
<?php include('footer.php') ?>