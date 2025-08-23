<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Discharge</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        .page-header {
            margin-bottom: 30px;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }

        .page-header h1 {
            color: #2c3e50;
            font-size: 28px;
        }

        .card {
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
        }

        .card-header {
            color: #3498db;
            margin-bottom: 20px;
            font-size: 20px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-row {
            display: flex;
            gap: 20px;
        }

        .form-row .form-group {
            flex: 1;
        }

        .btn {
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




        .table-container {
            overflow-x: auto;
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
    <?php
    include 'header.php';
    include 'navbar.php';
    ?>

    <div class="main-content">
        <div class="page-header">
            <h1>Patient Discharge</h1>
        </div>

        <div class="tab-content" id="discharge">
            <div class="card">
                <form method="post">
                    <div class="form-row">
                        <div class="form-group">
                        <label for="patient">Patient</label>
                        <select id="patient" name="patient" class="form-control" required>
                            <option value="">Select patient</option>
                             <?php
                              $sql="select * from admin_patient where status='admit' order by id DESC";
                              $result=mysqli_query($con,$sql);
                              while($row=mysqli_fetch_array($result)){
                              ?>
                            <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    </div>
                    <div class="form-group">
                            <label for="admission-date">Discharge Date</label>
                            <input type="date" name="discharge_date" id="admission-date" class="form-control" required>
                        </div>

                    <div class="form-group">
                        <label for="discharge-status">Discharge Status</label>
                        <select name="discharge_status" id="discharge-status" class="form-control" required>
                            <option value="">Select discharge status</option>
                            <option value="recovered">Recovered</option>
                            <option value="referred">Referred</option>
                            <option value="ama">Against Medical Advice</option>
                            <option value="deceased">Deceased</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="discharge-summary">Discharge Summary</label>
                        <textarea id="discharge-summary" name="summary" class="form-control" rows="4"
                            placeholder="Enter discharge summary"></textarea>
                    </div>

                    <button type="submit" name="submit" class="btn">Discharge Patient</button>
                </form>
            </div>

            <div class="card">
                <div class="card-header">Recent Discharges</div>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Patient ID</th>
                                <th>Name</th>
                                <th>Admission Date</th>
                                <th>Discharge Date</th>
                                <th>Status</th>
                                <th>Doctor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $i=1000;
                              $sql="select * from admin_patient where status='discharge' order by id DESC";
                              $result=mysqli_query($con,$sql);
                              while($row=mysqli_fetch_array($result)){
                              ?>
                            <tr>
                                <td>P<?php echo $i++;?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['admit_date'];?></td>
                                <td><?php echo $row['discharge_date'];?></td>
                                <td><?php echo $row['discharge_status'];?></td>
                                <td><?php echo $row['doctor_name'];?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
if(isset($_POST['submit'])){
    $patient=$_POST['patient'];
    $discharge_date=$_POST['discharge_date'];
    $discharge_status=$_POST['discharge_status'];
    $summary=$_POST['summary'];

    $sql="update admin_patient set discharge_date='$discharge_date', status='discharge', discharge_status='$discharge_status', discharge_summary='$summary' where id='$patient'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>window.location.href="discharge.php"
				alert("Patient discharge successfully")</script>';
	}
	else{
		echo '<script>alert("Sorry try again later")</script>';	
	}
}
?>