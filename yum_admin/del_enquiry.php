<?php 
session_start();
	include('include/header.php');
	if(!isset($_SESSION['username'])){
		header('location: index.php');
	}
include("../include/dbconnect.php");
$id=$_REQUEST['id'];
$sql="delete from yum_comments where contact_id=$id";




if ($conn->query($sql) == TRUE) {
    $message = "Data Deleted Successfully.";
}else{
    $message = "Something went Wrong";
header("Location: view_enquiry.php");

?>

