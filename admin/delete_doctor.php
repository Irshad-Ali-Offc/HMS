<?php
include 'header.php';
$id=$_REQUEST['id'];
$sql="delete from doctor where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
	echo '<script>window.location.href="doctor.php"
		alert("Doctor deleted successfully")</script>';
}
else{
	echo '<script>alert("Sorry try again later")</script>';	
}
?>