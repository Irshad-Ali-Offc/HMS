<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Medication</title>
    <style>
   
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
    
        
        .back-btn {
            color: white;
            text-decoration: none;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        /* Form Styles */
        .add-medication-form {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-top: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .form-col {
            flex: 1;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }
        
        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-primary {
            background-color: #3498db;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #2980b9;
        }
        
        .btn-secondary {
            background-color: #95a5a6;
            color: white;
        }
        
        .btn-secondary:hover {
            background-color: #7f8c8d;
        }
        
        /* Responsive adjustments */
        @media (max-width: 600px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .form-col {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
 <?php 
 include 'header.php';
 include 'navbar.php';
$id=$_REQUEST['id'];
$sql="select * from medication where id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
 ?>
    <main class="main-content">
        <form method="post" class="add-medication-form">
            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <label for="medication-name">Medication Name*</label>
                        <input type="text" name="name" value="<?php echo $row['name'];?>" id="medication-name" required>
                    </div>
                    <div class="form-group">
                        <label for="medication-name">Price*</label>
                        <input type="number" name="price" value="<?php echo $row['price'];?>" id="medication-name" required>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label for="dosage">Dosage*</label>
                            <input type="text" name="dosage" value="<?php echo $row['dosage'];?>" id="dosage" placeholder="e.g. 500mg" required>
                        </div>
                    
                    <div class="form-group">
                        <label for="category">Category*</label>
                        <select name="category" id="category" required>
                            <option value="<?php echo $row['category'];?>"><?php echo $row['category'];?></option>
                            <option value="antibiotic">Antibiotic</option>
                            <option value="antihypertensive">Antihypertensive</option>
                            <option value="analgesic">Analgesic</option>
                            <option value="antidiabetic">Antidiabetic</option>
                            <option value="antidepressant">Antidepressant</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                
                    
                    <div class="form-group">
                        <label for="form">Form*</label>
                        <select name="form" id="form" required>
                            <option value="<?php echo $row['form'];?>"><?php echo $row['form'];?></option>
                            <option value="tablet">Tablet</option>
                            <option value="capsule">Capsule</option>
                            <option value="liquid">Liquid</option>
                            <option value="injection">Injection</option>
                            <option value="cream">Cream/Ointment</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="quantity">Initial Quantity*</label>
                        <input type="number" name="quantity" value="<?php echo $row['quantity'];?>" id="quantity" min="0" required>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <label for="supplier">Supplier</label>
                        <input type="text" name="supplier" value="<?php echo $row['supplier'];?>" id="supplier">
                    </div>
                    
                    <div class="form-group">
                        <label for="lot-number">Lot Number</label>
                        <input type="text" name="lot_number" value="<?php echo $row['lot_number'];?>" id="lot-number">
                    </div>
                </div>
                
                <div class="form-col">
                    <div class="form-group">
                        <label for="expiry-date">Expiry Date*</label>
                        <input type="date" name="expiry_date" value="<?php echo $row['expiry_date'];?>" id="expiry-date" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="threshold">Low Stock Threshold</label>
                        <input type="number" name="threshold" value="<?php echo $row['threshold'];?>" id="threshold" min="0" placeholder="Default: 10">
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="instructions">Storage Instructions</label>
                <textarea name="instructions" id="instructions" placeholder="e.g. Store in a cool, dry place"><?php echo $row['instructions'];?></textarea>
            </div>
            
            <div class="form-group">
                <label for="notes">Additional Notes</label>
                <textarea name="notes" id="notes"><?php echo $row['notes'];?></textarea>
            </div>
            
            <div class="form-actions">
                <button type="submit" name="submit" class="btn btn-primary">Update Medication</button>
            </div>
        </form>
    </main>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $price=$_POST['price'];
    $dosage=$_POST['dosage'];
    $category=$_POST['category'];
    $form=$_POST['form'];
    $quantity=$_POST['quantity'];
    $supplier=$_POST['supplier'];
    $lot_number=$_POST['lot_number'];
    $expiry_date=$_POST['expiry_date'];
    $threshold=$_POST['threshold'];
    $instructions=$_POST['instructions'];
    $notes=$_POST['notes'];
    $sql="update medication set name='$name', price='$price', dosage='$dosage', category='$category', form='$form', quantity='$quantity', supplier='$supplier', lot_number='$lot_number', expiry_date='$expiry_date', threshold='$threshold', instructions='$instructions', notes='$notes' where id='$id'";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        echo '<script>window.location.href="inventory.php"
        alert("Medication updated successfully")</script>';
    }
    else{
        echo '<script>alert("Sorry try again later")</script>';
    }
}
?>