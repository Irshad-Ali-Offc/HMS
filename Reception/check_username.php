<?php
include '../dbc.php';
if(isset($_POST['username'])){
    $username = $_POST['username'];
    $result = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
    echo mysqli_num_rows($result) > 0 ? 'taken' : 'available';
}
?>