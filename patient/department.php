<?php
include 'header.php';
?>

       
        <main class="main-content">
             
            <section id="doctor-section">
                <h2>View Departments</h2>
                <?php
				$sql="select * from department";
				$result=mysqli_query($con,$sql);
				while($row=mysqli_fetch_array($result)){
				?>
                <a href="doctor.php?department=<?php echo $row['id'];?>" class="text-decoration text-dark">
                <div class="department-card">
                	<div class="department-card-body">
                    <img src="../image/<?php echo $row['image'];?>" class="card-img">
                    <div class="card-text">
                   		<h4><?php echo $row['dep_name'];?></h4>
                    </div>
                        
                    </div>
                 </div>
                 </a>
                 <?php } ?>
            </section>
            
        </main>
    </div>


</body>

</html>
<?php
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$cnic=$_POST['cnic'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$sql="insert into patient values('','".$patient['id']."','$dob','$gender','$cnic','$address','$contact','$email')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>alert("Profile created successfully")</script>';
	}
	else{
		echo '<script>alert("Sorry try again later")</script>';	
	}
}
?>