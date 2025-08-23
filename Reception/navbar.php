
  
  <aside class="sidebar">
    <div class="sidebar-brand">
      <img src="../image/logo.png" alt="Hospital Logo">
      <h2>MediCare HMS</h2>
     
    
    </div>
    
    <ul class="sidebar-menu">
      <li><a href="home.php" ><i class="fas fa-tachometer-alt"></i> <span class="menu-text">Dashboard</span></a></li>
      <li><a href="patient_registration.php" ><i class="fa-solid fa-address-card"></i> <span class="menu-text">Patient Registration</span></a></li>
      <li><a href="appointment.php"><i class="fa-solid fa-calendar-check"></i> <span class="menu-text">Appointments</span></a></li>
      <li><a href="admit.php"><i class="fa-solid fa-bed"></i> <span class="menu-text">Admit Patient</span></a></li>
      <li><a href="discharge.php"><i class="fas fa-hospital-user"></i><span class="menu-text">Discharge Patient</span></a></li>
      <li><a href="prescription.php"><i class="fa-solid fa-prescription-bottle-medical"></i> <span class="menu-text">Prescriptions</span></a></li>
      <li><a href="profile.php"><i class="fa-solid fa-id-badge"></i> <span class="menu-text">Profile</span></a></li>
      <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> <span class="menu-text">Logout</span></a></li>
    </ul>
  </aside>
 <header class="header">
    <div class="header-title">
      <h1>Reception Dashboard</h1>
    </div>
    
    <div class="user-menu">
      
      <div class="user-info">
        <img src="../image/userlogo.png" alt="Receptionist">
        <div class="user-details">
          <h4><?php echo $receptionist['name'];?></h4>
          <p>Receptionist</p>
        </div>
      </div>
    </div>
  </header>