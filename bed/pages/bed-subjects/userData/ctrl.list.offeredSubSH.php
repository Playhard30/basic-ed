<?php
require '../../../includes/conn.php';
session_start();


if (isset($_POST['submit'])) {




    if (empty($_POST['checked'])) {
        $_SESSION['empty-check'] = true;
        if ($_SESSION['role'] == "Admission") {
            header('location: ../list.offeredSubSH.php?stud_id=' . $_SESSION['studtID']);
        } else if ($_SESSION['role'] == "Student") {
            header('location: ../list.offeredSubSH.php');
        }
    } else {
        foreach ($_POST['checked'] as $index) {
            $sched_id = $_POST['sched_id'];
            $studID = $_POST['studID'];
            $insert = mysqli_query($conn, "INSERT INTO tbl_enrolled_subjects (schedule_id, student_id) VALUES ('$sched_id[$index]', '$studID[$index]')") or die(mysqli_error($conn));
            $_SESSION['success'] = true;
            if ($_SESSION['role'] == "Admission") {
                header('location: ../list.enrolledSubSH.php?stud_id=' . $_SESSION['studtID']);
            } else if ($_SESSION['role'] == "Student") {
                header('location: ../list.enrolledSubSH.php');
            }
        }
    }
}