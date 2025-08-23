<?php
include 'dbc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>




    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #b4b5b6;
            background-size: cover;
            background-repeat: no-repeat;
            transition: background-image 3s ease-in;
            display: flex;



        }

        .logo {
            height: 8rem;
            width: 8rem;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .logo img {
            max-width: 100%;
            max-height: 100%;
            display: block;
        }

        .login-container {
            max-width: 400px;
            border: 3px solid white;
            margin: 100px auto;
            padding: 20px;
            background-color: rgb(186, 213, 243);
            border-radius: 10px;
            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.5);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333333;

        }

        .form-control {
            border-radius: 5px;
        }

        .form-label {
            font-weight: bold;

        }

        .btn-login {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            color: #ffffff;
            background-color: #0b1c3b;
            color: white;
            transition: transform 0.6s ease;

        }

        .btn-login:hover {
            background-color: #45a049;
            transform: scale(0.9);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 1.2);
            color: white;
            font-weight: bold;
        }

        .signup-link {
            text-align: center;
            margin-top: 15px;
        }

        .signup-link a {
            color: #28a745;
            text-decoration: none;
            font-weight: bold;
        }

        .signup-link a:hover {

            color: blue;

        }
    </style>
</head>

<body>
    <div class="logo">
        <img src="image/logo.png" alt="">
    </div>
    <div class="container">
        <div class="login-container">
            <h2>Reset Password</h2>
            <form method="post">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Enter your password" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password" name="confirm_password"
                        placeholder="Enter your confirm password" required>
                </div>
                <button type="submit" class="btn btn-login mt-3" name="submit">Reset</button>

                <div class="signup-link">
                    <p>Already have an account? <a href="index.php">Sign In</a></p>
                </div>
            </form>
        </div>
    </div>


    <script>

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


        function preloadImages() {
            for (let i = 0; i < images.length; i++) {
                preloadedImages[i] = new Image();
                preloadedImages[i].src = images[i];
            }
        }


        function changeBackground() {
            document.body.style.backgroundImage = `url('${images[currentImageIndex]}')`;
            currentImageIndex = (currentImageIndex + 1) % images.length;
        }


        preloadImages();


        setTimeout(() => {
            setInterval(changeBackground, 6000);
            changeBackground();
        }, 500); 
    </script>


</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $confirm_password = $_POST['confirm_password'];
    $password = $_POST['password'];
    if($password==$confirm_password){
       $sql = "update users set password='$password' where username='".$_SESSION['username']."'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            unset($_SESSION['username']);
            echo '<script>window.location.href="index.php"
                alert("Password updated successfully")</script>';
        } else {
            echo '<script>alert("Sorry, try again later")</script>';
        }
    }
    else{
        echo '<script>alert("Confirm password does not match")</script>';
    }
}
?>