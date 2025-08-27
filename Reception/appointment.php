<?php ob_start(); ?>
<style>
  .hidden {
    display: none;
  }

  #appointments-section {
    padding: 20px;
    font-family: Arial, sans-serif;
    max-width: 1700px;

  }

  .appointments-container {
    height: auto;
    margin: 20px auto;
    padding: 20px;
    background: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 1);
    margin-top: 0;
    border-radius: 1em;
  }

  #add-appointment {
    background-color: green;
    height: auto;
    width: 160px;
    color: white;
    font-size: bold;
    cursor: pointer;
    padding: 14px;
    border-radius: 24px;
    margin-left: 10rem;
    margin-top: 1em;

  }

  .search-container {
    position: relative;
    width: 23%;
    margin: 12px auto;
    display: flex;
    float: left;
    margin-left: 4em;
    align-items: center;
  }

  #search-input {
    width: 100%;
    padding: 12px 40px 12px 20px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 25px;
    background-color: #f9f9f9;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 1);

    height: 2rem;
  }

  #search-input:focus {
    border: 2px solid #007bff;
    ;
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.2);
  }

  .search-btn {
    position: absolute;
    height: auto;
    right: 0;
    padding: 0.6rem;
    background-color: transparent;
    border: none;
    color: #007bff;
    font-size: 16px;
    cursor: pointer;
  }

  .search-btn i {
    transition: color 0.3s ease;

  }

  .search-btn:hover {
    background-color: transparent;
  }

  .search-btn:hover i {
    color: red;
  }

  .appointments-table {
    width: 90%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #0b1c3b;
    color: white;
    margin: 3rem;

    box-shadow: 0 4px 8px rgba(0, 0, 0, 2);

    font-size: small;
  }

  .appointments-table th,
  .appointments-table td {
    border: 1px solid white;
    text-align: center;
    padding: 8px;
  }

  .appointments-table th {
    background-color: #007bff;
  }

  .appointments-table td:nth-child(1),
  .appointments-table th:nth-child(1) {
    width: 6rem;
  }

  .appointments-table td:nth-child(5),
  .appointments-table th:nth-child(5) {
    width: 18rem;
  }

  .action-btn {
    display: block;
    background-color: #4caf50;
    width: 6rem;
    color: white;
    float: left;
    padding: 0.4em;
    margin-right: 1rem;
    margin-left: 1rem;
    cursor: pointer;
    border-radius: 3em;

  }

  .action-btn:hover {
    background-color: red;
    color: white;
    font-size: medium;
    transition: all 1s ease;
  }

  .update-btn {
    background-color: #4caf50;
    width: 6rem;
    color: white;
    float: left;
    padding: 0.4em;
    cursor: pointer;
    border-radius: 3em;

  }

  .delete-btn {
    background-color: #c0392b;
    width: 6rem;
    color: white;
    float: left;
    padding: 0.4em;
    cursor: pointer;
    border-radius: 3em;

  }

  .history-btn {
    background-color: #007BFF;
    width: 6rem;
    color: white;
    float: left;
    padding: 0.4em;
    cursor: pointer;
    border-radius: 3em;
  }

  #add-appointment-btn {
    width: 11rem;
    margin: 10px auto;
    margin-left: 3rem;
    margin-top: 1.3rem;
  }

  @media (max-width: 768px) {
    .appointments-container {
      width: 90vw;
      padding: 15px;
    }

    .search-container {
      width: 60%;
      margin-left: 1.5em;
    }

    #search-input {
      font-size: 12px;
      padding: 8px 25px 8px 10px;
    }

    .appointments-table {
      margin-left: 1rem;
      margin-right: 1rem;
      font-size: 12px;
    }

    #add-appointment-btn {
      width: 9rem;
      margin-left: 1.5rem;
    }

    .action-btn {
      width: 7rem;
    }
  }

  @media (max-width: 480px) {
    .appointments-container {
      padding: 10px;
    }

    .search-container {
      width: 80%;
      margin-left: 0;
    }

    #search-input {
      font-size: 12px;
      padding: 8px 20px 8px 10px;
    }

    .appointments-table {
      margin-left: 0;
      margin-right: 0;
      font-size: 10px;
    }

    #add-appointment-btn {
      width: 8rem;
      margin-left: 0;
    }

    .action-btn {
      width: 6rem;
    }
  }
</style>

<?php
include 'header.php';
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appointments</title>
</head>

<body>

</body>

</html>
<main class="main-content">
  <div class="page-header">
    <h1>Appointments</h1>
  </div>
  <form method="post">
    <section id="appointments-section">
      <div class="appointments-container">

        <div class="search-container">
          <input type="text" name="keyword" id="search-input" placeholder="Search appointment..." required />
          <button type="submit" name="search" id="search-btn" class="search-btn">
            <i class="fa fa-search"></i>
          </button>
        </div>
  </form>

  <a href="add_appointment.php">
    <button type="button" id="add-appointment" class="add-appointment">
      Add Appointment
    </button>
  </a>
  <table class="appointments-table">
    <thead>
      <tr>
        <th>Sr.</th>
        <th>Doctor</th>
        <th>Patient</th>
        <th>Date & Time</th>
        <th style="width:20%;">Fee | Status</th>
        <th>Address</th>
        <th>Status</th>
        <th style="width:25%;">Actions</th>
      </tr>
    </thead>
    <tbody id="appointments-body">
                  <?php
				  $i=1;
				  if(isset($_POST['search'])){
					  $keyword=$_POST['keyword'];
					  $sql="select appointment.*, users.name as doctor_name, address from appointment INNER JOIN users on users.id=appointment.doctor_id INNER JOIN patient on appointment.patient_id=patient.id where users.name  LIKE '%$keyword%' OR patient_name LIKE '%$keyword%' OR fee LIKE '%$keyword%' OR status LIKE '%$keyword%' OR pay_status LIKE '%$keyword%'";
				  }
				  else{
				  $sql="select appointment.*, users.name as doctor_name, address from appointment INNER JOIN users on users.id=appointment.doctor_id INNER JOIN patient on appointment.patient_id=patient.id ORDER BY appointment.id DESC";
 				  }
				  $result=mysqli_query($con,$sql);
				  if(mysqli_num_rows($result)>0){
				  while($row=mysqli_fetch_array($result)){
				  ?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['doctor_name'];?></td>
                    <td><?php echo $row['patient_name'];?></td>
                    <td><?php echo date('d M Y',strtotime($row['date']));?> <?php echo date('h:i A',strtotime($row['time']));?></td>
                    <td><?php echo number_format($row['fee']);?> | <?php echo $row['pay_status'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td>
                    <a href="update_appointment.php?id=<?php echo $row['id'];?>"><button type="button" class="update-btn">Update</button></a>
                    <a href="delete_appointment.php?id=<?php echo $row['id'];?>" onclick="return confirm('Do you want to delete?');"><button type="button" class="delete-btn">Delete</button></a>
                    </td>
                </tr>
                <?php } } else{ ?>
                <tr>
                    <td colspan="8">No record found</td>
                </tr>   
                <?php } ?>
            </tbody>
  </table>
  </section>
</main>
</body>

</html>
<?php ob_end_flush(); ?>
