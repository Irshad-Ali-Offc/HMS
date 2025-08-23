<?php
include 'header.php';
include 'navbar.php';

if (isset($_GET['id'])) {
    $appointment_id = $_GET['id'];

    $sql = "SELECT 
        p.id AS prescription_id,
        p.vitals,
        p.lab_investigation,
        p.notes,
        p.prescription,
        p.date AS prescription_date,
        
        u_patient.name AS patient_name,
        pt.dob, pt.gender, pt.cnic, pt.address, pt.contact, pt.email,
        
        u_doctor.name AS doctor_name,
        d.specialization,
        d.qualification,
        d.experience,
        d.contact AS doctor_contact
        
    FROM prescription p
    JOIN patient pt ON p.patient_id = pt.id
    JOIN users u_patient ON pt.user_id = u_patient.id
    JOIN doctor d ON p.doctor_id = d.id
    JOIN users u_doctor ON d.user_id = u_doctor.id
    WHERE p.appointment_id = '$appointment_id'";

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Prescription</title>
</head>

<body>
  <main class="main-content" id="print_data">
<style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f6f8;
      padding: 20px;
    }

    .container {
      background-color: #fff;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
      max-width: 1200px;
      margin-left: -15px;
        margin-bottom: 20px;
    }
      .text-center{
          text-align: center;
      }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .btn {
      background-color: #3498db;
      color: white;
      padding: 6px 12px;
      text-decoration: none;
      border-radius: 4px;
      font-size: 14px;
      margin-bottom: 15px;
      display: inline-block;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }

    th, td {
      padding: 10px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
      vertical-align: top;
    }

    th {
      background-color: #f8f9fa;
      color: #333;
      font-weight: bold;
      width: 200px;
    }

    .section-title {
      font-size: 18px;
      margin-top: 30px;
      margin-bottom: 10px;
      font-weight: bold;
      color: #2c3e50;
      border-bottom: 1px solid #ddd;
      padding-bottom: 5px;
    }

    .notes-box {
      background: #fcfcfc;
      border: 1px solid #ccc;
      padding: 10px;
      white-space: pre-wrap;
    }

    @media print {
      .btn {
        display: none;
      }
    }
  </style>
    <div class="page-header">
      <h1>Prescription Details</h1>
    </div>
    <div class="container">
      <div class="section-title">Doctor Information</div>
      <table>
        <tr><th>Name</th><td><?php echo $row['doctor_name']; ?></td></tr>
        <tr><th>Specialization</th><td><?php echo $row['specialization']; ?></td></tr>
        <tr><th>Qualification</th><td><?php echo $row['qualification']; ?></td></tr>
        <tr><th>Experience</th><td><?php echo $row['experience']; ?> years</td></tr>
        <tr><th>Contact</th><td><?php echo $row['doctor_contact']; ?></td></tr>
      </table>

      <div class="section-title">Patient Information</div>
      <table>
        <tr><th>Name</th><td><?php echo $row['patient_name']; ?></td></tr>
        <tr><th>Gender</th><td><?php echo $row['gender']; ?></td></tr>
        <tr><th>DOB</th><td><?php echo $row['dob']; ?></td></tr>
        <tr><th>CNIC</th><td><?php echo $row['cnic']; ?></td></tr>
        <tr><th>Address</th><td><?php echo $row['address']; ?></td></tr>
        <tr><th>Contact</th><td><?php echo $row['contact']; ?></td></tr>
        <tr><th>Email</th><td><?php echo $row['email']; ?></td></tr>
      </table>

      <div class="section-title">Prescription Information</div>
      <table>
        <tr><th>Date</th><td><?php echo $row['prescription_date']; ?></td></tr>
        <tr><th>Vitals</th><td><div class="notes-box"><?php echo $row['vitals']; ?></div></td></tr>
        <tr><th>Lab Investigation</th><td><div class="notes-box"><?php echo $row['lab_investigation']; ?></div></td></tr>
        <tr><th>Notes</th><td><div class="notes-box"><?php echo $row['notes']; ?></div></td></tr>
        <tr><th>Prescription</th><td><div class="notes-box"><?php echo $row['prescription']; ?></div></td></tr>
      </table>

    </div>
      
      
  </main>
    <div class="text-center">
          <a href="#" class="btn" onClick="printdata('print_data')">🖨️ Print Prescription</a>
      </div>
</body>
</html>
<script>
function printdata(e1){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(e1).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML=restorepage;
}

</script>