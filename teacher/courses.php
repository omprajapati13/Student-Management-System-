<?php include('../includes/config.php') ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Courses</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Teacher</a></li>
          <li class="breadcrumb-item active">Courses</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<?php $arr = ["Web development", "Android app development", "C"] ?>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <?php for($i=0; $i<sizeof($arr); $i++){ ?>
    <div class="card">
      <div class="card-body">
        <!-- Your content here -->
        <?php echo $arr[$i] ?>
      </div>
    </div>
    <?php } ?>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<?php include('footer.php'); ?>
