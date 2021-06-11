<?php
require '../../includes/conn.php';
session_start();
ob_start();

require '../../includes/bed-session.php';

if ($_SESSION['role'] == 'Registrar' || $_SESSION['role'] == 'Admission') {

    $stud_id = $_GET['stud_id'];
    $_SESSION['student_id'] = $stud_id;
}


?>

<!DOCTYPE html>
<html lang="en">

<!-- Head and links -->

<head>
    <title>Personal Info | SFAC Bacoor</title>
    <style>
    .focs:focus {
        border-bottom-color: #6f42c1 !important;
    }
    </style>
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
                    <a href="#" class="nav-link disabled text-light">Personal Info.</a>
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
                    <div class="container-fluid pl-3 pr-3 pb-3">
                        <div class="card card-purple shadow-lg">
                            <div class="card-header p-3">
                                <h3 class="text-lg card-title" style="margin-bottom: unset;">
                                    Personal Information
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

                                <div class="card-body shadow-lg pr-5 pl-5 pb-5 pt-4">

                                    <div class="p-4 mb-5"
                                        style="box-shadow: 0 4px 10px 0 rgb(0 0 0 / 20%), 0 4px 20px 0 rgb(0 0 0 / 19%); border-radius: 15px;">
                                        <div
                                            class="p-2 row justify-content-center bg-gradient-purple rounded pb-2 rounded-pill">
                                            <h3 class="m-0">Personal Data</h3>
                                        </div>
                                        <div class="form-group row mb-3 mt-3">

                                            <div class="input-group col-xl-6 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Student ID</b>
                                                    </span>
                                                </div>
                                                <?php if ($_SESSION['role'] == 'Registrar' || $_SESSION['role'] == 'Admission') {
                                                        echo ' <input type="text" class="form-control"
                                                value="' . $row['stud_no'] . '" placeholder="Student ID" name="stud_no"
                                           >
                                        </div>

                                        <div class="input-group col-xl-6 mb-2">
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
                                                    readonly>
                                            </div>
    
                                            <div class="input-group col-xl-6 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            LRN</b></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    placeholder="Learner Reference Number"
                                                    value="' . $row['lrn'] . '" readonly name="lrn">
                                            </div>';
                                                    } ?>

                                            </div>


                                            <div class="form-group row mb-3">

                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Lastname</b></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Lastname"
                                                        value="<?php echo $row['student_lname']; ?>" name="lastname">
                                                </div>

                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Firstname</b></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Firstname"
                                                        value="<?php echo $row['student_fname']; ?>" name="firstname">
                                                </div>

                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Middlename</b></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Middlename"
                                                        value="<?php echo $row['student_mname']; ?>" name="midname">
                                                </div>

                                            </div>

                                            <div class="form-group row mb-3">

                                                <div class="input-group col-xl-12 mb-2">
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

                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Date of Birth</b></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        data-inputmask-alias="datetime"
                                                        data-inputmask-inputformat="dd/mm/yyyy" data-mask
                                                        name="date_birth" placeholder="day/month/year"
                                                        value="<?php echo $row['date_birth']; ?>">
                                                </div>

                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Place of Birth</b></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="place_birth"
                                                        value="<?php echo $row['place_birth']; ?>"
                                                        placeholder="city, province">
                                                </div>

                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Age</b></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="age"
                                                        value="<?php echo $row['age']; ?>" placeholder="00 years old">
                                                </div>

                                            </div>

                                            <div class="form-group row mb-3">

                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Gender</b></span>
                                                    </div>
                                                    <select class="form-control custom-select select2 select2-purple"
                                                        data-dropdown-css-class="select2-purple"
                                                        data-placeholder="Select Gender" name="gender" required>
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

                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Nationality</b></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Nationality"
                                                        value="<?php echo $row['nationality']; ?>" name="nationality">
                                                </div>

                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Religion</b></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Religion"
                                                        value="<?php echo $row['religion']; ?>" name="religion">
                                                </div>

                                            </div>

                                            <div class="form-group row mb-3">

                                                <div class="input-group col-xl-4 mb-2 ml-auto mr-auto">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Landline No.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="Landline Number"
                                                        value="<?php echo $row['landline']; ?>" name="landline">
                                                </div>

                                                <div class="input-group col-xl-4 mb-2 ml-auto mr-auto">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Cell Phone No.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="Cellphone Number"
                                                        value="<?php echo $row['cellphone']; ?>" name="cellphone">
                                                </div>

                                            </div>

                                            <div class="form-group row mb-3">

                                                <div class="input-group col-xl-12 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Email Address</b></span>
                                                    </div>
                                                    <input type="email" class="form-control"
                                                        placeholder="example@gmail.com"
                                                        value="<?php echo $row['email']; ?>" name="email">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- FAMILYBACKGROUND -->



                                        <div class="p-4 mb-3"
                                            style="box-shadow: 0 4px 10px 0 rgb(0 0 0 / 20%), 0 4px 20px 0 rgb(0 0 0 / 19%); border-radius: 15px;">
                                            <div
                                                class="p-2 row justify-content-center bg-gradient-purple rounded pb-2 rounded-pill">
                                                <h3 class="m-0">Family Background</h3>
                                            </div>

                                            <div class="form-group row mb-3 mt-3">

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Name of Father</b></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Fullname"
                                                        value="<?php echo $row['fname']; ?>" name="fname">
                                                </div>

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Name of Mother</b></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Fullname"
                                                        value="<?php echo $row['mname']; ?>" name="mname">
                                                </div>



                                            </div>

                                            <div class="form-group row mb-3">

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Age</b></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="(Father) Age"
                                                        value="<?php echo $row['fage']; ?>" name="fage">
                                                </div>

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Age</b></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="(Mother) Age"
                                                        value="<?php echo $row['mage']; ?>" name="mage">
                                                </div>

                                            </div>

                                            <div class="form-group row mb-3">

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Email Add.</b></span>
                                                    </div>
                                                    <input type="email" class="form-control"
                                                        placeholder="(Father) Email Address"
                                                        value="<?php echo $row['femail']; ?>" name="femail">
                                                </div>

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Email Add.</b></span>
                                                    </div>
                                                    <input type="email" class="form-control"
                                                        placeholder="(Mother) Email Address"
                                                        value="<?php echo $row['memail']; ?>" name="memail">
                                                </div>

                                            </div>

                                            <div class="form-group row mb-3">

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Landline No.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="(Father) Landline Number"
                                                        value="<?php echo $row['flandline']; ?>" name="flandline">
                                                </div>

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Landline No.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="(Mother) Landline Number"
                                                        value="<?php echo $row['mlandline']; ?>" name="mlandline">
                                                </div>

                                            </div>

                                            <div class="form-group row mb-3">

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Contact No.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="(Father) Contact Number"
                                                        value="<?php echo $row['fcontact']; ?>" name="fcontact">
                                                </div>

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Contact No.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="(Mother) Contact Number"
                                                        value="<?php echo $row['mcontact']; ?>" name="mcontact">
                                                </div>

                                            </div>

                                            <div class="form-group row mb-3">

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Educational Attain.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="(Father) Educational Attainment"
                                                        value="<?php echo $row['feduc_attain']; ?>" name="feduc_attain">
                                                </div>

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Educational Attain.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="(Mother) Educational Attainment"
                                                        value="<?php echo $row['meduc_attain']; ?>" name="meduc_attain">
                                                </div>

                                            </div>

                                            <div class="form-group row mb-3">

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Last School Attend.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="(Father) Last School Attended"
                                                        value="<?php echo $row['flast_sch_att']; ?>"
                                                        name="flast_sch_att">
                                                </div>

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Last School Attend.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="(Mother) Last School Attended"
                                                        value="<?php echo $row['mlast_sch_att']; ?>"
                                                        name="mlast_sch_att">
                                                </div>

                                            </div>

                                            <div class="form-group row mb-3">

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Occupation</b></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="Father Occupation"
                                                        value="<?php echo $row['focc']; ?>" name="focc">
                                                </div>

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Occupation</b></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="Mother Occupation"
                                                        value="<?php echo $row['mocc']; ?>" name="mocc">
                                                </div>

                                            </div>


                                            <div class="form-group row mb-3">


                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Employer</b></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="(Father) Employer (Name of the Company)"
                                                        value="<?php echo $row['femployer']; ?>" name="femployer">
                                                </div>
                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Employer</b></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="(Mother) Employer (Name of the Company)"
                                                        value="<?php echo $row['memployer']; ?>" name="memployer">
                                                </div>

                                            </div>

                                            <div class="form-group row mb-3">

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Business Add.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="(Father) Business Address"
                                                        value="<?php echo $row['fbus_ad']; ?>" name="fbus_ad">
                                                </div>
                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Business Add.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="(Mother) Business Address"
                                                        value="<?php echo $row['mbus_ad']; ?>" name="mbus_ad">
                                                </div>

                                            </div>

                                            <div class="form-group row mb-3">


                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Office Phone No.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="(Father) Office Phone Number"
                                                        value="<?php echo $row['fof_ph_no']; ?>" name="fof_ph_no">
                                                </div>
                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Office Phone No.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="(Mother) Office Phone Number"
                                                        value="<?php echo $row['mof_ph_no']; ?>" name="mof_ph_no">
                                                </div>

                                            </div>


                                            <div class="form-group row mb-3">


                                                <div class="input-group col-xl-5 mb-2 ml-auto mr-auto">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Monthly Income</b></span>
                                                    </div>
                                                    <input type="number" class="form-control"
                                                        placeholder="(Father) Monthly Income"
                                                        value="<?php echo $row['fmonth_inc']; ?>" name="fmonth_inc">
                                                </div>

                                                <div class="input-group col-xl-5 mb-2 ml-auto mr-auto">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Monthly Income</b></span>
                                                    </div>
                                                    <input type="number" class="form-control"
                                                        placeholder="(Mother) Monthly Income"
                                                        value="<?php echo $row['mmonth_inc']; ?>" name="mmonth_inc">
                                                </div>


                                                <input type="text" class="form-control" placeholder="Family Income"
                                                    value="<?php echo $row['month_inc']; ?>" name="month_inc" hidden>




                                            </div>
                                        </div>

                                        <div class="p-4 mb-5"
                                            style="box-shadow: 0 4px 10px 0 rgb(0 0 0 / 20%), 0 4px 20px 0 rgb(0 0 0 / 19%); border-radius: 15px;">

                                            <div class="form-group row mb-3">

                                                <div class="input-group col-xl-7 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Guardian N.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Guardian Name"
                                                        value="<?php echo $row['guardname']; ?>" name="guardname">
                                                </div>

                                                <div class="input-group col-xl-5 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Relationship</b></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Relationship"
                                                        value="<?php echo $row['grelation'] ?>" name="grelation">
                                                </div>

                                            </div>

                                            <div class="form-group row mb-3">


                                                <div class="input-group col-xl-12 mb-2">
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


                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Tel no.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="gtel_no"
                                                        value="<?php echo $row['gtel_no']; ?>"
                                                        placeholder="Telephone Number">
                                                </div>

                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Cellphone No.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="gcontact"
                                                        value="<?php echo $row['gcontact']; ?>"
                                                        placeholder="Cellphone Number">
                                                </div>

                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Email Ad.</b></span>
                                                    </div>
                                                    <input type="email" class="form-control" name="gemail"
                                                        value="<?php echo $row['gemail']; ?>"
                                                        placeholder="Email Address">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="p-4 mb-5"
                                            style="box-shadow: 0 4px 10px 0 rgb(0 0 0 / 20%), 0 4px 20px 0 rgb(0 0 0 / 19%); border-radius: 15px;">

                                            <div class="text-center mb-3">
                                                <h3>Siblings (from eldest to youngest)</h3>
                                            </div>




                                            <div class="form-group row mb-3">

                                                <div class=" col-xl-3 mb-2">

                                                    <label for="exampleInputBorder">Name:</label>

                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs" placeholder="Name"
                                                        value="<?php echo $row['sib1_name']; ?>" name="sib1_name">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs" placeholder="Name"
                                                        value="<?php echo $row['sib2_name']; ?>" name="sib2_name">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs" placeholder="Name"
                                                        value="<?php echo $row['sib3_name']; ?>" name="sib3_name">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs" placeholder="Name"
                                                        value="<?php echo $row['sib4_name']; ?>" name="sib4_name">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs" placeholder="Name"
                                                        value="<?php echo $row['sib5_name']; ?>" name="sib5_name">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs" placeholder="Name"
                                                        value="<?php echo $row['sib6_name']; ?>" name="sib6_name">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs" placeholder="Name"
                                                        value="<?php echo $row['sib7_name']; ?>" name="sib7_name">
                                                </div>

                                                <div class=" col-xl-1 mb-2">

                                                    <label for="exampleInputBorder">Age:</label>

                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs" placeholder="Age"
                                                        value="<?php echo $row['sib1_age']; ?>" name="sib1_age">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs" placeholder="Age"
                                                        value="<?php echo $row['sib2_age']; ?>" name="sib2_age">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs" placeholder="Age"
                                                        value="<?php echo $row['sib3_age']; ?>" name="sib3_age">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs" placeholder="Age"
                                                        value="<?php echo $row['sib4_age']; ?>" name="sib4_age">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs" placeholder="Age"
                                                        value="<?php echo $row['sib5_age']; ?>" name="sib5_age">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs" placeholder="Age"
                                                        value="<?php echo $row['sib6_age']; ?>" name="sib6_age">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs" placeholder="Age"
                                                        value="<?php echo $row['sib7_age']; ?>" name="sib7_age">
                                                </div>
                                                <div class=" col-xl-2 mb-2">

                                                    <label for="exampleInputBorder">Civil Status:</label>

                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs"
                                                        placeholder="Civil Status"
                                                        value="<?php echo $row['sib1_civ']; ?>" name="sib1_civ">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs"
                                                        placeholder="Civil Status"
                                                        value="<?php echo $row['sib2_civ']; ?>" name="sib2_civ">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs"
                                                        placeholder="Civil Status"
                                                        value="<?php echo $row['sib3_civ']; ?>" name="sib3_civ">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs"
                                                        placeholder="Civil Status"
                                                        value="<?php echo $row['sib4_civ']; ?>" name="sib4_civ">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs"
                                                        placeholder="Civil Status"
                                                        value="<?php echo $row['sib5_civ']; ?>" name="sib5_civ">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs"
                                                        placeholder="Civil Status"
                                                        value="<?php echo $row['sib6_civ']; ?>" name="sib6_civ">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs"
                                                        placeholder="Civil Status"
                                                        value="<?php echo $row['sib7_civ']; ?>" name="sib7_civ">

                                                </div>

                                                <div class=" col-xl-3 mb-2">

                                                    <label for="exampleInputBorder">School:</label>

                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs"
                                                        placeholder="School" value="<?php echo $row['sib1_sch']; ?>"
                                                        name="sib1_sch">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs"
                                                        placeholder="School" value="<?php echo $row['sib2_sch']; ?>"
                                                        name="sib2_sch">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs"
                                                        placeholder="School" value="<?php echo $row['sib3_sch']; ?>"
                                                        name="sib3_sch">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs"
                                                        placeholder="School" value="<?php echo $row['sib4_sch']; ?>"
                                                        name="sib4_sch">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs"
                                                        placeholder="School" value="<?php echo $row['sib5_sch']; ?>"
                                                        name="sib5_sch">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs"
                                                        placeholder="School" value="<?php echo $row['sib6_sch']; ?>"
                                                        name="sib6_sch">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs"
                                                        placeholder="School" value="<?php echo $row['sib7_sch']; ?>"
                                                        name="sib7_sch">
                                                </div>


                                                <div class=" col-xl-3 mb-2">

                                                    <label for="exampleInputBorder">Educ. Background</label>

                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs"
                                                        placeholder="Educational Background"
                                                        value="<?php echo $row['sib1_educbg']; ?>" name="sib1_educbg">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs"
                                                        placeholder="Educational Background"
                                                        value="<?php echo $row['sib2_educbg']; ?>" name="sib2_educbg">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs"
                                                        placeholder="Educational Background"
                                                        value="<?php echo $row['sib3_educbg']; ?>" name="sib3_educbg">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs"
                                                        placeholder="Educational Background"
                                                        value="<?php echo $row['sib4_educbg']; ?>" name="sib4_educbg">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs"
                                                        placeholder="Educational Background"
                                                        value="<?php echo $row['sib5_educbg']; ?>" name="sib5_educbg">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs"
                                                        placeholder="Educational Background"
                                                        value="<?php echo $row['sib6_educbg']; ?>" name="sib6_educbg">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control form-control-border focs"
                                                        placeholder="Educational Background"
                                                        value="<?php echo $row['sib7_educbg']; ?>" name="sib7_educbg">

                                                </div>


                                            </div>
                                        </div>




                                        <!-- EDUCATIONAL BACKGROUND -->

                                        <div class="p-4 mb-4"
                                            style="box-shadow: 0 4px 10px 0 rgb(0 0 0 / 20%), 0 4px 20px 0 rgb(0 0 0 / 19%); border-radius: 15px;">
                                            <div
                                                class="p-2 row justify-content-center bg-gradient-purple rounded pb-2 rounded-pill text-center">
                                                <h3 class="m-0 ">Educational Background</h3>
                                            </div>


                                            <div class="form-group row mb-3 mt-3">

                                                <div class="input-group col-xl-8 mb-2">
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

                                                <!-- <div class="input-group col-xl-4 mb-2 ml-auto mr-auto">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                No. of Siblings</b></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="Number of Siblings"
                                                        value="<?php echo $row['no_siblings']; ?>" name="no_sib">
                                                </div> -->

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Previous Grade Level</b></span>
                                                    </div>
                                                    <select class="form-control custom-select select2 select2-purple"
                                                        data-dropdown-css-class="select2-purple"
                                                        data-placeholder="Select Grade Level" name="prev_grade_level">
                                                        <?php if (empty($row['prev_grade_level'])) {
                                                                echo '<option value="None" disabled selected>Select Grade Level</option>
                                                            <option value="None">N/A</option>';
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

                                                <div class="input-group col-xl-12 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                School Year</b></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        data-inputmask-alias="datetime"
                                                        data-inputmask-inputformat="yyyy-yyyy" data-mask
                                                        placeholder="School Year" name="sch_year"
                                                        value="<?php echo $row['sch_year']; ?>">
                                                </div>

                                            </div>

                                            <div class="form-group row mb-3">

                                                <div class="input-group col-xl-12 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                School Address</b></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="School Address"
                                                        name="sch_address" value="<?php echo $row['sch_address']; ?>">
                                                </div>

                                            </div>

                                            <div class="form-group row mb-3">

                                                <div class="input-group col-xl-12 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Honors & Awards</b></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="School Address"
                                                        name="sch_address" value="<?php echo $row['sch_address']; ?>">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="p-4 mb-5"
                                            style="box-shadow: 0 4px 10px 0 rgb(0 0 0 / 20%), 0 4px 20px 0 rgb(0 0 0 / 19%); border-radius: 15px;">

                                            <div class="text-center mb-3">
                                                <h3>Special Talents/Skills <small>(please check)</small> </h3>
                                            </div>


                                            <div class="form-group row mb-1 justify-content-center">


                                                <div class="custom-control col-md-2 custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="customCheckbox1" value="option1">
                                                    <label for="customCheckbox1" class="custom-control-label">
                                                        Dancing</label>
                                                </div>

                                                <div class="custom-control col-md-2 custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="customCheckbox2" value="option1">
                                                    <label for="customCheckbox2" class="custom-control-label">
                                                        Singing</label>
                                                </div>


                                                <div class="custom-control col-md-2 custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="customCheckbox2" value="option1">
                                                    <label for="customCheckbox2" class="custom-control-label">
                                                        Basketball</label>
                                                </div>

                                                <div class="custom-control col-md-2 custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="customCheckbox2" value="option1">
                                                    <label for="customCheckbox2" class="custom-control-label">
                                                        Volleyball</label>
                                                </div>



                                                <div class="custom-control col-md-2 custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="customCheckbox3" value="option1">
                                                    <label for="customCheckbox3" class="custom-control-label">
                                                        Chess</label>
                                                </div>



                                                <div class="custom-control col-md-2 custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="customCheckbox4" value="option1">
                                                    <label for="customCheckbox4" class="custom-control-label">
                                                        Table Tennis</label>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-1 justify-content-center">

                                                <div class="custom-control col-md-2 custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="customCheckbox5" value="option1">
                                                    <label for="customCheckbox5" class="custom-control-label">
                                                        Drawing</label>
                                                </div>



                                                <div class="custom-control col-md-2 custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="customCheckbox6" value="option1">
                                                    <label for="customCheckbox6" class="custom-control-label">
                                                        Painting</label>
                                                </div>


                                                <div class="custom-control col-md-8 custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="customCheckbox3" value="option1">
                                                    <label for="customCheckbox3" class="custom-control-label">
                                                        Playing Musical Instrument</label>

                                                    <label>, Specify:</label>

                                                    <input type="text" class="form-control form-control-border focs"
                                                        placeholder="Age" value="<?php echo $row['sib1_age']; ?>"
                                                        name="sib1_age">
                                                </div>


                                            </div>

                                            <div class="form-group row mb-1 justify-content-center">
                                                <div class="custom-control col-md-12 custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="customCheckbox3" value="option1">
                                                    <label for="customCheckbox3" class="custom-control-label">
                                                        Playing Musical Instrument</label>

                                                    <label>, Specify:</label>

                                                    <input type="text" class="form-control form-control-border focs"
                                                        placeholder="Age" value="<?php echo $row['sib1_age']; ?>"
                                                        name="sib1_age">
                                                </div>

                                            </div>



                                        </div>
                                    </div>
                                    <?php } ?>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" name="submit" class="btn bg-purple btn-default"><i
                                                        class="fa fa-user-check"></i>
                                                    Update Info</button>
                                            </div>

                                            <?php if ($_SESSION['role'] == 'Registrar' || $_SESSION['role'] == 'Admission')
                                                echo ' <div class="justify-content-end mr-2">
                                                <a href="list.student.php?search=' . $_SESSION['search'] . '&look=" class="btn bg-gray btn-default"><i
                                                        class="fa fa-arrow-circle-left"></i>
                                                    Back</a>
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
            timer: 2000
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
                    timer: 2000
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
                    timer: 2000
                });
                $('.swalDefaultError')
                Toast.fire({
                    icon: 'error',
                    title:  'The Password field is required. Please try again.'
                });
            });
            </script>";
            } elseif (isset($_SESSION['double-studno'])) {
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
        title:  'Student ID already exists.'
    });
});
</script>";
            } elseif (isset($_SESSION['double-lrn'])) {
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
        title:  'LRN already exists.'
    });
});
</script>";
            } elseif (isset($_SESSION['lrn-studno'])) {
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
        title:  'Student ID and LRN are already exists.'
    });
});
</script>";
            }
            unset($_SESSION['lrn-studno']);
            unset($_SESSION['double-lrn']);
            unset($_SESSION['double-studno']);
            unset($_SESSION['no-pwd']);
            unset($_SESSION['success-studEdit']);
            unset($_SESSION['no-img']); ?>

</body>

</html>