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
    .btn{
      cursor:pointer;
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
          <tr>
            <td>1</td>
            <td>Ali Khan</td>
            <td>Dr. Ahmad</td>
            <td>08-May-2025</td>
            <td>
              <a href="view_prescription.php" class="btn">View</a>
              <a href="" class="btn" target="_blank">Print</a>
                 <a class="btn" >cancel</>
              <a class="btn" >complete</a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Sara Malik</td>
            <td>Dr. Ayesha</td>
            <td>07-May-2025</td>
            <td>
              <a href="view_prescription.php" class="btn">View</a>
              <a  class="btn" >Print</a>
              <a  class="btn" >cancel</a>
              <a  class="btn" >complete</a>
              
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</body>

</html>