<?php
include 'header.php';
?>
<style>
.doctor-card{
	width:33%;
	float:left;	
}
.card-body{
	width:90%;
	margin:auto;
	box-shadow: 0 4px 8px rgba(0, 0, 0, 1);	
	border-radius: 4px;
	margin-top:20px;
}
.card-img{
	width:100%;	
	height:220px;
}
.card-text{
	padding-left:10px;
	padding-bottom:20px;	
}
.line-height{
	line-height:4px;
		
}
.text-decoration{
	text-decoration:none;	
}
.text-dark{
	color:black;	
}
#search-input{
	height:24px;
	box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);	
	padding-left:8px;
}
</style>

        <!-- Main Content -->
        <main class="main-content">
             <!-- Profile Section -->
            <section id="doctor-section">
                <h2>View Doctors</h2>
                <form method="post">
                <div class="search-container">
                  <input type="text" name="keyword" id="search-input" placeholder="Search doctor..." required/>
                  <button type="submit" name="search" id="search-btn" class="search-btn">
                  <i class="fa fa-search"></i>
                  </button>
               </div>
               </form>
                <?php
				if(isset($_POST['search'])){
					$keyword=$_REQUEST['keyword'];
					$sql="select doctor.*, users.id, users.name from doctor INNER JOIN users ON users.id=doctor.user_id where users.name LIKE '%$keyword%' OR specialization LIKE '%$keyword%' OR qualification LIKE '%$keyword%' OR experience LIKE '%$keyword%' OR designation LIKE '%$keyword%' OR fee LIKE '%$keyword%'";
				}
				else if(isset($_REQUEST['department'])){
					$department=$_REQUEST['department'];
					$sql="select doctor.*, users.id, users.name from doctor INNER JOIN users ON users.id=doctor.user_id where dep_id='$department'";
				}
				else{
					$sql="select doctor.*, users.id, users.name from doctor INNER JOIN users ON users.id=doctor.user_id";
				}
				
				$result=mysqli_query($con,$sql);
				while($row=mysqli_fetch_array($result)){
				?>
                <a href="doctor_detail.php?id=<?php echo $row['id'];?>" class="text-decoration text-dark">
                <div class="doctor-card">
                	<div class="card-body">
                    <img src="../image/<?php echo $row['image'];?>" class="card-img">
                    <div class="card-text">
                   		<h4><?php echo $row['name'];?></h4>
						   <p class="line-height"><?php echo mb_strimwidth( $row['specialization'],0,26,'...');?></p>
                        <p class="line-height"><?php echo mb_strimwidth( $row['qualification'],0,26,'...');?></p>
                        
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