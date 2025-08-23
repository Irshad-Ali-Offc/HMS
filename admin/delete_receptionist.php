<?php
include 'header.php';
$id=$_REQUEST['id'];
$sql="delete from users where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
	echo '<script>window.location.href="receptionist.php"
		alert("Receptionist deleted successfully")</script>';
}
else{
	echo '<script>alert("Sorry try again later")</script>';	
}
?>