<?php require '../../../includes/conn.php';
session_start();

$get_userID = $_GET['student_id'];

mysqli_query($conn, "DELETE FROM tbl_students WHERE student_id = '$get_userID'");
$_SESSION['success-del'] = true;
header('location: ../list.student.php');