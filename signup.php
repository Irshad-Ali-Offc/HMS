<?php
include 'dbc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #b4b5b6;
            background-size: cover;
            height: 70vh;
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

        .signup-container {
            max-width: 400px;
            border: 3px solid white;
            margin: 100px auto;
            padding: 20px;
            background-color: rgb(186, 213, 243);
            border-radius: 10px;
            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.5);

        }

        .signup-container h2 {
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

        .btn-signup {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            color: #ffffff;
            background-color: #0b1c3b;
            color: white;
            transition: transform 0.6s ease;

        }

        .btn-signup:hover {
            background-color: #45a049;
            transform: scale(0.9);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 1.2);
            color: white;
            font-weight: bold;
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
        }

        .login-link a {
            color: green;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            color: blue;
        }
    </style>
</head>

<body>
    <div class="logo">
        <img src="image/logo.png" alt="">
    </div>
    <div class="container">
        <div class="signup-container">
            <h2>Sign Up</h2>
            <form method="post">

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"
                        required>
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                        placeholder="Enter your username" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Enter your password" required>
                </div>

                <button type="submit" class="btn btn-signup" name="register">Sign Up</button>

                <div class="login-link">
                    <p>Already have an account? <a href="index.php">Login</a></p>
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
        let loadedImages = [];


        function loadImages() {
            for (let i = 0; i < images.length; i++) {
                loadedImages[i] = new Image();
                loadedImages[i].src = images[i];
            }
        }


        function changeBackground() {
            document.body.style.backgroundImage = `url('${images[currentImageIndex]}')`;
            currentImageIndex = (currentImageIndex + 1) % images.length;
        }


        loadImages();


        setTimeout(() => {
            setInterval(changeBackground, 6000);
            changeBackground();
        }, 500); 
    </script>

</body>

</html>

<?php

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];


    $check_sql = "SELECT * FROM users WHERE username = '$username'";
    $check_result = mysqli_query($con, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        echo '<script>alert("Username already exists. Please choose another.")</script>';
    } else {
        $sql = "INSERT INTO users VALUES('', '$name', '$username', '$password', 'patient')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo '<script>alert("Account created successfully")</script>';
        } else {
            echo '<script>alert("Sorry, try again later")</script>';
        }
    }
}

?>