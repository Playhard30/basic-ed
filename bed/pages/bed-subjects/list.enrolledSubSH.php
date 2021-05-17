<?php
require '../../includes/conn.php';
session_start();
ob_start();

require '../../includes/bed-session.php';
?>


<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>SFAC | Enrollment Information</title>
    <?php include '../../includes/bed-head.php'; ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link disabled text-light">Enrollment Info.</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link disabled text-light">Basic Education</a>
                </li>
            </ul>
            <?php include '../../includes/bed-navbar.php'; ?>

            <!-- sidebar menu -->
            <?php include '../../includes/bed-sidebar.php'; ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper pt-4 pb-2">

                <!-- TABLES -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card shadow">
                                    <div class="card-header bg-navy p-3">
                                        <h3 class="card-title text-lg">Enrollment Information</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example3" class="table table-hover">
                                            <thead class="bg-gray-light">
                                                <tr>
                                                    <th>Student ID</th>
                                                    <th>Name</th>
                                                    <th>Gender</th>
                                                    <th>Grade Level</th>
                                                    <th>Strand</th>
                                                    <th>School Year</th>
                                                    <th>Semester</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody class="border-bottom">

                                                <?php $get_stud = mysqli_query($conn, "SELECT *, CONCAT(stud.student_fname, ' ', LEFT(stud.student_mname,1), '. ', stud.student_lname) AS fullname 
                                                FROM tbl_schoolyears AS sy
                                                LEFT JOIN tbl_students AS stud ON stud.student_id = sy.student_id
                                                LEFT JOIN tbl_genders AS gen ON gen.gender_id = stud.gender_id
                                                LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id = sy.grade_level_id
                                                LEFT JOIN tbl_strands AS std ON std.strand_id = sy.strand_id 
                                                LEFT JOIN tbl_acadyears AS ay ON ay.ay_id = sy.ay_id
                                                LEFT JOIN tbl_semesters AS sem ON sem.semester_id = sy.semester_id
                                                WHERE sy.student_id = '$stud_id' AND ay.academic_year = '$_SESSION[active_acadyears]' AND sem.semester = '$_SESSION[active_semester]'") or die(mysqli_error($conn));
                                                while ($row = mysqli_fetch_array($get_stud)) { ?>
                                                <tr class="border-bottom">
                                                    <td><?php echo $row['stud_no']; ?></td>
                                                    <td><?php echo $row['fullname']; ?></td>
                                                    <td><?php echo $row['gender_name']; ?></td>
                                                    <td><?php echo $row['grade_level']; ?></td>
                                                    <td><?php echo $row['strand_name']; ?></td>
                                                    <td><?php echo $row['academic_year']; ?></td>
                                                    <td><?php echo $row['semester']; ?></td>
                                                    <td><?php echo $row['date_enrolled']; ?></td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>


                                    <center>
                                        <div class="card-header bg-navy p-3 col-sm-7 rounded-pill mt-3">

                                            <h5 class="ml-auto mr-auto card-text text-lg">Your Subjects List
                                            </h5>

                                        </div>
                                    </center>

                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <form action="userData/ctrl.del.list.offeredSubSH.php" method="POST">
                                            <table id="example4" class="table table-hover">
                                                <thead class="bg-gray-light">
                                                    <tr>
                                                        <th></th>
                                                        <th>Code</th>
                                                        <th>Description</th>
                                                        <th>Unit(s)</th>
                                                        <th>Days</th>
                                                        <th>Time</th>
                                                        <th>Room</th>
                                                        <th>Professor</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="border-bottom">

                                                    <?php $get_enrolled_sub = mysqli_query($conn, "SELECT *, CONCAT(teach.teacher_fname, ' ', LEFT(teach.teacher_mname,1), '. ', teach.teacher_lname) AS fullname FROM tbl_enrolled_subjects AS ensub
                                                LEFT JOIN tbl_schedules AS sched ON sched.schedule_id = ensub.schedule_id
                                                LEFT JOIN tbl_students AS stud ON stud.student_id = ensub.student_id
                                                LEFT JOIN tbl_subjects_senior AS sub ON sub.subject_id = sched.subject_id
                                                LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id = sub.grade_level_id
                                                LEFT JOIN tbl_teachers AS teach ON teach.teacher_id = sched.teacher_id
                                                WHERE stud.student_id = $stud_id AND sched.semester = '$_SESSION[active_semester]' AND sched.acadyear = '$_SESSION[active_acadyears]'") or die(mysqli_error($conn));
                                                    $index = 0;
                                                    while ($row = mysqli_fetch_array($get_enrolled_sub)) { ?>
                                                    <tr>
                                                        <td>
                                                            <div
                                                                class="custom-control custom-checkbox justify-content-center">
                                                                <input type="text" name="enrolled_subID[]"
                                                                    value="<?php echo $row['enrolled_subSH_id'] ?>"
                                                                    hidden>
                                                                <input
                                                                    class="custom-control-input custom-control-input-navy"
                                                                    type="checkbox" name="checked[]"
                                                                    value="<?php echo $index++; ?>"
                                                                    id="customCheckbox4<?php echo $row['enrolled_subSH_id'] ?>">
                                                                <label
                                                                    for="customCheckbox4<?php echo $row['enrolled_subSH_id'] ?>"
                                                                    class="custom-control-label"></label>
                                                            </div>
                                                        </td>
                                                        <td><?php echo $row['subject_code']; ?></td>
                                                        <td><?php echo $row['subject_description']; ?></td>
                                                        <td><?php echo $row['total_units']; ?></td>
                                                        <td><?php echo $row['day']; ?></td>
                                                        <td><?php echo $row['time']; ?></td>
                                                        <td><?php echo $row['room']; ?></td>
                                                        <td><?php echo $row['fullname']; ?></td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>

                                            <div class="row justify-content-end float-right">

                                                <div class="ml-1">
                                                    <a href="list.offeredSubSH.php"
                                                        class="btn btn-default bg-lightblue p-2"><i class="fa fa-plus">
                                                        </i>
                                                        Add Subjects</a>
                                                </div>

                                                <div class="ml-2">
                                                    <button href="" name="submit" class="btn btn-default bg-red p-2"><i
                                                            class="fa fa-trash-alt">
                                                        </i>
                                                        Drop Selected</a>
                                                    </button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->


                <!-- END TABLES -->
            </div>
            <!-- /.content-wrapper -->


            <!-- Footer and script -->
            <?php include '../../includes/bed-footer.php';
            if (isset($_SESSION['empty-check'])) {
                echo "<script>
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000
                });
                $('.swalDefaultError')
                Toast.fire({
                    icon: 'error',
                    title:  'Please select your subjects.'
                });
            });
            </script>";
            } elseif (isset($_SESSION['drop'])) {
                echo "<script>
                $(function() {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000
                    }); 
            $('.swalDefaultSuccess') 
            Toast.fire({
            icon: 'success',
            title: 'Successfully Dropped.'
            })
            }); 
            </script>";
            }
            unset($_SESSION['empty-check']);
            unset($_SESSION['drop']);
            ?>
            <!-- Page specific script -->
            <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
                $('#example3').DataTable({
                    "paging": false,
                    "lengthChange": true,
                    "searching": false,
                    "ordering": false,
                    "info": false,
                    "autoWidth": false,
                    "responsive": true,
                });
                $('#example4').DataTable({
                    "paging": false,
                    "lengthChange": true,
                    "searching": false,
                    "ordering": false,
                    "info": false,
                    "autoWidth": false,
                    "responsive": true,
                    "language": {
                        "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                    }


                });
            });
            </script>


</body>

</html>