<?php
include 'dbc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="/js/imagechanging.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
           body {
            background-color: #b4b5b6;
            background-image: url('/image/bgimg3.png');
            height: 100vh;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            transition: background-image 1s ease-in;
           }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333333;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-login {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            color: #ffffff;
            background-color: #0b1c3b;
            color: white;
        }
        .btn-login:hover {
            background-color: #45a049;
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 1.2);
            color: white;
        }
    
        .signup-link {
            text-align: center;
            margin-top: 15px;
        }
        .signup-link a {
            color: #28a745;
            text-decoration: none;
        }
        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="login-container">
        <h2>Login</h2>
        <form method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-login" name="login" >Login</button>
            
            <div class="signup-link">
                <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script>
    // Array of background image URLs
    const images = [
        'image/bgimg3.png', 
        'image/bgimg2.png',
        'image/bgimg4.png',
        'image/bgimg1.png',
        'image/bgimg3.png', 
        'image/bgimg4.png',
        'image/bgimg3.png',
        'image/bgimg2.png'
    ];

    let currentImageIndex = 0;
    let preloadedImages = [];

    // Preload images to avoid delay
    function preloadImages() {
        for (let i = 0; i < images.length; i++) {
            preloadedImages[i] = new Image();
            preloadedImages[i].src = images[i];
        }
    }

    // Function to change the background image
    function changeBackground() {
        document.body.style.backgroundImage = `url('${images[currentImageIndex]}')`;
        currentImageIndex = (currentImageIndex + 1) % images.length;
    }

    // Preload images first
    preloadImages();

    // Start background change after images are preloaded
    setTimeout(() => {
        setInterval(changeBackground, 6000);
        changeBackground(); // Set the initial background image
    }, 500); // Small delay to allow preloading
</script>


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

?>