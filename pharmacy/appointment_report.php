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
        margin-top:40px;
        margin-bottom:40px;


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
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #2c3e50;
        }
        
        select, input {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        
        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
            font-size: 16px;
            margin-right: 10px;
        }
        
        .btn-generate {
            background-color: #3498db;
            color: white;
        }
        
        .btn-print {
            background-color: #2ecc71;
            color: white;
        }
        
        .btn-download {
            background-color: #9b59b6;
            color: white;
        }
        
        .btn:hover {
            opacity: 0.9;
        }
      .text-center{
          text-align: center;
      }
  </style>
</head>

<body>
  <?php include 'header.php';
  include 'navbar.php';

  ?>
  <main class="main-content">
    <div class="page-header">
      <h1>Appointment Report</h1>
    </div>
      <div class="date-range">
          <form method="post">
                <div class="form-group">
                    <label for="start-date">Start Date</label>
                    <input type="date" name="start" id="start-date">
                </div>
                
                <div class="form-group">
                    <label for="end-date">End Date</label>
                    <input type="date" name="end" id="end-date">
                </div>
                
                <button type="submit" name="submit" class="btn btn-generate">Generate Report</button>
              </form>
            </div>
    <div class="container" id="print_data">
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Patient Name</th>
            <th>Date</th>
            <th>Time</th>
              <th>Status</th>
              <th>Fee</th>
          </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
            $total=0;
            if(isset($_POST['submit'])){
                $start=$_POST['start'];
                $end=$_POST['end'];
               $sql = "SELECT * FROM appointment WHERE date BETWEEN '$start' AND '$end'";
            }
            else{
                $sql="SELECT * from appointment";
            }
            
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_array($result)){
            ?>
          <tr>
            <td><?php echo $i++;?></td>
            <td><?php echo $row['patient_name'];?></td>
            <td><?php echo date('d M Y',strtotime($row['date']));?></td>
            <td><?php echo date('h:i A',strtotime($row['time']));?></td>
              <td><?php echo $row['status'];?></td>
              <td>Rs. <?php echo $row['fee'];?></td>
          </tr>
    <?php   $total+=$row['fee'];
            } ?>
            <tr>
                <td colspan="5">Total</td>
                <td>Rs. <?php echo $total;?></td>
            </tr>
        </tbody>
      </table>
    </div>
      <div class="btn-container text-center">
            <button class="btn btn-print" onClick="printdata('print_data')">Print Report</button>
            <button class="btn btn-download">Download Report</button>
        </div>
  </main>
</body>

</html>
<script>
function printdata(e1){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(e1).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}

// Download report as PDF
document.querySelector('.btn-download').addEventListener('click', function () {
  const report = document.getElementById('print_data');

  html2canvas(report).then(canvas => {
    const imgData = canvas.toDataURL('image/png');
    const pdf = new jspdf.jsPDF('p', 'mm', 'a4');
    const imgProps = pdf.getImageProperties(imgData);
    const pdfWidth = pdf.internal.pageSize.getWidth();
    const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

    pdf.addImage(imgData, 'PNG', 0, 10, pdfWidth, pdfHeight);
    pdf.save('appointment-report.pdf');
  });
});
</script>
