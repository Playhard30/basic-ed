<?php

require '../../../includes/conn.php';
session_start();
ob_start();

 

if (isset($_POST['submit'])) {

    $or_id = $_SESSION['or_id'];

    $studtype = mysqli_real_escape_string($conn, $_POST['studtype']);

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $stud_no = mysqli_real_escape_string($conn, $_POST['stud_no']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $grade = mysqli_real_escape_string($conn, $_POST['grade']);
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
    $guardname = mysqli_real_escape_string($conn, $_POST['guardname']);
    $gaddress = mysqli_real_escape_string($conn, $_POST['gaddress']);
    $gcontact = mysqli_real_escape_string($conn, $_POST['gcontact']);
    $last_attend = mysqli_real_escape_string($conn, $_POST['last_attend']);
    $prev_grade_level = mysqli_real_escape_string($conn, $_POST['prev_grade_level']);
    $sch_year = mysqli_real_escape_string($conn, $_POST['sch_year']);
    $sch_address = mysqli_real_escape_string($conn, $_POST['sch_address']);

    $check_stud_studno = mysqli_query($conn, "SELECT * FROM tbl_students WHERE stud_no = '$stud_no'") or die(mysqli_error($conn));
    $check_stud_lrn = mysqli_query($conn, "SELECT * FROM tbl_students WHERE lrn = '$lrn'") or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($check_stud_lrn)) {
        $lrn_zero = $row['lrn'];
    }
    if (!empty($lrn_zero)) {
        $result1_2 = mysqli_num_rows($check_stud_lrn);
    }
    $result1_1 = mysqli_num_rows($check_stud_studno);

    if ($result1_1 > 0 || $result1_2 > 0) {

        if ($result1_1 > 0 && $result1_2 > 0) {
            $_SESSION['lrn-studno'] = true;
            header('location: ../online_list.php');
        } elseif ($result1_2 > 0) {
            $_SESSION['double-lrn'] = true;
            header('location: ../online_list.php');
        } elseif ($result1_1 > 0) {
            $_SESSION['double-studno'] = true;
            header('location: ../online_list.php');
        }
    } else {

        $check_online_reg_studno = mysqli_query($conn, "SELECT * FROM tbl_admit_online WHERE stud_no = '$stud_no'") or die(mysqli_error($conn));
        $check_online_reg_lrn = mysqli_query($conn, "SELECT * FROM tbl_admit_online WHERE lrn = '$lrn'") or die(mysqli_error($conn));

        while ($row2 = mysqli_fetch_array($check_online_reg_lrn)) {
            $lrn_zero2 = $row2['lrn'];
        }
        if (!empty($lrn_zero2)) {
            $result2_2 = mysqli_num_rows($check_online_reg_lrn);
        }
        $result2_1 = mysqli_num_rows($check_online_reg_studno);

        if ($result2_1 > 0 || $result2_2 > 0) {

            if ($result2_1 > 0 && $result2_2 > 0) {
                $_SESSION['lrn-studno'] = true;
                header('location: ../online_list.php');
            } elseif ($result2_2 > 0) {
                $_SESSION['double-lrn'] = true;
                header('location: ../online_list.php');
            } elseif ($result2_1 > 0) {
                $_SESSION['double-studno'] = true;
                header('location: ../online_list.php');
            }
        } else {

        $status_update = mysqli_query($conn,"UPDATE tbl_online_reg SET status = 'For Approval' where or_id = '$or_id'");

        $hashpwd = password_hash($password, PASSWORD_BCRYPT);

        $insertUser = mysqli_query($conn, "INSERT INTO tbl_admit_online (stud_type, username, password, stud_no, grade_level_id, lrn, student_lname, student_fname, student_mname, address, date_birth, place_birth, age, gender_id, nationality, religion, landline, cellphone, email, fname, focc, fcontact, mname, mocc, mcontact, month_inc, no_siblings, guardname, gaddress, gcontact, last_sch, prev_grade_level, sch_year, sch_address, status ) VALUES ('$studtype', '$username' , '$hashpwd', '$stud_no', '$grade', '$lrn', '$firstname', '$lastname', '$midname', '$address', '$date_birth', '$place_birth', '$age', '$gender', '$nationality', '$religion', '$landline', '$cellphone', '$email', '$fname', '$focc', '$fcontact', '$mname', '$mocc', '$mcontact', '$month_inc', '$no_sib', '$guardname', '$gaddress', '$gcontact', '$last_attend', '$prev_grade_level', '$sch_year' , '$sch_address', 'For Approval')")  or die (mysqli_error($conn));

            $_SESSION['success'] = true;
            header('location: ../online_list.php'); }

            

} }
?>

