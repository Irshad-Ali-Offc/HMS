<?php
include 'header.php';
$id=$_REQUEST['id'];
$sql="delete from appointment where patient_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from patient where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
	echo '<script>window.location.href="patient.php"
		alert("Patient deleted successfully")</script>';
}
else{
	echo '<script>alert("Sorry try again later")</script>';	
}
?>