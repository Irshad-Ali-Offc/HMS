<?php
include 'dbc.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hospital Management System</title>
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <script src="js/login.js"defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

  <div class="container">
  <a href="index.php">
  <div class="main-logo">
    </div>
    </a>  
    <div class="forms-container">
      <div class="signin-signup">
        <form method="post" class="sign-in-form">
          <h2 class="title">Sign In</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="Username" required  />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required />
          </div>
          <input type="submit" name="login" value="Login" class="btn solid" />

         
        </form>


        <form method="post" class="sign-up-form">
          <h2 class="title">Sign Up</h2>
          <div class="input-field"> 
            <i class="fas fa-user"></i>
            <input type="text" name="name" placeholder="Name" required />
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="Username" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required />
          </div>
          <input type="submit" name="register" value="Sign Up" class="btn solid" />

         
        </form>
      </div>
    </div>
    <div class="panels-container">

      <div class="panel left-panel">
        <div class="content">
          <h3>New here?</h3>
          <p>
          <H4>
            Welcome to Medicare HMS!
          </H4>
          Join us for a better healthcare experience. Sign up and be part of something meaningful!
          <h4>
          </p>
          <button class="btn transparent" id="sign-up-btn">Sign Up</button>
        </div>
        <img src="image/signup.png" class="image leftimg" alt="">
      </div>

      <div class="panel right-panel">
        <div class="content">
          <h3>One of us?</h3>
          <p>
          <h2> Welcome Back! </h2>
          Glad to have you here. Sign in to continue your journey with us and make healthcare easier, together!</p>
          <button class="btn transparent" id="sign-in-btn">Sign In</button>
        </div>
        <img src="image/signin.png" class="image rightimg" alt="">
      </div>
    </div>
  </div>
</body>
</html>
<?php
if(isset($_POST['login']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];	
	$sql="select * from users where username='$username' AND binary password='$password'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	if($row){
		if($row['role']=='admin')
		{
			$_SESSION['admin']=$username;
			echo '<script>window.location.href="admin/home.php"</script>';
		}
		else if($row['role']=='doctor')
		{
			$_SESSION['doctor']=$username;
			echo '<script>window.location.href="doctor/home.php"</script>';
		}
		else if($row['role']=='patient')
		{
			$_SESSION['patient']=$username;
			echo '<script>window.location.href="patient/home.php"</script>';
		}
		
		
	}
	else{
		echo '<script>alert("Invalid username or password")</script>';	
	}
}
if(isset($_POST['register'])) {
  $name = $_POST['name'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  
  $check_sql = "SELECT * FROM users WHERE username = '$username'";
  $check_result = mysqli_query($con, $check_sql);
  
  if(mysqli_num_rows($check_result) > 0) {
      echo '<script>alert("Username already exists. Please choose another.")</script>';
  } else {
      $sql = "INSERT INTO users VALUES('', '$name', '$username', '$password', 'patient')";
      $result = mysqli_query($con, $sql);
      
      if($result) {
          echo '<script>alert("Account created successfully")</script>';
      } else {
          echo '<script>alert("Sorry, try again later")</script>';    
      }
  }
}

?>