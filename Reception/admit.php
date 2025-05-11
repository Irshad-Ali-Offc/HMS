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

        .btn-primary {
            background-color: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2980b9;
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
            <h1>Admit Patients</h1>
        </div>


        <div class="tab-content " id="admission">
            <div class="card">
                
                <form>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="patient-id">Patient CNIC</label>
                            <input type="text" id="patient-id" class="form-control" placeholder="Enter patient CNIC">
                        </div>
                        <div class="form-group">
                            <label for="name">Patient Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="admission-date">Admission Date</label>
                            <input type="date" id="admission-date" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="ward">Ward/Unit</label>
                            <select id="ward" class="form-control">
                                <option value="">Select Ward/Unit</option>
                                <option value="general">General Ward</option>
                                <option value="icu">ICU</option>
                                <option value="pediatric">Pediatric Ward</option>
                                <option value="maternity">Maternity Ward</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bed">Bed Number</label>
                            <input type="text" id="bed" class="form-control" placeholder="Enter bed number">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="admitting-doctor">Admitting Doctor</label>
                        <input type="text" id="admitting-doctor" class="form-control" placeholder="Enter doctor's name">
                    </div>

                    <div class="form-group">
                        <label for="admission-notes">Admission Notes</label>
                        <textarea id="admission-notes" class="form-control" rows="4"
                            placeholder="Enter admission notes"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Admit Patient</button>
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
                            <tr>
                                <td>P10023</td>
                                <td>John Smith</td>
                                <td>General Ward</td>
                                <td>G12</td>
                                <td>2023-05-15</td>
                                <td>Dr. Williams</td>
                            </tr>
                            <tr>
                                <td>P10045</td>
                                <td>Sarah Johnson</td>
                                <td>Maternity</td>
                                <td>M05</td>
                                <td>2023-05-16</td>
                                <td>Dr. Anderson</td>
                            </tr>
                            <tr>
                                <td>P10067</td>
                                <td>Michael Brown</td>
                                <td>ICU</td>
                                <td>ICU03</td>
                                <td>2023-05-17</td>
                                <td>Dr. Roberts</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

</body>

</html>