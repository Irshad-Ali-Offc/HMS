<?php 
    include 'header.php';
    include 'navbar.php';
?>

<style>
<style>
.appointments-container{
	padding-bottom:80px;
    max-width: 1200px;	
}
.main-data{
	width:100%;	
	height:170px;
}
.one{
	width:33%;
	float:left;	
}
.presc-main{
	width:100%;
	height:auto;
}
.presc-one{
	width:20%;
	float:left;	
	margin-top:30px;
	border-right:1px solid #EEEEEE;
}
.presc-two{
	width:70%;
	float:left;	
	margin-top:30px;
	padding-left:30px;
	box-sizing:border-box;
}
.text-center{
	text-align:center;	
}
.text-sm{
	font-size:14px;	
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Prescriptions</title>
</head>
<body>
    
</body>
</html>

<main class="main-content" id="print_data">
     <div class="page-header">
            <h1>Patient Presctiption</h1>
        </div>
    <section id="appointments-section">
        <h2 class="text-center">Hospital Management System</h2>
        <center>
            <img src="../image/1stlogo.png" height="100">
        </center>
        <h2 class="text-center">Doctor Name</h2>
        <h4 class="text-center text-sm">Specialization</h4>
        <div class="main-data">
            <div class="one">
                <p><strong>Name:</strong> Patient Name</p>
            </div>
            <div class="one">
                <p><strong>Age:</strong> Age Years</p>
            </div>
            <div class="one">
                <p><strong>Gender:</strong> Gender</p>
            </div>
            <div class="one">
                <p><strong>CNIC:</strong> CNIC Number</p>
            </div>
            <div class="one">
                <p><strong>Contact:</strong> Contact Number</p>
            </div>
            <div class="one">
                <p><strong>Date:</strong> Appointment Date</p>
            </div>
            <div class="one">
                <p><strong>Time:</strong> Appointment Time</p>
            </div>
            <div class="one">
                <p><strong>Address:</strong> Address</p>
            </div>
        </div>
        <hr>

        <div class="presc-main">
            <div class="presc-one">
                <p><strong>Vitals</strong></p>
                <pre>Vitals Data</pre><br><br>
                <p><strong>Lab Investigations</strong></p>
                <pre>Lab Investigation Data</pre><br><br>
                <p><strong>Notes</strong></p>
                <pre>Notes Data</pre><br><br>
            </div>
            <div class="presc-two">
                <p><strong>Prescription</strong></p>
                <pre>Prescription Details</pre><br><br>
                <p><strong>Next Visit Date</strong></p>
                <p>Next Visit Date</p>
            </div>
        </div>

        <div class="text-center">
            <button class="btn-submit" onClick="printdata('print_data')">Print</button>
        </div>
    </section>
</main>

<script>
function printdata(e1) {
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(e1).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>
