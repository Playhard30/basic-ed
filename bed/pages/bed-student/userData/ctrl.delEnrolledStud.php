<?php require '../../../includes/conn.php';
session_start();

$sy_id = $_GET['sy_id'];

mysqli_query($conn, "DELETE FROM tbl_schoolyears WHERE sy_id = '$sy_id'") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
header('location: ../list.enrolledStud.php');