 <?php
    $active_ay = mysqli_query($conn, "SELECT * FROM tbl_active_acadyears");
    while ($row = mysqli_fetch_array($active_ay)) {
        $ay_id = $row['ay_id'];
    } ?>

 <?php $active_ay = mysqli_query($conn, "SELECT * FROM tbl_active_semesters");
    while ($row = mysqli_fetch_array($active_ay)) {
        $sem_id = $row['semester_id'];
    } ?>


 <!-- Main content -->
 <section class="content">
     <div class="container-fluid ">
         <!-- Small boxes (Stat box) -->
         <div class="row">
             <div class="col-lg-3 col-6">
                 <!-- small box -->
                 <div class="small-box bg-info">
                     <div class="inner">
                         <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Approved'") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                         <h3><?php echo $row['total_stud']; ?></h3>
                         <?php } ?>
                         <p><small>Total No. of</small> Enrolled Students</p>
                     </div>
                     <div class="icon">
                         <i class="ion ion-ios-people"></i>
                     </div>
                     <a href="db.enrolledStudents.php" class="small-box-footer">View Details <i
                             class="fas fa-arrow-circle-right"></i></a>
                 </div>
             </div>
             <!-- ./col -->
             <div class="col-lg-3 col-6">
                 <!-- small box -->
                 <div class="small-box bg-success">
                     <div class="inner">
                         <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Approved' AND stud_type = 'New'") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                         <h3><?php echo $row['total_stud']; ?></h3>
                         <?php } ?>
                         <p><small class="black">Total No. of</small> Enrolled New Students</p>
                     </div>
                     <div class="icon">
                         <i class="ion ion-person-stalker"></i>
                     </div>
                     <a href="db.newStudents.php" class="small-box-footer">View Details <i
                             class="fas fa-arrow-circle-right"></i></a>
                 </div>
             </div>
             <!-- ./col -->
             <div class="col-lg-3 col-6">
                 <!-- small box -->
                 <div class="small-box bg-olive">
                     <div class="inner">
                         <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Approved' AND stud_type = 'Old'") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                         <h3><?php echo $row['total_stud']; ?></h3>
                         <?php } ?>
                         <p><small>Total No. of</small> Enrolled Old Students</p>
                     </div>
                     <div class="icon">
                         <i class="ion ion-ios-people"></i>
                     </div>
                     <a href="db.oldStudents.php" class="small-box-footer">View Details <i
                             class="fas fa-arrow-circle-right"></i></a>
                 </div>
             </div>
             <!-- ./col -->
             <div class="col-lg-3 col-6">
                 <!-- small box -->
                 <div class="small-box" style="background-color:#f9a100">
                     <div class="inner">
                         <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND (remark = 'Pending' OR remark = 'Canceled')") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                         <h3 class="text-gray-dark"><?php echo $row['total_stud']; ?></h3>
                         <?php } ?>

                         <p class="text-gray-dark"><small class="text-gray-dark">Total No. of</small>
                             Pending Enrollees</p>
                     </div>
                     <div class="icon">
                         <i class="ion ion-ios-clock"></i>
                     </div>
                     <a href="db.pendingEnrollees.php" class="small-box-footer text-gray-dark">View Details <i
                             class="fas fa-arrow-circle-right"></i></a>
                 </div>
             </div>

             <div class="col-lg-3 col-6">
                 <!-- small box -->
                 <div class="small-box bg-danger">
                     <div class="inner">
                         <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears
                         WHERE ay_id = '$ay_id' AND remark = 'Dropped'") or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($stud_count)) { ?>
                         <h3 class="text-white"><?php echo $row['total_stud']; ?></h3>
                         <?php } ?>

                         <p><small>Total No. of</small> Dropped Students</p>
                     </div>
                     <div class="icon">
                         <i class="ion ion-minus-circled"></i>
                     </div>
                     <a href="#" class="small-box-footer">View Details <i class="fas fa-arrow-circle-right"></i></a>
                 </div>
             </div>
             <!-- ./col -->
         </div>
         <!-- /.row -->
         <!-- Main row -->

         <!-- /.row (main row) -->
     </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->