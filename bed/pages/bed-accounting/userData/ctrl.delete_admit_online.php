<?php require '../../../includes/conn.php';
session_start();

$get_userID = $_GET['ao_id'];
mysqli_query($conn, "DELETE FROM tbl_admit_online WHERE ao_id = '$get_userID'");
$_SESSION['success-del'] = true;
header('location: ../approve_online_inq.php');

?>