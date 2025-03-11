<?php 
include_once '../dbc.php'; 
		$department=$_POST['department'];
		$sql = "SELECT doctor.*, users.name FROM doctor INNER JOIN users on users.id=doctor.user_id where dep_id='$department'"; 
		$result =mysqli_query($con,$sql);
		echo '<option value="" disabled="" selected="">Select a doctor</option>';
		while($row=mysqli_fetch_array($result))
		{
			echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
		} 
?>