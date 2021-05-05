<?php
require '../../../includes/conn.php';
session_start();


if (isset($_POST['submit'])) {

    $studno = mysqli_real_escape_string($conn, $_POST['studno']);
    $lrn = mysqli_real_escape_string($conn, $_POST['lrn']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

    $check_studno = mysqli_query($conn, "SELECT * FROM tbl_students WHERE stud_no = '$studno'") or die(mysqli_error($conn));
    $check_lrn = mysqli_query($conn, "SELECT * FROM tbl_students WHERE lrn = '$lrn'") or die(mysqli_error($conn));
    $result = mysqli_num_rows($check_studno);
    $result2 = mysqli_num_rows($check_lrn);

    if ($result > 0 || $result2 > 0) {

        if ($result > 0 && $result2 > 0) {
            $_SESSION['lrn-studno'] = true;
            header('location: ../add.student.php');
        } elseif ($result2 > 0) {
            $_SESSION['double-lrn'] = true;
            header('location: ../add.student.php');
        } elseif ($result > 0) {
            $_SESSION['double-studno'] = true;
            header('location: ../add.student.php');
        }
    } else {
        if ($password != $password2) {
            $_SESSION['error-pass'] = true;
            header('location: ../add.student.php');
        } else {
            $hashpwd = password_hash($password, PASSWORD_BCRYPT);
            $insertUser = mysqli_query($conn, "INSERT INTO tbl_students (stud_no, lrn, username, password) VALUES ('$studno', '$lrn', '$username', '$hashpwd')") or die(mysqli_error($conn));
            $_SESSION['success'] = true;
            header('location: ../add.student.php');
        }
    }
}