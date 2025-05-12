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
                <input type="text" placeholder="Search medications...">
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
                    <th>Quantity</th>
                    <th>Expiry Date</th>
                    <th>Supplier</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>M001</td>
                    <td>Amoxicillin</td>
                    <td>Antibiotic</td>
                    <td>500mg</td>
                    <td>120</td>
                    <td>2024-06-15</td>
                    <td>PharmaCorp</td>
                    <td><span class="status status-in-stock">In Stock</span></td>
                    <td>
                       <a href="edit_inventory.php">
                         <button class="action-btn edit-btn">Edit</button>
                       </a>
                        <button class="action-btn delete-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>M002</td>
                    <td>Lisinopril</td>
                    <td>Blood Pressure</td>
                    <td>10mg</td>
                    <td>45</td>
                    <td>2025-01-20</td>
                    <td>MediSupply</td>
                    <td><span class="status status-low-stock">Low Stock</span></td>
                    <td>
                        <button class="action-btn edit-btn">Edit</button>
                        <button class="action-btn delete-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>M003</td>
                    <td>Atorvastatin</td>
                    <td>Cholesterol</td>
                    <td>20mg</td>
                    <td>0</td>
                    <td>2024-09-30</td>
                    <td>HealthPlus</td>
                    <td><span class="status status-out-of-stock">Out of Stock</span></td>
                    <td>
                        <button class="action-btn edit-btn">Edit</button>
                        <button class="action-btn delete-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>M004</td>
                    <td>Metformin</td>
                    <td>Diabetes</td>
                    <td>850mg</td>
                    <td>85</td>
                    <td>2025-03-12</td>
                    <td>PharmaCorp</td>
                    <td><span class="status status-in-stock">In Stock</span></td>
                    <td>
                        <button class="action-btn edit-btn">Edit</button>
                        <button class="action-btn delete-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>M005</td>
                    <td>Ibuprofen</td>
                    <td>Pain Relief</td>
                    <td>200mg</td>
                    <td>210</td>
                    <td>2026-05-18</td>
                    <td>MediSupply</td>
                    <td><span class="status status-in-stock">In Stock</span></td>
                    <td>
                        <button class="action-btn edit-btn">Edit</button>
                        <button class="action-btn delete-btn">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
    