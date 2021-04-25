<?php
require '../../includes/conn.php';
session_start();
ob_start();


require '../../includes/bed-session.php';

$sub_id = $_GET['sub'];
$_SESSION['sub_id'] = $sub_id;

?>


<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>SFAC | Update Subjects</title>
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
                    <a href="#" class="nav-link disabled text-light">Edit Subject</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link disabled text-light">Basic Education</a>
                </li>
            </ul>
            <?php include '../../includes/bed-navbar.php'; ?>

            <!-- sidebar menu -->
            <?php include '../../includes/bed-sidebar.php'; ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper pt-4">


                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid pl-5 pr-5 pb-3">
                        <div class="card card-purple shadow-lg">
                            <div class="card-header">
                                <h3 class="card-title">Update Subjects for Primary to Junior High School
                                    Deparment</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <?php $get_sub = mysqli_query($conn, "SELECT * FROM tbl_subjects LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_subjects.grade_level_id WHERE subject_id = '$sub_id'");
                            while ($row = mysqli_fetch_array($get_sub)) {
                            ?>
                            <form action="userData/ctrl.editSubPJH.php" enctype="multipart/form-data" method="POST">
                                <div class="card-body">

                                    <div class="row mb-4 mt-4 justify-content-center">
                                        <div class="input-group col-sm-4 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-sm"><b>Code</b></span>
                                            </div>
                                            <input type="text" class="form-control" name="subject_code"
                                                placeholder="Enter Subject Code"
                                                value="<?php echo $row['subject_code']; ?>" required>
                                        </div>


                                        <div class="input-group col-sm-6 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-sm"><b>Description</b></span>
                                            </div>
                                            <input type="text" class="form-control" name="subject_description"
                                                placeholder="Enter Subject Description"
                                                value="<?php echo $row['subject_description']; ?>" required>
                                        </div>
                                    </div>

                                    <div class="row mb-4 mt-4 justify-content-center">
                                        <div class="input-group col-sm-5 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-sm"><b>Grade Level</b></span>
                                            </div>
                                            <select class="form-control select2 select2-purple custom-select"
                                                data-dropdown-css-class="select2-purple"
                                                data-placeholder="Select Grade Level" name="grade_level">
                                                <option value="" disabled>Select Grade Level</option>
                                                <option value="<?php echo $row['grade_level_id'] ?>">
                                                    <?php echo $row['grade_level'] ?></option>
                                                <?php $get_grdlvl = mysqli_query($conn, "SELECT * FROM tbl_grade_levels WHERE grade_level_id NOT IN (" . $row['grade_level_id'] . ") LIMIT 12");
                                                    while ($row2 = mysqli_fetch_array($get_grdlvl)) {
                                                    ?>
                                                <option value="<?php echo $row2['grade_level_id']; ?>">
                                                    <?php echo $row2['grade_level'];
                                                    } ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer row">
                                    <div class="col">
                                        <button type="submit" name="submit" class="btn bg-purple"><i
                                                class="fa fa-check"></i>
                                            Update</button>
                                    </div>
                                    <div class="justify-content-end mr-1">
                                        <a href="list.subjectPJH.php" type="submit" name="submit" class="btn bg-gray"><i
                                                class="fa fa-arrow-circle-left "></i>
                                            Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->


            <!-- Footer and script -->
            <?php include '../../includes/bed-footer.php';  ?>



</body>

</html>