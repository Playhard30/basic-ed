<?php
require '../../includes/conn.php';
session_start();
ob_start();

require '../../includes/bed-session.php';

if ($_SESSION['role'] == 'Registrar') {

    $stud_id = $_GET['stud_id'];
    $_SESSION['student_id'] = $stud_id;
}


?>


<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>SFAC | Personal Info </title>
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
                    <a href="#" class="nav-link disabled text-light">Personal Info</a>
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
                            <div class="card-header text-center">
                                <h3 class="text-lg" style="margin-bottom: unset;">
                                    PERSONAL DATA
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <?php
                            $get_userInfo = mysqli_query($conn, "SELECT * FROM tbl_students
                            LEFT JOIN tbl_genders ON tbl_students.gender_id = tbl_genders.gender_id
                             WHERE student_id = '$stud_id'");

                            while ($row = mysqli_fetch_array($get_userInfo)) {
                            ?>
                            <form action="userData/ctrl.editinfoStud.php" enctype="multipart/form-data" method="POST">

                                <!-- PERSONAL DATA -->

                                <div class="card-body">

                                    <div class="form-group row mb-3 mt-3">
                                        <div class="input-group col-md-6 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-sm"><b>
                                                        Student ID</b>
                                                </span>
                                            </div>
                                            <?php if ($_SESSION['role'] == 'Registrar') {
                                                    echo ' <input type="text" class="form-control"
                                                value="' . $row['stud_no'] . '" placeholder="Student ID" name="stud_no"
                                           >
                                        </div>

                                        <div class="input-group col-md-6 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-sm"><b>
                                                        LRN</b></span>
                                            </div>
                                            <input type="text" class="form-control"
                                                placeholder="Learner Reference Number" name="lrn"
                                                value="' . $row['lrn'] . '">
                                        </div>';
                                                } elseif ($_SESSION['role'] == 'Student') {
                                                    echo '  <input type="text" class="form-control"
                                                    value="' . $row['stud_no'] . '" placeholder="Student ID" name="stud_no"
                                                    disabled>
                                            </div>
    
                                            <div class="input-group col-md-6 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            LRN</b></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    placeholder="Learner Reference Number"
                                                    value="' . $row['lrn'] . '" disabled name="lrn">
                                            </div>';
                                                } ?>

                                        </div>


                                        <div class="form-group row mb-3">

                                            <div class="input-group col-md-4 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Lastname</b></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Lastname"
                                                    value="<?php echo $row['student_lname']; ?>" name="lastname">
                                            </div>

                                            <div class="input-group col-md-4 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Firstname</b></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Firstname"
                                                    value="<?php echo $row['student_fname']; ?>" name="firstname">
                                            </div>

                                            <div class="input-group col-md-4 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Middlename</b></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Middlename"
                                                    value="<?php echo $row['student_mname']; ?>" name="midname">
                                            </div>

                                        </div>

                                        <div class="form-group row mb-3">

                                            <div class="input-group col-md-12 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Address</b></span>
                                                </div>
                                                <input type="text" class="form-control" name="address"
                                                    value="<?php echo $row['address']; ?>"
                                                    placeholder="Unit number, house number, street name, barangay, city, province">
                                            </div>


                                        </div>

                                        <div class="form-group row mb-3">

                                            <div class="input-group col-md-4 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Date of Birth</b></span>
                                                </div>
                                                <input type="text" class="form-control" name="date_birth"
                                                    placeholder="dd/mm/yyyy" value="<?php echo $row['date_birth']; ?>">
                                            </div>

                                            <div class="input-group col-md-4 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Place of Birth</b></span>
                                                </div>
                                                <input type="text" class="form-control" name="place_birth"
                                                    value="<?php echo $row['place_birth']; ?>"
                                                    placeholder="city, province">
                                            </div>

                                            <div class="input-group col-md-4 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Age</b></span>
                                                </div>
                                                <input type="text" class="form-control" name="age"
                                                    value="<?php echo $row['age']; ?>" placeholder="00 years old">
                                            </div>

                                        </div>

                                        <div class="form-group row mb-3">

                                            <div class="input-group col-md-4 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Gender</b></span>
                                                </div>
                                                <select class="form-control custom-select select2 select2-purple"
                                                    data-dropdown-css-class="select2-purple"
                                                    data-placeholder="Select Gender" name="gender">
                                                    <?php if (empty($row['gender_id'])) {
                                                            echo '<option value="" disabled selected>Select Gender</option>';
                                                            $get_gender = mysqli_query($conn, "SELECT * FROM tbl_genders");
                                                            while ($row2 = mysqli_fetch_array($get_gender)) {
                                                                echo '
                                                <option value="' . $row2['gender_id'] .
                                                                    '">' . $row2['gender_name'] . '</option>';
                                                            }
                                                        } else {
                                                            echo '<option disabled>Select Gender</option>
                                                        <option value="' . $row['gender_id'] .
                                                                '" selected >' . $row['gender_name'] . '</option>';
                                                            $get_gender = mysqli_query($conn, "SELECT * FROM tbl_genders WHERE gender_id NOT IN (" . $row['gender_id'] . ")");
                                                            while ($row3 = mysqli_fetch_array($get_gender)) {
                                                                echo '<option value="' . $row3['gender_id'] . '">'
                                                                    . $row3['gender_name'] . '</option>';
                                                            }
                                                        } ?>
                                                </select>

                                            </div>

                                            <div class="input-group col-md-4 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Nationality</b></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Nationality"
                                                    value="<?php echo $row['nationality']; ?>" name="nationality">
                                            </div>

                                            <div class="input-group col-md-4 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Religion</b></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Religion"
                                                    value="<?php echo $row['religion']; ?>" name="religion">
                                            </div>

                                        </div>

                                        <div class="form-group row mb-3">

                                            <div class="input-group col-md-4 mb-2 ml-auto mr-auto">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Landline No.</b></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Landline Number"
                                                    value="<?php echo $row['landline']; ?>" name="landline">
                                            </div>

                                            <div class="input-group col-md-4 mb-2 ml-auto mr-auto">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Cell Phone No.</b></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Cellphone Number"
                                                    value="<?php echo $row['cellphone']; ?>" name="cellphone">
                                            </div>

                                        </div>

                                        <div class="form-group row mb-3">

                                            <div class="input-group col-md-12 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Email Address</b></span>
                                                </div>
                                                <input type="email" class="form-control" placeholder="example@gmail.com"
                                                    value="<?php echo $row['email']; ?>" name="email">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FAMILYBACKGROUND -->

                                    <div class="bg-purple">
                                        <div class="card-header text-center">
                                            <h3 class="text-lg" style="margin-bottom: unset;">
                                                FAMILY BACKGROUND
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="card-body">

                                        <div class="form-group row mb-3 mt-3">

                                            <div class="input-group col-md-6 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Name of Father</b></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Fullname"
                                                    value="<?php echo $row['fname']; ?>" name="fname">
                                            </div>

                                            <div class="input-group col-md-6 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            F. Occupation</b></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Father Occupation"
                                                    value="<?php echo $row['focc']; ?>" name="focc">
                                            </div>

                                        </div>

                                        <div class="form-group row mb-3">

                                            <div class="input-group col-md-12 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Contact No.</b></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Contact Number"
                                                    value="<?php echo $row['fcontact']; ?>" name="fcontact">
                                            </div>

                                        </div>

                                        <div class="form-group row mb-3">

                                            <div class="input-group col-md-6 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Name of Mother</b></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Fullname"
                                                    value="<?php echo $row['mname']; ?>" name="mname">
                                            </div>

                                            <div class="input-group col-md-6 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            M. Occupation</b></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Father Occupation"
                                                    value="<?php echo $row['mocc']; ?>" name="mocc">
                                            </div>

                                        </div>

                                        <div class="form-group row mb-3">

                                            <div class="input-group col-md-12 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Contact No.</b></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Contact Number"
                                                    value="<?php echo $row['mcontact']; ?>" name="mcontact">
                                            </div>

                                        </div>

                                        <div class="form-group row mb-3">


                                            <div class="input-group col-md-4 mb-2 ml-auto mr-auto">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Monthly Income</b></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Family Income"
                                                    value="<?php echo $row['month_inc']; ?>" name="month_inc">
                                            </div>

                                            <div class="input-group col-md-4 mb-2 ml-auto mr-auto">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            No. of Siblings</b></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Number of Siblings"
                                                    value="<?php echo $row['no_siblings']; ?>" name="no_sib">
                                            </div>

                                        </div>


                                        <div class="form-group row mb-3">

                                            <div class="input-group col-md-12 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Guardian N.</b></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Guardian Name"
                                                    value="<?php echo $row['guardname']; ?>" name="guardname">
                                            </div>

                                        </div>

                                        <div class="form-group row mb-3">


                                            <div class="input-group col-md-12 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Address</b></span>
                                                </div>
                                                <input type="text" class="form-control" name="gaddress"
                                                    value="<?php echo $row['gaddress']; ?>"
                                                    placeholder="Unit number, house number, street name, barangay, city, province">
                                            </div>

                                        </div>

                                        <div class="form-group row mb-3">


                                            <div class="input-group col-md-12 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Contact No.</b></span>
                                                </div>
                                                <input type="text" class="form-control" name="gcontact"
                                                    value="<?php echo $row['gcontact']; ?>"
                                                    placeholder="Contact Number">
                                            </div>

                                        </div>


                                    </div>


                                    <!-- EDUCATIONAL BACKGROUND -->

                                    <div class="bg-purple">
                                        <div class="card-header text-center">
                                            <h3 class="text-lg" style="margin-bottom: unset;">
                                                EDUCATIONAL BACKGROUND
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="card-body">

                                        <div class="form-group row mb-3 mt-3">

                                            <div class="input-group col-md-12 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            SCH. Last Attended</b></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    placeholder="School Last Attended" name="last_attend"
                                                    value="<?php echo $row['last_sch']; ?>">
                                            </div>

                                        </div>

                                        <div class="form-group row mb-3">



                                            <div class="input-group col-md-6 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Previous Grade Level</b></span>
                                                </div>
                                                <select class="form-control custom-select select2 select2-purple"
                                                    data-dropdown-css-class="select2-purple"
                                                    data-placeholder="Select Grade Level" name="prev_grade_level">
                                                    <?php if (empty($row['prev_grade_level'])) {
                                                            echo '<option value="" disabled selected>Select Grade Level</option>';
                                                            $get_glevel = mysqli_query($conn, "SELECT * FROM tbl_grade_levels");
                                                            while ($row2 = mysqli_fetch_array($get_glevel)) {
                                                                echo '<option value="' . $row2['grade_level'] . '">'
                                                                    . $row2['grade_level'] . '</option>';
                                                            }
                                                        } else {
                                                            echo '<option disabled>Select Grade Level</option>
                                                        <option value="' . $row['prev_grade_level'] . '" selected>'
                                                                . $row['prev_grade_level'] . '</option>';
                                                            $get_glevel = mysqli_query($conn, "SELECT * FROM tbl_grade_levels WHERE grade_level NOT IN ('" . $row['prev_grade_level'] . "') ");
                                                            while ($row3 = mysqli_fetch_array($get_glevel)) {
                                                                echo '<option value="' . $row3['grade_level'] . '">'
                                                                    . $row3['grade_level'] . '</option>';
                                                            }
                                                        }
                                                        ?>

                                                </select>
                                            </div>

                                            <div class="input-group col-md-6 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            School Year</b></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="year-year"
                                                    name="sch_year" value="<?php echo $row['sch_year']; ?>">
                                            </div>

                                        </div>

                                        <div class="form-group row mb-3">

                                            <div class="input-group col-md-12 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            School Address</b></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="School Address"
                                                    name="sch_address" value="<?php echo $row['sch_address']; ?>">
                                            </div>

                                        </div>

                                    </div>
                                    <?php } ?>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" name="submit" class="btn bg-purple"><i
                                                        class="fa fa-user-check"></i>
                                                    Update Info</button>
                                            </div>

                                            <?php if ($_SESSION['role'] == 'Registrar')
                                                echo ' <div class="justify-content-end mr-2">
                                                <a href="list.student.php" name="submit" class="btn bg-gray"><i
                                                        class="fa fa-arrow-circle-left"></i>
                                                    back</a>
                                            </div>';
                                            ?>

                                        </div>
                                    </div>
                            </form>

                            <!-- /.card -->

                        </div><!-- /.container-fluid -->
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->


            <!-- Footer and script -->
            <?php include '../../includes/bed-footer.php';

            // alert 
            if (isset($_SESSION['success-studEdit'])) {
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
title: 'Successfully Updated.'
})
}); 
</script>";
            } elseif (isset($_SESSION['no-img'])) {
                echo "<script>
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                $('.swalDefaultError')
                Toast.fire({
                    icon: 'error',
                    title:  'Upload Failed. Please try again.'
                });
            });
            </script>";
            } elseif (isset($_SESSION['no-pwd'])) {
                echo "<script>
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                $('.swalDefaultError')
                Toast.fire({
                    icon: 'error',
                    title:  'The Password field is required. Please try again.'
                });
            });
            </script>";
            }
            unset($_SESSION['no-pwd']);
            unset($_SESSION['success-studEdit']);
            unset($_SESSION['no-img']);  ?>

</body>

</html>