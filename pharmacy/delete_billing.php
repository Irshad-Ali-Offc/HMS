 <?php 
 include 'header.php';
$id=$_REQUEST['id'];
$sql="delete from billing_detail where bill_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from billing where id='$id'";
$result=mysqli_query($con,$sql);
if($result)
    {
        echo '<script>window.location.href="billing.php"
        alert("Billing deleted successfully")</script>';
    }
    else{
        echo '<script>alert("Sorry try again later")</script>';
    }
?>