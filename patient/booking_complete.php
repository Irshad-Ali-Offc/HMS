<?php
include '../dbc.php';
if ($_POST) {
    // Get transaction ID
    $transactionId = $_POST['pp_TxnRefNo'];
    $sql="select appointment.*, username from appointment INNER JOIN users on users.id=appointment.patient_id order by appointment.id DESC";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	$_SESSION['patient']=$row['username'];
	$sql="update appointment set payment_id='$transactionId', pay_status='Complete' where id='".$row['id']."'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='appointment.php'
			alert('Appointment sent successfully')</script>";	
	}
	else{
		echo "<script>alert('Sorry, try again later')</script>";	
			
	}
} else {
    echo "<script>alert('No response received.')</script>";
}
?>