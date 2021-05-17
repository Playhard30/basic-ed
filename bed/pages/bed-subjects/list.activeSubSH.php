<?php
require '../../includes/conn.php';
session_start();
ob_start();


require '../../includes/bed-session.php';

if (!empty($_GET['eay'])) {
    $efacadyear = $_GET['eay'];
}


if (isset($_GET['stem'])) {
    $str_name = $_GET['stem'];
} elseif (isset($_GET['abm'])) {
    $str_name = $_GET['abm'];
} elseif (isset($_GET['gas'])) {
    $str_name = $_GET['gas'];
} elseif (isset($_GET['humss'])) {
    $str_name = $_GET['humss'];
} elseif (isset($_GET['tvl'])) {
    $str_name = $_GET['tvl'];
}


?>



<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>SFAC | Subjects List</title>
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
                    <a href="#" class="nav-link disabled text-light">Subjects List</a>
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

                <!-- tables -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card shadow">
                                    <div class="card-header bg-navy p-3">
                                        <h3 class="card-title">Senior High Subjects List -<?php if (isset($_POST['stem'])) {
                                                                                                echo ' STEM';
                                                                                            } elseif (isset($_POST['abm'])) {
                                                                                                echo ' ABM';
                                                                                            } elseif (isset($_POST['gas'])) {
                                                                                                echo ' GAS';
                                                                                            } elseif (isset($_POST['humss'])) {
                                                                                                echo ' HUMSS';
                                                                                            } elseif (isset($_POST['tvl'])) {
                                                                                                echo ' TVL-HE';
                                                                                            } else {
                                                                                                echo ' STEM';
                                                                                            } ?></h3>

                                    </div>

                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <form action="list.activeSubSH.php" method="GET">

                                            <div class="row justify-content-center">
                                                <button class="btn btn-app bg-gray-light" value="STEM" name="stem">
                                                    <i class="fas fa-list-alt"></i> STEM
                                                </button>

                                                <button class="btn btn-app bg-gray-light" value="ABM" name="abm">
                                                    <i class="fas fa-list-alt"></i> ABM
                                                </button>

                                                <button class="btn btn-app bg-gray-light" value="GAS" name="gas">
                                                    <i class="fas fa-list-alt"></i> GAS
                                                </button>

                                                <button class="btn btn-app bg-gray-light" value="HUMSS" name="humss">
                                                    <i class="fas fa-list-alt"></i> HUMSS
                                                </button>

                                                <button class="btn btn-app bg-gray-light" value="TVL - HE" name="tvl">
                                                    <i class="fas fa-list-alt"></i> TVL- HE
                                                </button>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class=" input-group col-md-4 mb-2">

                                                    <select class="form-control select2 select2-navy custom-select"
                                                        data-dropdown-css-class="select2-navy"
                                                        data-placeholder="Select Effective Academic Year" name="eay">
                                                        <option value="" disabled>Select Effective Academic
                                                            Year
                                                        </option>
                                                        <?php $get_eay = mysqli_query($conn, "SELECT * FROM tbl_efacadyears WHERE efacadyear = '$efacadyear'");
                                                        while ($row = mysqli_fetch_array($get_eay)) {
                                                        ?>
                                                        <option value="<?php echo $row['efacadyear'] ?>">
                                                            Effective
                                                            Academic Year <?php echo $row['efacadyear'];
                                                                            } ?></option>
                                                        <?php $get_eay2 = mysqli_query($conn, "SELECT * FROM tbl_efacadyears WHERE efacadyear NOT IN ('$efacadyear')");
                                                            while ($row2 = mysqli_fetch_array($get_eay2)) {
                                                            ?>
                                                        <option value="<?php echo $row2['efacadyear'] ?>">
                                                            Effective
                                                            Academic Year <?php echo $row2['efacadyear'];
                                                                                } ?></option>

                                                    </select>

                                                </div>
                                            </div>

                                        </form>

                                        <hr class="bg-navy">
                                        <table id="example2" class="table table-hover">
                                            <thead class="bg-gray-light">
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Description</th>
                                                    <th>Units</th>
                                                    <th>Pre-Requisites</th>
                                                    <th>Grade Level</th>
                                                    <th>Semester</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($efacadyear)) {

                                                    $act_sem = $_SESSION['active_semester'];
                                                    $get_subjects = mysqli_query($conn, "SELECT * FROM tbl_subjects_senior
                                                LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_subjects_senior.grade_level_id
                                                LEFT JOIN tbl_semesters ON tbl_semesters.semester_id = tbl_subjects_senior.semester_id
                                                LEFT JOIN tbl_strands ON tbl_strands.strand_id = tbl_subjects_senior.strand_id
                                                LEFT JOIN tbl_efacadyears ON tbl_efacadyears.efacadyear_id = tbl_subjects_senior.efacadyear_id
                                                WHERE tbl_strands.strand_name IN ('$str_name') AND tbl_efacadyears.efacadyear IN ('$efacadyear') AND tbl_semesters.semester IN ('$act_sem') ORDER BY subject_id DESC") or die(mysqli_error($conn));

                                                ?>


                                                <tr>
                                                    <?php while ($row = mysqli_fetch_array($get_subjects)) {
                                                            $id = $row['subject_id'];
                                                        ?>
                                                    <td><?php echo $row['subject_code']; ?></td>
                                                    <td><?php echo $row['subject_description']; ?></td>
                                                    <td><?php echo $row['total_units']; ?></td>
                                                    <td><?php echo $row['pre_requisites']; ?></td>
                                                    <td><?php echo $row['grade_level']; ?></td>
                                                    <td><?php echo $row['semester']; ?></td>
                                                    <td><a href="edit.subjectSH.php<?php echo '?sub_id=' . $id; ?>"
                                                            type="button" class="btn btn-success text-sm p-2 mb-md-2"><i
                                                                class="fa fa-plus mr-1"></i>
                                                            Add Schedule
                                                        </a>

                                                    </td>
                                                </tr><?php }
                                                    } ?>

                                            </tbody>
                                        </table>
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

            </div>
            <!-- /.content-wrapper -->


            <!-- Footer and script -->
            <?php include '../../includes/bed-footer.php';
            if (isset($_SESSION['success-del'])) {
                echo "<script>
                $(function() {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    }); 
            $('.swalDefaultSuccess') 
            Toast.fire({
            icon: 'success',
            title: 'Successfully Deleted.'
            })
            }); 
            </script>";
            }
            unset($_SESSION['success-del']);
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
                    "language": {
                        "emptyTable": "No data available in table.<br> Please select strand and E.A.Y",
                    }


                });
            });
            </script>


</body>

</html>