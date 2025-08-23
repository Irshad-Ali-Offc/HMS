<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Admit</title>
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
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
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

        .btn:hover {
            background-color: rgb(8, 245, 8);
            font-size: medium;
            transition: all 1s ease;
            color: black;
            font-weight: bold;
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
            <h1>Admit Patients</h1>
        </div>


        <div class="tab-content " id="admission">
            <div class="card">

                <form method="post">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="patient-id">Patient CNIC</label>
                            <input type="text" id="cnic" name="cnic" class="form-control"
                                placeholder="e.g. 45105-2121213-6" pattern="[0-9]{5}-[0-9]{7}-[0-9]{1}"
                                title="CNIC must be in the format 45105-2121213-6" required>

                        </div>
                        <div class="form-group">
                            <label for="patient-name">Patient Name:</label>
                            <input type="text" id="patient-name" name="fullname" class="form-control"
                                placeholder="Enter full name" pattern="[A-Za-z ]+"
                                title="Only letters and spaces are allowed" required>
                        </div>
                        <div class="form-group">
                            <label for="admission-date">Admission Date</label>
                            <input type="date" name="admit_date" id="admission-date" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="ward">Ward/Unit</label>
                            <select id="ward" name="ward" class="form-control" required>
                                <option value="">Select Ward/Unit</option>
                                <option value="general">General Ward</option>
                                <option value="icu">ICU</option>
                                <option value="pediatric">Pediatric Ward</option>
                                <option value="maternity">Maternity Ward</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bed">Bed Number</label>
                            <input type="text" id="bed" name="bed" class="form-control" placeholder="Enter bed number" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="admitting-doctor">Admitting Doctor</label>
                        <input type="text" id="admitting-doctor" name="doctor_name" class="form-control" placeholder="Enter doctor's name"
                            pattern="[A-Za-z ]+" title="Only letters and spaces are allowed" required/>
                    </div>

                    <div class="form-group">
                        <label for="admission-notes">Admission Notes</label>
                        <textarea id="admission-notes" name="notes" class="form-control" rows="4"
                            placeholder="Enter admission notes"></textarea>
                    </div>

                    <button type="submit" name="submit" class="btn">Admit Patient</button>
                </form>
            </div>

            <div class="card">
                <div class="card-header">Current Admissions</div>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Patient ID</th>
                                <th>Name</th>
                                <th>Ward</th>
                                <th>Bed</th>
                                <th>Admission Date</th>
                                <th>Doctor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                          $i=1000;
                          $sql="select * from admin_patient where status='admit' order by id DESC";
                          $result=mysqli_query($con,$sql);
                          while($row=mysqli_fetch_array($result)){
                          ?>
                            <tr>
                                <td>P<?php echo $i++;?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['ward'];?></td>
                                <td><?php echo $row['bed'];?></td>
                                <td><?php echo $row['admit_date'];?></td>
                                <td><?php echo $row['doctor_name'];?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $cnic=$_POST['cnic'];
    $fullname=$_POST['fullname'];
    $admit_date=$_POST['admit_date'];
    $ward=$_POST['ward'];
    $bed=$_POST['bed'];
    $doctor_name=$_POST['doctor_name'];
    $notes=$_POST['notes'];

    $sql="select * from admin_patient where status='admit' AND cnic='$cnic'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
    {
        echo '<script>alert("This patient is already admitted")</script>';
    }
    else{
        $sql="insert into admin_patient values('','$fullname','$cnic','$admit_date','','$ward','$bed','$doctor_name','$notes','admit','','')";
        $result=mysqli_query($con,$sql);
        if($result){
            echo '<script>window.location.href="admit.php"
                    alert("Patient admitted successfully")</script>';
        }
        else{
            echo '<script>alert("Sorry try again later")</script>';	
        }
    }
    
}
?>
<script>
$(document).ready(function() {
    $('#cnic').on('blur', function() {
        var cnic = $(this).val();

        if (cnic !== '') {
            $.ajax({
                url: 'get_patient.php',
                type: 'POST',
                data: { cnic: cnic },
                dataType: 'json',
                success: function(response) {
                    if (response.error) {
                        alert(response.error);
                        $('#patient-name').val('');
                    } else {
                        $('#patient-name').val(response.name);
                    }
                }
            });
        }
    });
});
</script>