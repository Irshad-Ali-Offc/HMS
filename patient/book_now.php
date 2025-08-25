<?php
include 'header.php';
$id=$_POST['id'];
$fee=$_POST['fee'];
$sql="select * from patient where user_id='".$patient['id']."'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)<1){
	echo '<script>alert("Please create your profile")
			window.location.href="profile.php"</script>';
}
?>

        
        <main class="main-content">
             
            <section id="profile-section">
            <?php
			$sql="select patient.*, users.name, username, password from patient INNER JOIN users ON users.id=patient.user_id where user_id='".$patient['id']."'";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result);
			?>
                <h2>Get Appointment</h2>
                <form method="post" id="profile-form">
                <input type="hidden" name="id" value="<?php echo $id;?>">
				<label for="fee">Consultation Fee:</label>
                <input type="text" name="fee" value="<?php echo $fee;?> " readonly placeholder="Consultation Fee">
                    <label for="full-name">Patient Name:</label>
                    <input type="text" name="name" value="<?php echo $row['name'];?>" readonly placeholder="Enter full name" required>

                    <label for="dob">Date of Birth:</label>
                    <input type="date" name="dob" value="<?php echo $row['dob'];?>" readonly required>

                    <label for="gender">Gender:</label>
                    <select name="gender" required>
                    <option value="<?php echo $row['gender'];?>" selected><?php echo $row['gender'];?></option>
                  </select>

                    <label for="cnic">CNIC:</label>
                    <input type="text" name="cnic" value="<?php echo $row['cnic'];?>" readonly placeholder="Enter CNIC" required>

                    <label for="address">Address:</label>
                    <textarea name="address" rows="3" required readonly placeholder="Enter address"><?php echo $row['address'];?></textarea>

                    <label>Date:</label>
                    <input type="date" name="date" min="<?php echo date('Y-m-d');?>" required>

                    <label>Time:</label>
                    <input type="time" name="time" min="9:00" max="18:00" required>

                    <button type="submit" name="submit">Appoint Now</button>
                </form>
            </section>
            
        </main>
    </div>


</body>

</html>
<?php
if(isset($_POST['submit'])){
	$id=$_POST['id'];
	$fee=$_POST['fee'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$added_on=date('Y-m-d');
	
	$sql="select * from appointment where doctor_id='$id' AND (date_format(date,'%Y-%m-%d')='$date' AND time='$time')";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0){
		echo '<script>alert("Please select another time this is already scheduled")</script>';
	}
	else{
        
        $amount=$_POST['fee']*100;
        // JazzCash sandbox credentials
        $pp_MerchantID = "MC151306"; // your Merchant ID
        $pp_Password = "zux9c39515"; // your Password
        $pp_IntegritySalt = "0w088w0u3f"; // your Integrity Salt
        $pp_TxnRefNo = 'T' . date('YmdHis'); // unique transaction ID
        $pp_Amount = $amount; // Amount in paisa 
        $pp_TxnDateTime = date('YmdHis');
        $pp_ExpiryDateTime = date('YmdHis', strtotime('+1 hour'));
        $pp_ReturnURL = "http://localhost/final/hms/patient/booking_complete.php"; // Change it accordingly

        $data = array(
            "pp_Version" => "1.1",
            "pp_TxnType" => "MWALLET",
            "pp_Language" => "EN",
            "pp_MerchantID" => $pp_MerchantID,
            "pp_Password" => $pp_Password,
            "pp_TxnRefNo" => $pp_TxnRefNo,
            "pp_Amount" => $pp_Amount,
            "pp_TxnCurrency" => "PKR",
            "pp_TxnDateTime" => $pp_TxnDateTime,
            "pp_BillReference" => "billRef",
            "pp_Description" => "JazzCash Test Transaction",
            "pp_TxnExpiryDateTime" => $pp_ExpiryDateTime,
            "pp_ReturnURL" => $pp_ReturnURL,
            "pp_SecureHash" => "", // to be calculated
            "ppmpf_1" => "NA",
            "ppmpf_2" => "NA",
            "ppmpf_3" => "NA",
            "ppmpf_4" => "NA",
            "ppmpf_5" => "NA"
        );

        // Create a secure hash
        $sortedKeys = array_keys($data);
        sort($sortedKeys);
        $hashString = '';
        foreach ($sortedKeys as $key) {
            $hashString .= '&' . $data[$key];
        }
        $hashString = $pp_IntegritySalt . $hashString;
        $data["pp_SecureHash"] = hash_hmac('sha256', $hashString, $pp_IntegritySalt);

        // Send form to JazzCash payment gateway
        echo '<form id="myForm" method="post" action="https://sandbox.jazzcash.com.pk/CustomerPortal/transactionmanagement/merchantform" name="paymentForm">';
        foreach ($data as $key => $value) {
            echo '<input type="hidden" name="' . $key . '" value="' . $value . '">';
        }
        echo '</form>';

        $sql="insert into appointment values('','$id','".$patient['id']."','".$patient['name']."','$added_on','$date','$time','$fee','','Pending','Pending')";
        $result=mysqli_query($con,$sql);
        if($result){
            echo '<script>document.getElementById("myForm").submit();</script>';	
        }
        else{
            echo "<script>alert('Sorry, try again later')</script>";
        }
        
	}
}
?>