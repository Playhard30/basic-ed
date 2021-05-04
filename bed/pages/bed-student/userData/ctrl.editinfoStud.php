<?php
require '../../../includes/conn.php';
session_start();

$stud_id = $_SESSION['student_id'];


if (isset($_POST['submit'])) {

    $stud_no = mysqli_real_escape_string($conn, $_POST['stud_no']);
    $lrn = mysqli_real_escape_string($conn, $_POST['lrn']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $midname = mysqli_real_escape_string($conn, $_POST['midname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $date_birth = mysqli_real_escape_string($conn, $_POST['date_birth']);
    $place_birth = mysqli_real_escape_string($conn, $_POST['place_birth']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
    $religion = mysqli_real_escape_string($conn, $_POST['religion']);
    $landline = mysqli_real_escape_string($conn, $_POST['landline']);
    $cellphone = mysqli_real_escape_string($conn, $_POST['cellphone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $focc = mysqli_real_escape_string($conn, $_POST['focc']);
    $fcontact = mysqli_real_escape_string($conn, $_POST['fcontact']);
    $mname = mysqli_real_escape_string($conn, $_POST['mname']);
    $mocc = mysqli_real_escape_string($conn, $_POST['mocc']);
    $mcontact = mysqli_real_escape_string($conn, $_POST['mcontact']);
    $month_inc  = mysqli_real_escape_string($conn, $_POST['month_inc']);
    $no_sib = mysqli_real_escape_string($conn, $_POST['no_sib']);
    $guarname = mysqli_real_escape_string($conn, $_POST['guardname']);
    $gaddress = mysqli_real_escape_string($conn, $_POST['gaddress']);
    $gcontact = mysqli_real_escape_string($conn, $_POST['gcontact']);
    $last_attend = mysqli_real_escape_string($conn, $_POST['last_attend']);
    $prev_grade_level = mysqli_real_escape_string($conn, $_POST['prev_grade_level']);
    $sch_year = mysqli_real_escape_string($conn, $_POST['sch_year']);
    $sch_address = mysqli_real_escape_string($conn, $_POST['sch_address']);


    if ($_SESSION['role'] == 'Registrar') {
        if ($_SESSION['stud_no'] != $stud_no) {

            $check_studno = mysqli_query($conn, "SELECT * FROM tbl_students WHERE stud_no = '$studno'") or die(mysqli_error($conn));
            $check_lrn = mysqli_query($conn, "SELECT * FROM tbl_students WHERE lrn = '$lrn'") or die(mysqli_error($conn));
            $result = mysqli_num_rows($check_studno);
            $result2 = mysqli_num_rows($check_lrn);

            if ($result > 0) {
                $_SESSION['double-studno'] = true;
                header('location: ../add.student.php');
            } elseif ($result2 > 0) {
                $_SESSION['double-lrn'] = true;
                header('location: ../add.student.php');
            }
        }
    }

    $insertUser = mysqli_query($conn, "UPDATE tbl_students SET stud_no = '$stud_no', lrn = '$lrn', student_fname = '$firstname', student_lname = '$lastname', student_mname = '$midname', address = '$address', date_birth = '$date_birth', place_birth = '$place_birth', age = '$age', gender_id = '$gender', nationality = '$nationality', religion = '$religion', landline = '$landline', cellphone = '$cellphone', email = '$email', fname = '$fname', focc = '$focc', fcontact = '$fcontact',  mname = '$mname', mocc = '$mocc', mcontact = '$mcontact', month_inc = '$month_inc', no_siblings = '$no_sib', guardname = '$guarname', gaddress = '$gaddress', gcontact = '$gcontact', last_sch = '$last_attend', prev_grade_level = '$prev_grade_level', sch_year = '$sch_year', sch_address = '$sch_address' WHERE student_id = '$stud_id'") or die(mysqli_error($conn));
    $_SESSION['success-studEdit'] = true;
    header('location: ../edit.infoStud.php?stud_id=' . $stud_id);
}