<?php
if(isset($_POST['add_to_cart'])){
  include_once "add_to_cart.php";  
}
else if(isset($_POST['save']))
{
    include "../dbc.php";
    $name=$_POST['name'];
    $age=$_POST['age'];
    $contact=$_POST['contact'];
    $doctor_name=$_POST['doctor_name'];
    $instructions=$_POST['instructions'];
    $discount_type=$_POST['discount_type'];
    $discount_value=$_POST['discount_value'];
    $payment_method=$_POST['payment_method'];
    $total=$_POST['calculated_total'];
    $date=date('Y-m-d');
    $sql="insert into billing values('','$name','$age','$contact','$doctor_name','$instructions','$discount_type','$discount_value','$payment_method','$date','$total')";
    $result=mysqli_query($con,$sql);
    $bill_id=mysqli_insert_id($con);
    foreach($_SESSION['shopping_cart'] as $keys => $values)
	{
		mysqli_query($con,"insert into billing_detail values('','$bill_id','".$values['item_id']."','".$values['item_name']."','".$values['price']."','".$values['qty']."')");
        $sql="select * from medication where id='".$values['item_id']."'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_array($result);
        $available=$row['quantity']-$values['qty'];
        $sql="update medication set quantity='$available' where id='".$values['item_id']."'";
        $result=mysqli_query($con,$sql);
	}
    unset($_SESSION['shopping_cart']);
    if($result)
    {
        echo '<script>window.location.href="billing.php"
        alert("Billing added successfully")</script>';
    }
    else{
        echo '<script>alert("Sorry try again later")</script>';
    }
}
?>