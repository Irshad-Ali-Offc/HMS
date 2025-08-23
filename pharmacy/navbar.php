
  <?php 
  include 'header.php';
  ?>
  <aside class="sidebar">
    <div class="sidebar-brand">
      <img src="../image/logo.png" alt="Hospital Logo">
      <h2>MediCare HMS</h2>
     
    
    </div>
    
    <ul class="sidebar-menu">
      <li><a href="home.php" ><i class="fas fa-tachometer-alt"></i> <span class="menu-text">Dashboard</span></a></li>
      <li><a href="prescription.php"><i class="fa-solid fa-prescription-bottle-medical"></i> <span class="menu-text">Prescriptions</span></a></li>
      <li><a href="inventory.php"><i class="fas fa-pills"></i> <span class="menu-text">Medication Inventory</span></a></li>
      <li><a href="billing.php"><i class="fas fa-file-invoice-dollar"></i></i> <span class="menu-text">Billing</span></a></li>
      <li><a href="appointment_report.php"><i class="fas fa-calendar"></i> <span class="menu-text">Appointment Report</span></a></li>
    <li><a href="billing_report.php"><i class="fas fa-chart-bar"></i> <span class="menu-text">Billing Report</span></a></li>
      <li><a href="profile.php"><i class="fa-solid fa-id-badge"></i> <span class="menu-text">Profile</span></a></li>
      <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> <span class="menu-text">Logout</span></a></li>
    </ul>
  </aside>
 <header class="header">
    <div class="header-title">
      <h1>Pharmacy Dashboard</h1>
    </div>
    
    <div class="user-menu">
      
      <div class="user-info">
        <img src="../image/userlogo.png" alt="Receptionist">
        <div class="user-details">
          <h4><?php echo $pharmacist['name'];?></h4>
          <p>Pharmacist</p>
        </div>
      </div>
    </div>
  </header>