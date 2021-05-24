<?php
require '../../../includes/conn.php';
session_start();


if (isset($_POST['submit'])) {


    if (empty($_POST['checked'])) {
        $_SESSION['empty-check'] = true;
        header('location: ../list.offeredSubPJH.php');
    } else {
        foreach ($_POST['checked'] as $index) {
            $sched_id = $_POST['sched_id'];
            $studID = $_POST['studID'];
            $insert = mysqli_query($conn, "INSERT INTO tbl_enrolled_subjects (schedule_id, student_id) VALUES ('$sched_id[$index]', '$studID[$index]')") or die(mysqli_error($conn));
            $_SESSION['success'] = true;
            header('location: ../list.enrolledSubPJH.php');
        }
    }
}