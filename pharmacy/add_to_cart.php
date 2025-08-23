<?php
include_once "../dbc.php";
if(isset($_POST['add_to_cart'])){
    $id=$_POST['medication'];
    $sql = "SELECT id, name, dosage, price FROM medication WHERE id = '$id'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result);
	if(isset($_SESSION['shopping_cart']))
	{
		$item_array_id= array_column($_SESSION['shopping_cart'], 'item_id');
		if(!in_array($_POST['medication'], $item_array_id))
		{
			$count = count($_SESSION['shopping_cart']);
			$item_array = array(
			'item_id'	=> $_POST['medication'],
            'item_name'	=> $row['name'],
            'dosage'	=> $row['dosage'],
            'price'	=> $row['price'],
            'qty'	=> $_POST['qty']
			);
			$_SESSION['shopping_cart'][$count] = $item_array;
			echo "<script>window.location.href='add_billing.php'</script>";
		}
		else
		{
			echo "<script>window.location.href='add_billing.php'</script>";
		}
	}
	else
	{
		$item_array = array(
		'item_id'	=> $_POST['medication'],
		'item_name'	=> $row['name'],
        'dosage'	=> $row['dosage'],
		'price'	=> $row['price'],
		'qty'	=> $_POST['qty']
		);
		$_SESSION['shopping_cart'][0] = $item_array;
		echo "<script>window.location.href='add_billing.php'</script>";
	}
}
if(isset($_GET['action']))
{
	if($_GET['action']== 'delete')
	{
		foreach($_SESSION['shopping_cart'] as $keys => $values)
		{
			if($values['item_id'] == $_GET['id'])
			{
				unset($_SESSION['shopping_cart'][$keys]);
				echo "<script>window.location.href='add_billing.php'</script>";
			}
		}
	}
}
?>