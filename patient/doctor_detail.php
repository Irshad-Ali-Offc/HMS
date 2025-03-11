<?php
include 'header.php';
$id=$_REQUEST['id'];
$sql="select doctor.*, users.name from doctor INNER JOIN users ON users.id=doctor.user_id where users.id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<style>
.image-container{
	width:30%;
	float:left;	
}
.doctor-image{
	height:200px;
	width:200px;
	border-radius:50%;	
}
.profile-container{
	width:70%;
	float:left;		
}
.booking-btn{
	height:40px;
	width:150px;
	font-size:20px;
	background-color:#007BFF;	
}
.designation{
	float:right;	
	font-size:14px;
	color:#666;
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
</style>

        <!-- Main Content -->
        <main class="main-content">
             <!-- Profile Section -->
            <section id="doctor-section">
                <div class="image-container">
                	<img src="../image/<?php echo $row['image'];?>" class="doctor-image">
                </div>
                <div class="profile-container">
                	<h2><?php echo $row['name'];?> <span class="designation"><?php echo $row['designation'];?></span></h2>
                    <p><?php echo $row['specialization'];?></p>
                    <p><?php echo $row['qualification'];?></p>
                    <p><?php echo $row['experience'];?></p>
                    <p>Checkup Fee <?php echo number_format($row['fee']);?></p>
                    <form method="post" action="book_now.php">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="hidden" name="fee" value="<?php echo $row['fee'];?>">
                    <button type="submit" class="booking-btn">Appoint Now</button>
                    </form>
                </div>
                <p><?php echo $row['about'];?></p>
            </section>
            
        </main>
    </div>


</body>

</html>