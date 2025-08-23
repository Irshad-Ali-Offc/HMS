<?php 
include_once '../dbc.php'; 
    if(isset($_POST['department'])){
		$department=$_POST['department'];
		$sql = "SELECT users.name, doctor.id FROM doctor INNER JOIN users on users.id=doctor.user_id where dep_id='$department'"; 
		$result =mysqli_query($con,$sql);
		echo '<option value="">Select a doctor</option>';
		while($row=mysqli_fetch_array($result))
		{
			echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
		} 
    }
    else if(isset($_POST['patient']))
    {
        $patient=$_POST['patient'];
		$sql="select users.name, patient.id from patient INNER JOIN users on users.id=patient.user_id where patient.id='$patient'";
		$result =mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
        echo $row['name'];
    }
    else if(isset($_POST['doctor']))
    {
        $doctor=$_POST['doctor'];
		$sql = "SELECT * from doctor where id='$doctor'"; 
		$result =mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
        echo $row['fee'];
    }
?>