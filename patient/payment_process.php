<?php
include_once "../dbc.php";
if(isset($_POST['payment_id'])){
	$payment_id=$_POST['payment_id'];
	$appointment_id=$_SESSION['appointment_id'];
	$result=mysqli_query($con,"update appointment set pay_status='Complete', payment_id='$payment_id' where id='$appointment_id'");	
}
?>