<?php
include 'header.php';
$id=$_REQUEST['id'];
$sql="delete from appointment where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
	echo '<script>window.location.href="appointment.php"
		alert("Appointment deleted successfully")</script>';
}
else{
	echo '<script>alert("Sorry try again later")</script>';	
}
?>