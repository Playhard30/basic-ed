<?php
require '../../../includes/conn.php';
session_start();

$student_id = $_SESSION['get-studID'];

// if (isset($_POST['upload'])) {

//     if (empty($_FILES['image']['tmp_name'])) {
//         $_SESSION['no-img'] = true;
//         header('location: ../edit.accounting.php?acc_id=' . $acc_id);
//     } else {
//         $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
//         $set_userInfo = mysqli_query($conn, "UPDATE tbl_accountings SET img = '$image' WHERE acc_id = '$acc_id'");
//         $_SESSION['success-accEdit'] = true;
//         header('location: ../edit.accounting.php?acc_id=' . $acc_id);
//     }
// } else

if (isset($_POST['submit'])) {

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

    $insertUser = mysqli_query($conn, "UPDATE tbl_students SET student_fname = '$firstname', student_lname = '$lastname', student_mname = '$midname', address = '$address', date_birth = '$date_birth', place_birth = '$place_birth', age = '$age', gender_id = '$gender', nationality = '$nationality', religion = '$religion', landline = '$landline', cellphone = '$cellphone', email = '$email', fname = '$fname', focc = '$focc', fcontact = '$fcontact',  mname = '$mname', mocc = '$mocc', mcontact = '$mcontact', month_inc = '$month_inc', no_siblings = '$no_sib', guardname = '$guarname', gaddress = '$gaddress', gcontact = '$gcontact', last_sch = '$last_attend', prev_grade_level = '$prev_grade_level', sch_year = '$sch_year', sch_address = '$sch_address' WHERE student_id = '$student_id'") or die(mysqli_error($conn));
    $_SESSION['success-studEdit'] = true;
    header('location: ../edit.registrar.student.php?student_id=' . $student_id);
}