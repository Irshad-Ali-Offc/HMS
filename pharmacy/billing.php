<style>
      .controls {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .search-box {
            flex: 1;
            min-width: 250px;
        }
        
        .search-box input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        
        .add-btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        
        .add-btn:hover {
            background-color: #2980b9;
        }
        .mt-2{
            margin-top:15px;
        }
        
        /* Inventory Table */
        .inventory-table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border-radius: 4px;
            overflow: hidden;
        }
        
        .inventory-table th, 
        .inventory-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        .inventory-table th {
            background-color: #3498db;
            color: white;
            font-weight: 600;
        }
        
        .inventory-table tr:hover {
            background-color: #f5f5f5;
        }
        
        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }
        
        .status-in-stock {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-low-stock {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status-out-of-stock {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .action-btn {
            padding: 5px 10px;
            margin: 0 5px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
        }
        
        .edit-btn {
            background-color: #ffc107;
            color: #212529;
        }
        
        .delete-btn {
            background-color: #dc3545;
            color: white;
        }
</style>
<?php  include 'header.php';
        include 'navbar.php';
?>
<main class="main-content">
        <div class="controls">
            <div class="search-box">
                <input type="search" id="searchInput" placeholder="Search billing...">
            </div>
            <a href="add_billing.php">
            <button class="add-btn">+ Add New Billing</button>
            </a> 
        </div>
        
        <table class="inventory-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Contact</th>
                    <th>Doctor Name</th>
                    <th>Date</th>
                    <th>Payment Method</th>
                    <th>Bill</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
                $sql="select * from billing";
                $result=mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td>B00<?php echo $i++;?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['age'];?> Year</td>
                    <td><?php echo $row['contact'];?></td>
                    <td><?php echo $row['doctor_name'];?></td>
                    <td><?php echo $row['date'];?></td>
                    <td><?php echo $row['pay_method'];?></td>
                    <td>Rs. <?php echo $row['total_bill'];?></td>
                    <td>
                        <a href="print_billing.php?id=<?php echo $row['id'];?>">
                         <button class="action-btn edit-btn">Print</button>
                       </a>
                        <a href="delete_billing.php?id=<?php echo $row['id'];?>">
                        <button class="action-btn delete-btn mt-2">Delete</button>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
    <script>
  document.getElementById('searchInput').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll('.inventory-table tbody tr');
    rows.forEach(row => {
      let text = row.textContent.toLowerCase();
      row.style.display = text.includes(filter) ? '' : 'none';
    });
  });
</script>
