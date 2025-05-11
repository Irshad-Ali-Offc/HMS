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
      
      <label for="cnic">CNIC:</label>
      <input type="text" id="cnic" name="cnic" placeholder="fetch using cnic "required>
      <label for="name">Patient Name:</label>
      <input type="text" id="name" name="name" required>
      
       <label>Department</label>
                  <select name="department" id="department" required>
                    <option value="" disabled selected>Select a department</option>
                    <option value="1">Cardiology</option>
                    <option value="2">Neurology</option>
                  </select>
                   <label>Doctor</label>
                  <select name="doctor" id="doctor" required>
                    <option value="" disabled selected>Select a doctor</option>
                    <option value="1">Dr. Ahmed</option>
                    <option value="2">Dr. Sana</option>
                  </select>
            <label for="date">Appointment Date:</label>
            <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" required>
      
            <label for="time">Appointment Time:</label>
            <input type="time" id="time" name="time" min="09:00" max="18:00" required>
            <label for="fee">Consultation Fee:</label>
        <input type="text" name="fee" value="1000" readonly placeholder="Consultation Fee">

      <button type="submit">Pay Now</button>
    </form>
  </div>
  </main>
</body>
</html>
