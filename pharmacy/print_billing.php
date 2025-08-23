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
    .text-center{
        text-align: center;
    }
        /* Inventory Table */
        .inventory-table {
            width: 100%;
            margin-top:10px;
            margin-bottom:20px;
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
            background-color: #FFFCFC;
            color: black;
            font-weight: 600;
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
$id=$_REQUEST['id'];
$sql="select * from billing where id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<main class="main-content">
        <div id="print_data">
        <h2>Patient's Billing</h2>
        <table class="inventory-table">
            
            <tr>
                <th>Patient's Name</th>
                <td><?php echo $row['name'];?></td>
                <th>Age</th>
                <td><?php echo $row['age'];?> Year</td>
            </tr>
            <tr>
                <th>Contact</th>
                <td><?php echo $row['contact'];?></td>
                <th>Doctor's Name</th>
                <td><?php echo $row['doctor_name'];?></td>
            </tr>
            <tr>
                <th>Discount Type</th>
                <td><?php echo $row['discount_type'];?></td>
                <th>Value</th>
                <td><?php echo $row['discount_value'];?></td>
            </tr>
            <tr>
                <th>Date</th>
                <td><?php echo $row['date'];?></td>
                <th>Total Bill</th>
                <td>Rs <?php echo $row['total_bill'];?></td>
            </tr>
            <tr>
                <th>Special Instructions</th>
                <td colspan="3"><?php echo $row['instructions'];?></td>
            </tr>
            <tr>
                <th>Sr.</th>
                <th>Medicine Name</th>
                <th>Price</th>
                <th>Qty</th>
            </tr>
        <?php
            $i=1;
            $total=$row['total_bill'];
        $sql="select * from billing_detail where bill_id='$id'";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($result)){ ?>
           <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $row['item_name'];?></td>
               <td>Rs. <?php echo $row['price'];?></td>
               <td><?php echo $row['qty'];?></td>
            </tr>     
        <?php } ?>
            <tr>
                <th colspan="2">Total Bill</th>
                <td>Rs. <?php echo $total;?></td>
            </tr>
        </table>
    </div>
    <div class="text-center">
        <button class="add-btn" onClick="printdata('print_data')">Print</button
    </div>
    
    </main>
<script>
function printdata(e1){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(e1).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML=restorepage;
}

</script>