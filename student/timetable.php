<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-5">
        <h1 class="m-0 text-dark">Time Table</h1>
      </div>
      <div class="col-sm-5">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Student</a></li>
          <li class="breadcrumb-item active">Time Table</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Timing</th>
              <th>Monday</th>
              <th>Tuesday</th>
              <th>Wednesday</th>
              <th>Thursday</th>
              <th>Friday</th>
              <th>Saturday</th>
              
            </tr>
          </thead>
          <tbody>
            <?php
            // Define the periods and their timings
            $periods = [
              ['from' => '09:00 AM', 'to' => '10:00 AM'],
              ['from' => '10:00 AM', 'to' => '11:00 AM'],
              ['from' => '11:00 AM', 'to' => '12:00 PM'],
              ['from' => '01:00 PM', 'to' => '02:00 PM'],
              ['from' => '02:00 PM', 'to' => '03:00 PM'],
            ];

            // Define the subjects for each day and period
            $timetable = [
              'monday' => ['Math', 'English', 'Physics', 'Chemistry', 'Computer Science'],
              'tuesday' => ['Biology', 'Math', 'English', 'Physics', 'Chemistry'],
              'wednesday' => ['Computer Science', 'Biology', 'Math', 'English', 'Physics'],
              'thursday' => ['Chemistry', 'Computer Science', 'Biology', 'Math', 'English'],
              'friday' => ['Physics', 'Chemistry', 'Computer Science', 'Biology', 'Math'],
              'saturday' => ['English', 'Physics', 'Chemistry', 'Computer Science', 'Biology']
            ];

            // Loop through the periods to create the timetable
            foreach ($periods as $index => $period) {
                ?>
                <tr>
                  <td><?php echo $period['from'] . ' - ' . $period['to']; ?></td>
                  <?php
                  // Loop through each day of the week
                  foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday',] as $day) {
                      ?>
                      <td>
                        <p>
                          <b>Subject: </b><?php echo $timetable[$day][$index]; ?><br>
                          
                        </p>
                      </td>
                      <?php
                  }
                  ?>
                </tr>
                <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<?php include('footer.php') ?>
