<style>
   .container {

      height: auto;

      padding: 20px;
      background: #ffffff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 1);
      border-radius: 1em;
      margin-top: 10;
   }

   h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
   }

   form {
      display: grid;
      gap: 20px;
   }

   .form-group {
      display: flex;
      flex-direction: column;
   }

   label {
      font-weight: bold;
      margin-bottom: 8px;
      color: #555;
   }

   input[type="text"],
   input[type="password"],
   input[type="file"],
   select,
   textarea {
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 14px;
      color: #333;
      border: 1px solid #ccc;
      border-radius: 35px;
      transition: all 0.3s ease-in-out;
      background-color: #f9f9f9;

   }

   input[type="date"],
   input[type="time"] {
      cursor: pointer;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 14px;
      color: #333;
      border: 1px solid #ccc;
      border-radius: 35px;
      transition: all 0.3s ease-in-out;
      background-color: #f9f9f9;
   }

   select,
   input,
   textarea {
      width: 100%;
   }

   textarea {
      height: 120px;

   }

   .add-btn {
      padding: 12px 20px;
      background-color: #4CAF50;
      color: #fff;
      font-size: 16px;
      cursor: pointer;
      margin-bottom: 1rem;
      width: 13em;
      position: relative;
      left: 35%;
      border: 1px solid #ccc;
      border-radius: 35px;
      transition: all 0.3s ease-in-out;
   }

   .add-btn:hover {
      background-color: rgb(8, 245, 8);
      font-size: medium;
      transition: all 1s ease;
      color: black;
      font-weight: bold;
   }
</style>

<?php
include 'header.php';
include 'navbar.php';
?>
<main class="main-content">
   <div class="page-header">
      <h1>Update Appointment</h1>
   </div>
   <div class="container">
      <form method="post">
         <div class="form-group">
            <label>Date</label>
            <input type="date" name="date" min="2025-05-11" value="2025-05-12" required />
         </div>
         <div class="form-group">
            <label>Time</label>
            <input type="time" name="time" value="10:00" required />
         </div>
         <div class="form-group">
            <label>Status</label>
            <select name="status" required>
               <option value="Accept" selected>Accept</option>
               <option value="Reject">Reject</option>
               <option value="Reschedule">Reschedule</option>
            </select>
         </div>

         <button type="submit" class="add-btn">Update</button>
      </form>
   </div>
</main>