<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Make an Appointment</title>
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
    }

    button:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>
    <?php 
    include 'header.php';
    include 'navbar.php';
    ?>
<main class="main-content">
  <div class="form-container">
    <h2>Book an Appointment</h2>
    <form action="" method="POST">
      
      <label for="name">Patient Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="dob">Date of Birth:</label>
      <input type="date" id="dob" name="dob" required>

      <label for="gender">Gender:</label>
      <select id="gender" name="gender" required>
        <option value="" disabled selected>Select gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
      </select>

      <label for="contact">Contact Number:</label>
      <input type="text" id="contact" name="contact" required>

      <label for="address">Address:</label>
      <textarea id="address" name="address" rows="3" required></textarea>

      <label for="date">Appointment Date:</label>
      <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" required>

      <label for="time">Appointment Time:</label>
      <input type="time" id="time" name="time" min="09:00" max="18:00" required>

      <button type="submit">Submit Appointment</button>
    </form>
  </div>
  </main>
</body>
</html>
