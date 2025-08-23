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
                <input type="search" id="searchInput" placeholder="Search medications...">
            </div>
            <a href="add_medication.php">
            <button class="add-btn">+ Add New Medication</button>
            </a> 
        </div>
        
        <table class="inventory-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Medication Name</th>
                    <th>Category</th>
                    <th>Dosage</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Expiry Date</th>
                    <th>Supplier</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
                $sql="select * from medication";
                $result=mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td>M00<?php echo $i++;?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['category'];?></td>
                    <td><?php echo $row['dosage'];?></td>
                    <td>Rs. <?php echo $row['price'];?></td>
                    <td><?php echo $row['quantity'];?></td>
                    <td><?php echo $row['expiry_date'];?></td>
                    <td><?php echo $row['supplier'];?></td>
                    <td>
                        <?php
                        if($row['quantity']>$row['threshold']){ ?>
                        <span class="status status-in-stock">In Stock</span>
                        <?php } else if($row['quantity']<$row['threshold']){ ?>
                        <span class="status status-low-stock">Low Stock</span>
                        <?php } else{ ?>
                        <span class="status status-out-of-stock">Out of Stock</span>
                        <?php } ?>
                        </td>
                    <td>
                       <a href="edit_inventory.php?id=<?php echo $row['id'];?>">
                         <button class="action-btn edit-btn">Edit</button>
                       </a>
                        <a href="delete_inventory.php?id=<?php echo $row['id'];?>">
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
