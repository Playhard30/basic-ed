<?php
require '../../../includes/conn.php';
session_start();


if (isset($_POST['submit'])) {

    if (empty($_POST['checked'])) {
        $_SESSION['empty-check'] = true;
        header('location: ../list.enrolledSubSH.php');
    } else {
        foreach ($_POST['checked'] as $index) {
            $ensub = $_POST['enrolled_subID'];
            $del_enrolled_sub = mysqli_query($conn, "DELETE FROM tbl_enrolled_subjects WHERE enrolled_subSH_id = '$ensub[$index]'") or die(mysqli_error($conn));
            $_SESSION['drop'] = true;
            header('location: ../list.enrolledSubSH.php');
        }
    }
}