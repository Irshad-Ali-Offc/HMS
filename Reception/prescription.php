<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Prescriptions</title>
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


    }

    h2 {
      text-align: center;

    }


    .btn {
      background-color: #2ecc71;
      color: white;
      padding: 6px 10px;
      text-decoration: none;
      border-radius: 4px;
      margin-right: 5px;
      font-size: 14px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th,
    td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f8f9fa;
      color: #333;
      font-weight: bold;
    }

    tr:hover {
      background-color: #f5f5f5;
    }
  </style>
</head>

<body>
  <?php include 'header.php';
  include 'navbar.php';

  ?>
  <main class="main-content">
    <div class="page-header">
      <h1>Recent Prescriptions</h1>
    </div>
    <div class="container">
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Patient</th>
            <th>Doctor</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
            $sql="SELECT 
            p.id AS prescription_id,
            u_patient.name AS patient_name,
            u_doctor.name AS doctor_name,
            p.date AS prescription_date, 
            appointment_id
            FROM 
                prescription p
            JOIN 
                patient pt ON p.patient_id = pt.id
            JOIN 
                users u_patient ON pt.user_id = u_patient.id
            JOIN 
                doctor d ON p.doctor_id = d.id
            JOIN 
                users u_doctor ON d.user_id = u_doctor.id";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_array($result)){
            ?>
          <tr>
            <td><?php echo $i++;?></td>
            <td><?php echo $row['patient_name'];?></td>
            <td><?php echo $row['doctor_name'];?></td>
            <td><?php echo date('d M Y',strtotime($row['prescription_date']));?></td>
            <td>
              <a href="view_prescription.php?id=<?php echo $row['appointment_id'];?>" class="btn">View</a>
            </td>
          </tr>
    <?php } ?>
        </tbody>
      </table>
    </div>
  </main>
</body>

</html>