<?php
include_once "../dbc.php";
if(!isset($_SESSION['receptionist']))
{
    echo '<script>window.location.href="../index.php";</script>';
}
$sql="select * from users where username='".$_SESSION['receptionist']."'";
$result=mysqli_query($con,$sql);
$receptionist=mysqli_fetch_array($result);
?>
<link rel="stylesheet" href="../css/Reception/reception.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .background img {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 35em; 
  height: 35em;
  opacity: 0.3; 
  pointer-events: none; 
  

}
    </style>
</head>
<body>
     <div class="background">
        <img src="../image/watermark.png" alt="Watermark">
    </div>
</body>
</html>