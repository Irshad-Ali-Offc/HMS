<?php
include_once "../dbc.php";
if(!isset($_SESSION['pharmacist']))
{
    header('location:../index.php');
}
$sql="select * from users where username='".$_SESSION['pharmacist']."'";
$result=mysqli_query($con,$sql);
$pharmacist=mysqli_fetch_array($result);
?>
<link rel="stylesheet" href="../css/pharmacy/pharmacy.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<style>
        .background img {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 35em; 
  height: 35em;
  opacity: 0.1; 
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