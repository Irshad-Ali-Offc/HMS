<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Medication</title>
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
 ?>
    <main class="main-content">
        <form class="add-medication-form">
            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <label for="medication-name">Medication Name*</label>
                        <input type="text" id="medication-name" required>
                    </div>
                    
                    <div class="form-col">
                        <div class="form-group">
                            <label for="dosage">Dosage*</label>
                            <input type="text" id="dosage" placeholder="e.g. 500mg" required>
                        </div>
                    
                    <div class="form-group">
                        <label for="category">Category*</label>
                        <select id="category" required>
                            <option value="">Select a category</option>
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
                        <select id="form" required>
                            <option value="">Select form</option>
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
                        <input type="number" id="quantity" min="0" required>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <label for="supplier">Supplier</label>
                        <input type="text" id="supplier">
                    </div>
                    
                    <div class="form-group">
                        <label for="lot-number">Lot Number</label>
                        <input type="text" id="lot-number">
                    </div>
                </div>
                
                <div class="form-col">
                    <div class="form-group">
                        <label for="expiry-date">Expiry Date*</label>
                        <input type="date" id="expiry-date" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="threshold">Low Stock Threshold</label>
                        <input type="number" id="threshold" min="0" placeholder="Default: 10">
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="instructions">Storage Instructions</label>
                <textarea id="instructions" placeholder="e.g. Store in a cool, dry place"></textarea>
            </div>
            
            <div class="form-group">
                <label for="notes">Additional Notes</label>
                <textarea id="notes"></textarea>
            </div>
            
            <div class="form-actions">
                <button type="button" class="btn btn-secondary">Cancel</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </main>
</body>
</html>