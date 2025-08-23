 <?php 
 include 'header.php';
$id=$_REQUEST['id'];
$sql="delete from medication where id='$id'";
$result=mysqli_query($con,$sql);
if($result)
    {
        echo '<script>window.location.href="inventory.php"
        alert("Medication deleted successfully")</script>';
    }
    else{
        echo '<script>alert("Sorry try again later")</script>';
    }
?>