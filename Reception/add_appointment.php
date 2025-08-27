<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Appointment</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f7f8;
      padding: 20px;
    }

    .form-container {
  background-color: #fff;
  padding: 25px;
  border-radius: 12px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
  max-width: 1200px;
  margin-top: 1px;
  margin-left: -17px;

    }

    .form-container h2 {
      margin-bottom: 20px;
      text-align: center;
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="date"],
    input[type="time"],
    textarea,
    select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      margin-top: 20px;
      width: 100%;
      background-color: #28a745;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      max-width: 200px;
      border-radius: 23px;
      cursor: pointer;
      
    }

    button:hover {
        background-color: #45a049;
  transform: scale(1.05);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.9);
    font-size: bold;
    }
  </style>
</head>
<body>
    <?php 
    include 'header.php';
    include 'navbar.php';
    ?>
<main class="main-content">
   <div class="page-header">
            <h1>Make an Appointment</h1>
        </div>
  <div class="form-container">
    <form action="" method="POST">
      
       <label>Department</label>
                  <select name="department" id="department" required>
                    <option value="" disabled selected>Select a department</option>
                      <?php
                      $sql="select * from department";
                      $result=mysqli_query($con,$sql);
                      while($row=mysqli_fetch_array($result)){
                      ?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['dep_name'];?></option>
                      <?php } ?>
                  </select>
                   <label>Doctor</label>
                  <select name="doctor" id="doctor" required>
                    <option value="" disabled selected>Select a doctor</option>
                  </select>
        <label>Patient</label>
                  <select name="patient" id="patient" required>
                    <option value="" disabled selected>Select a patient</option>
                      <?php
                      $sql="select users.name, patient.id from patient INNER JOIN users on users.id=patient.user_id";
                      $result=mysqli_query($con,$sql);
                      while($row=mysqli_fetch_array($result)){
                      ?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                      <?php } ?>
                  </select>
            <input type="text" name="name" id="name" value="" hidden placeholder="Patient Name">
           <label for="date">Appointment Date:</label>
<input type="date" id="date" name="date" 
       min="<?php echo date('Y-m-d'); ?>" required 
       onclick="this.showPicker()" onfocus="this.showPicker()">

            <label for="time">Appointment Time:</label>
            <input type="time" id="time" name="time" min="09:00" max="18:00" required   onclick="this.showPicker()" onfocus="this.showPicker()">
            <label for="fee">Consultation Fee:</label>
        <input type="text" name="fee" id="fee" value="" readonly placeholder="Consultation Fee">

      <button type="submit" name="submit">Send Now</button>
    </form>
  </div>
  </main>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $doctor=$_POST['doctor']; 
    $patient=$_POST['patient']; 
    $name=$_POST['name']; 
    $date=$_POST['date']; 
    $time=$_POST['time']; 
    $fee=$_POST['fee']; 
    $added=date('Y-m-d');
    $sql="insert into appointment values('','$doctor','$patient','$name','$added','$date','$time','$fee','','Complete','Pending')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>window.location.href="appointment.php"
				alert("Appointment sent successfully")</script>';
	}
	else{
		echo '<script>alert("Sorry try again later")</script>';	
	}
}
?>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#department').on('change', function(){
        var department = $(this).val();
        if(department){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'department='+department,
                success:function(html){
                    $('#doctor').html(html);
                }
            });
        }else{
            $('#doctor').html('<option value="" disabled selected>Select a doctor</option>');
        }
    });
    $('#doctor').on('change', function(){
    var doctor = $(this).val();
    if(doctor){
        $.ajax({
            type:'POST',
            url:'ajaxData.php',
            data:{doctor: doctor},
            success:function(fee){
                $('#fee').val(fee); // ← set input value
            }
        });
    }else{
        $('#fee').val(''); // ← clear fee if no doctor selected
    }
});
$('#patient').on('change', function(){
    var patient = $(this).val();
    if(patient){
        $.ajax({
            type:'POST',
            url:'ajaxData.php',
            data:{patient: patient},
            success:function(name){
                $('#name').val(name); // ← set input value
            }
        });
    }else{
        $('#name').val(''); // ← clear fee if no doctor selected
    }
});
    
});
</script>