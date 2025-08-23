<style>
    .register-form {
  background-color: #fff;
  padding: 25px;
  border-radius: 12px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
  max-width: 1200px;
  margin-top: 20px;
  margin-left: 1px;
}

.register-form h2{
  text-align: center;
  
}
.register-form .form-group {
  margin-bottom: 15px;
}

.register-form label {
  display: block;
  font-weight: 500;
  margin-bottom: 6px;
  color: #333;
}

.register-form input,
.register-form select,
.register-form textarea {
  width: 100%;
  padding: 10px 12px;
  font-size: 15px;
  border: 1px solid #ccc;
  border-radius: 6px;
  transition: 0.3s;
}

.register-form input:focus,
.register-form select:focus,
.register-form textarea:focus {
  border-color: #2f4050;
  outline: none;
  box-shadow: 0 0 3px rgba(47, 64, 80, 0.3);
}

.register-form button {
  background-color: #2f4050;
  color: #fff;
  border: none;
  padding: 12px 20px;
  font-size: 16px;
  border-radius: 6px;
  cursor: pointer;
  transition: 0.3s;
  margin-top: 10px;
}

.register-form button:hover {
  background-color: #1a252f;
}  
  </style>
  
<?php 
include 'header.php';
include 'navbar.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <script src="../js/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#username').on('blur', function(){
        var username = $(this).val();
        if(username.length > 0){
            $.post('check_username.php', {username: username}, function(data){
                if(data === 'taken'){
                    $('#username-error').text('Username already exists. Please choose another.');
                } else {
                    $('#username-error').text('');
                }
            });
        }
    });
});
</script>
</head>
<body>
  
</body>
</html>
<div class="main-content">
    <div class="page-header">
            <h1>Patient Registration</h1>
        </div>
  
  <form method="post" class="register-form">
    <div class="form-group">
      <label for="fullname">Full Name</label>
      <input type="text" id="fullname" name="name" placeholder="Enter full name" 
       pattern="[A-Za-z ]+" 
       title="Only letters and spaces are allowed" 
       required>

    </div>

    <div class="form-group">
      <label for="CNIC">CNIC</label>
      <input type="text" id="cnic" name="cnic" placeholder="e.g. 45105-2121213-6" 
       pattern="[0-9]{5}-[0-9]{7}-[0-9]{1}" 
       title="CNIC must be in the format 45105-2121213-6" 
       required>

    </div>
      <div class="form-group">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" placeholder="Enter username" required>
      <span id="username-error" style="color:red;"></span>
    </div>
      <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter password" required>
    </div>
    <div class="form-group">
      <label for="gender">Gender</label>
      <select id="gender" name="gender" required>
        <option value="">Select gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>
    </div>

    <div class="form-group">
      <label for="dob">Date of Birth</label>
      <input type="date" id="dob" name="dob" max="<?php echo date('Y-m-d');?>" required>
    </div>


    <div class="form-group">
      <label for="contact">Contact Number</label>
      <input type="tel" id="contact" name="contact" placeholder="e.g. 03001234567" pattern="\d{11}" maxlength="11" required>


    </div>

    <div class="form-group">
      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" placeholder="e.g. example@gmail.com" required>
    </div>

    <div class="form-group">
      <label for="address">Full Address</label>
      <textarea id="address" name="address" rows="3" placeholder="Street, City, Zip Code" required></textarea>
    </div>

   
    <button type="submit" name="submit">Register Patient</button>
  </form>
</div>
<?php
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $cnic=$_POST['cnic'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $sql="insert into users values('','$name','$username','$password','patient')";
	$result=mysqli_query($con,$sql);
	$user_id=mysqli_insert_id($con);
  
// Check for duplicate username
$check = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
if(mysqli_num_rows($check) > 0){
    echo '<script>alert("Username already exists. Please choose another.");</script>';
} else {
    
	$sql="insert into patient values('','$user_id','$dob','$gender','$cnic','$address','$contact','$email')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>window.location.href="patient_registration.php"
				alert("Patient added successfully")</script>';
	}
	else{
		echo '<script>alert("Sorry try again later")</script>';	
	}
}}
?>