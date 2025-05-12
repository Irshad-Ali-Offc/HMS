<?php 
include 'header.php';
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pharmacy Dashboard</title>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color: #f5f7fa;
                margin: 0;
                padding: 20px;
                color: #333;
            }
            
   
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .stat-card h3 {
            font-size: 14px;
            color: #7f8c8d;
            margin-bottom: 10px;
        }
        
        .stat-card .value {
            font-size: 28px;
            font-weight: bold;
            color: #2c3e50;
        }
        
        .stat-card .change {
            font-size: 12px;
            margin-top: 8px;
        }
        
        .change.positive { color: #27ae60; }
        .change.negative { color: #e74c3c; }
        
        .recent-prescriptions {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        th {
            background: #f8f9fa;
            color: #7f8c8d;
            font-weight: 500;
        }
        
        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
        }
        
        .status.pending { background: #fff3cd; color: #856404; }
        .status.completed { background: #d4edda; color: #155724; }
        .status.cancelled { background: #f8d7da; color: #721c24; }
        
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 15px;
            margin-top: 30px;
        }
        
        .action-btn {
            background: white;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            cursor: pointer;
        }
        
        .action-btn i {
            color: #3498db;
            font-size: 24px;
            margin-bottom: 8px;
        }
        
        .action-btn span {
            display: block;
            font-size: 13px;
        }
        </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <main class="main-content">
    
    
    <div class="stats-container">
        <div class="stat-card">
            <h3>Today's Prescriptions</h3>
            <div class="value">42</div>
            <div class="change positive">↑ 12% from yesterday</div>
        </div>
        <div class="stat-card">
            <h3>Completed Today</h3>
            <div class="value">36</div>
            <div class="change positive">↑ 8% from yesterday</div>
        </div>
        <div class="stat-card">
            <h3>Pending Prescriptions</h3>
            <div class="value">6</div>
            <div class="change negative">↓ 2 from yesterday</div>
        </div>
        <div class="stat-card">
            <h3>Low Stock Items</h3>
            <div class="value">5</div>
            <div class="change negative">Needs attention</div>
        </div>
    </div>
    
    <div class="recent-prescriptions">
        <div class="section-header">
            <h2>Recent Prescriptions</h2>
            <a href="prescription.php">View All</a>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Prescription ID</th>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#RX-10045</td>
                    <td>John Smith</td>
                    <td>Dr. Sarah Johnson</td>
                    <td><span class="status completed">Completed</span></td>
                </tr>
                <tr>
                    <td>#RX-10044</td>
                    <td>Maria Garcia</td>
                    <td>Dr. Robert Chen</td>
                    <td><span class="status completed">Completed</span></td>
                </tr>
                <tr>
                    <td>#RX-10043</td>
                    <td>David Wilson</td>
                    <td>Dr. Emily Park</td>
                    <td><span class="status pending">Pending</span></td>
                </tr>
                <tr>
                    <td>#RX-10042</td>
                    <td>Lisa Brown</td>
                    <td>Dr. Michael Lee</td>
                    <td><span class="status cancelled">Cancelled</span></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="quick-actions">
        <div class="action-btn">
            <i class="fas fa-plus-circle"></i>
            <span>New Prescription</span>
        </div>
        <div class="action-btn">
            <i class="fas fa-search"></i>
            <span>Check Stock</span>
        </div>
        <div class="action-btn">
            <i class="fas fa-file-alt"></i>
            <span>Generate Report</span>
        </div>
        <div class="action-btn">
            <i class="fas fa-bell"></i>
            <span>Low Stock Alerts</span>
        </div>
    </div>
</main>
</body>
</html>
