<style>
    .register-form {
  background-color: #fff;
  padding: 25px;
  border-radius: 12px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
  max-width: 1200px;
  margin-top: 20px;
  margin-left: 1px;
}

.register-form h2{
  text-align: center;
  
}
.register-form .form-group {
  margin-bottom: 15px;
}

.register-form label {
  display: block;
  font-weight: 500;
  margin-bottom: 6px;
  color: #333;
}

.register-form input,
.register-form select,
.register-form textarea {
  width: 100%;
  padding: 10px 12px;
  font-size: 15px;
  border: 1px solid #ccc;
  border-radius: 6px;
  transition: 0.3s;
}

.register-form input:focus,
.register-form select:focus,
.register-form textarea:focus {
  border-color: #2f4050;
  outline: none;
  box-shadow: 0 0 3px rgba(47, 64, 80, 0.3);
}

.register-form button {
  background-color: #2f4050;
  color: #fff;
  border: none;
  padding: 12px 20px;
  font-size: 16px;
  border-radius: 6px;
  cursor: pointer;
  transition: 0.3s;
  margin-top: 10px;
}

.register-form button:hover {
  background-color: #1a252f;
}  
  </style>
  
<?php 
include 'navbar.php';
include 'header.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
</head>
<body>
  
</body>
</html>
<div class="main-content">
    <div class="page-header">
            <h1>Patient Registration</h1>
        </div>
  
  <form class="register-form">
    <div class="form-group">
      <label for="fullname">Full Name</label>
      <input type="text" id="fullname" name="fullname" placeholder="Enter full name" 
       pattern="[A-Za-z ]+" 
       title="Only letters and spaces are allowed" 
       required>

    </div>

    <div class="form-group">
      <label for="CNIC">CNIC</label>
      <input type="text" id="cnic" name="cnic" placeholder="e.g. 45105-2121213-6" 
       pattern="[0-9]{5}-[0-9]{7}-[0-9]{1}" 
       title="CNIC must be in the format 45105-2121213-6" 
       required>

    </div>
    <div class="form-group">
      <label for="gender">Gender</label>
      <select id="gender" name="gender" required>
        <option value="">Select gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>
    </div>

    <div class="form-group">
      <label for="dob">Date of Birth</label>
      <input type="date" id="dob" name="dob" required>
    </div>


    <div class="form-group">
      <label for="contact">Contact Number</label>
      <input type="tel" id="contact" name="contact" placeholder="e.g. 03001234567" pattern="\d{11}" maxlength="11" required>


    </div>

    <div class="form-group">
      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" placeholder="e.g. example@gmail.com" required>
    </div>

    <div class="form-group">
      <label for="address">Full Address</label>
      <textarea id="address" name="address" rows="3" placeholder="Street, City, Zip Code" required></textarea>
    </div>

   
    <button type="submit">Register Patient</button>
  </form>
</div>
