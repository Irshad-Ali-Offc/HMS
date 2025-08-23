<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing System | Medication Inventory</title>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="../css/pharmacy/pharmacy.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
       /* Billing Layout */
        .billing-container {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }
        
        .billing-form {
            flex: 2;
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        .billing-summary {
            flex: 1;
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            height: fit-content;
        }
        
        /* Form Styles */
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
            min-height: 40px;
            font-size: 16px;
        }
        
        /* Medication Search */
        .medication-search {
            position: relative;
        }
        
        .search-results {
            position: absolute;
            width: 100%;
            max-height: 300px;
            overflow-y: auto;
            background: white;
            border: 1px solid #ddd;
            border-radius: 4px;
            z-index: 100;
            display: none;
        }
        
        .search-item {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #eee;
        }
        
        .search-item:hover {
            background-color: #f5f5f5;
        }
        
        /* Billing Items Table */
        .billing-items {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        
        .billing-items th, 
        .billing-items td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        .billing-items th {
            background-color: #3498db;
            color: white;
            font-weight: 600;
        }
        
        .quantity-control {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .quantity-btn {
            width: 30px;
            height: 30px;
            border: 1px solid #ddd;
            background: #f5f5f5;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .quantity-input {
            width: 50px;
            text-align: center;
        }
        
        .remove-btn {
            color: #e74c3c;
            cursor: pointer;
            font-weight: bold;
        }
        
        /* Summary Styles */
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px dashed #eee;
        }
        
        .summary-total {
            font-weight: bold;
            font-size: 18px;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 2px solid #3498db;
        }
        
        /* Buttons */
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
        
        .btn-success {
            background-color: #2ecc71;
            color: white;
            width: 100%;
            margin-top: 20px;
        }
        
        .btn-success:hover {
            background-color: #27ae60;
        }
        
        /* Responsive adjustments */
        @media (max-width: 900px) {
            .billing-container {
                flex-direction: column;
            }
            
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

    <?php 
include_once 'navbar.php';
$con=mysqli_connect('localhost','root','','hms');
date_default_timezone_set("Asia/Karachi");
?>
    <form method="post" action="process.php">
    <main class="main-content">
        <div class="billing-container">
            
            <div class="billing-form">
                <h2>Create New Bill</h2>
                <div class="form-group">
                    <label for="cnic">CNIC</label>
                    <input type="text" name="cnic" id="cnic" placeholder="e.g. 45105-2121213-6" 
       pattern="[0-9]{5}-[0-9]{7}-[0-9]{1}" 
       title="CNIC must be in the format 45105-2121213-6">
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label for="patient-name">Patient Name</label>
                            <input type="text" name="name" id="patient-name" placeholder="Enter full name" 
       pattern="[A-Za-z ]+" 
       title="Only letters and spaces are allowed">
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label for="patient-age">Age</label>
                            <input type="number" name="age" id="patient-age" min="0" max="120" placeholder="Age">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="patient-contact">Contact Number</label>
                    <input type="tel" name="contact" id="patient-contact" placeholder="Phone number">
                </div>
                
                <div class="form-group">
                    <label for="doctor-name">Doctor's Name (Optional)</label>
                    <input type="text" name="doctor_name" id="doctor-name" placeholder="Doctor's name">
                </div>
                
                    <div class="form-group">
                        <label for="medication">Search Medication*</label>
                        <select name="medication" id="medication">
                            <option value="">Search medication...</option>
                            <?php
                            $sql = "SELECT * FROM medication";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $label = "M00{$row['id']} - {$row['name']} ({$row['dosage']}, {$row['category']}, {$row['price']})";
                                echo "<option value='{$row['id']}'>{$label}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <input type="number" name="qty" value="1" min="1" placeholder="Enter quantity">
                        </div>
                        <div class="form-col">
                            <button type="submit" class="btn btn-primary" name="add_to_cart">Add</button>
                        </div>
                    </div>

                <table class="billing-items" border="1" cellpadding="5" cellspacing="0" style="margin-top:20px;">
                    <thead>
                        <tr>
                            <th>Medication</th>
                            <th>Dosage</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $total= 0;
                    if(!empty($_SESSION['shopping_cart']))
                    {
                        foreach($_SESSION['shopping_cart'] as $keys => $values)
                        {
                        ?> 
                    <tr>
                       <td><?php echo $values['item_name'];?></td> 
                        <td><?php echo $values['dosage'];?></td> 
                        <td>Rs. <?php echo $values['price'];?></td> 
                        <td><?php echo $values['qty'];?></td> 
                        <td>Rs. <?php echo $values['price']*$values['qty'];?></td> 
                        <td><a href="add_to_cart.php?action=delete&id=<?php echo $values['item_id'];?>" onclick='return confirm(\"Are you sure?\")' class='btn btn-danger btn-sm'>Delete</a></td>
                    </tr> 
                    <?php 
                            $total+=$values['price']*$values['qty'];
                        }
                    }
                    ?>
                        <tr>
                            <td colspan="4">Total</td>
                            <td>Rs. <?php echo $total;?></td>
                        <tr>
                    </tbody>
                </table>




                
                <div class="form-group">
                    <label for="instructions">Special Instructions</label>
                    <textarea name="instructions" id="instructions" rows="3" placeholder="Any special instructions for the patient" class="form-control"></textarea>
                </div>
            </div>
            
            <div class="billing-summary">
                <h2>Bill Summary</h2>

                <div class="summary-row">
                    <span>Subtotal:</span>
                    <span id="subtotal">Rs. <?php echo $total; ?></span>
                </div>

                <div class="form-group"> 
                    <label for="discount">Discount</label>
                    <div class="form-row" style="gap: 10px;">
                        <select id="discount-type" name="discount_type" style="flex: 1;">
                            <option value="percentage">Percentage</option>
                            <option value="fixed">Fixed Amount</option>
                        </select>
                        <input type="number" name="discount_value" id="discount-value" min="0" value="0" style="flex: 1;">
                    </div>
                </div>

                <div class="summary-row" id="final-total-row" style="display: none;">
                    <span>Final Total:</span>
                    <span id="final-total">Rs. 0</span>
                </div>

                <div class="summary-row" id="tax-row" style="display: none;">
                    <span>Tax (5%):</span>
                    <span id="tax-amount">Rs. 0</span>
                </div>

                <div class="summary-row summary-total" id="total-amount-row" style="display: none;">
                    <span>Total Amount:</span>
                    <span id="total-amount">Rs. 0</span>
                </div>

                <input type="hidden" name="calculated_total" id="calculated_total">

                <div class="form-group">
                    <label for="payment-method">Payment Method</label>
                    <select id="payment-method" name="payment_method">
                        <option value="cash">Cash</option>
                        <option value="online">Online</option>
                    </select>
                </div>

                <input type="hidden" name="total" value="<?php echo $total; ?>">
                <button type="submit" name="save" class="btn btn-success">Complete Payment</button>
            </div>

            
        </div>
    </main>
        </form>
</body>
</html>
<script>
  $(document).ready(function() {
    $('#medication').select2({
      placeholder: "Search medication...",
      allowClear: true
    });
  });
$(document).ready(function() {
    $('#cnic').on('blur', function() {
        var cnic = $(this).val();

        if (cnic !== '') {
            $.ajax({
                url: 'get_patient.php',
                type: 'POST',
                data: { cnic: cnic },
                dataType: 'json',
                success: function(response) {
                    if (response.error) {
                        alert(response.error);
                        $('#patient-name').val('');
                        $('#patient-age').val('');
                        $('#patient-contact').val('');
                    } else {
                        $('#patient-name').val(response.name);
                        $('#patient-age').val(response.age);
                        $('#patient-contact').val(response.contact);
                    }
                }
            });
        }
    });
});
$(document).ready(function () {
    const subtotal = <?php echo $total; ?>;

    function formatCurrency(amount) {
        return "Rs. " + amount.toFixed(2);
    }

    function calculateTotals() {
        let discountType = $('#discount-type').val();
        let discountValue = parseFloat($('#discount-value').val()) || 0;
        let discountAmount = 0;

        if (discountType === 'percentage') {
            discountAmount = (subtotal * discountValue) / 100;
        } else if (discountType === 'fixed') {
            discountAmount = discountValue;
        }

        let finalTotal = subtotal - discountAmount;
        if (finalTotal < 0) finalTotal = 0;

        let tax = (finalTotal * 5) / 100;
        let totalAmount = finalTotal + tax;

        // Show calculated values
        $('#final-total').text(formatCurrency(finalTotal));
        $('#tax-amount').text(formatCurrency(tax));
        $('#total-amount').text(formatCurrency(totalAmount));

        // Show the hidden rows
        $('#final-total-row').show();
        $('#tax-row').show();
        $('#total-amount-row').show();

        // Set the hidden input for form submission
        $('#calculated_total').val(totalAmount.toFixed(2));
    }

    $('#discount-type, #discount-value').on('change keyup', function () {
        calculateTotals();
    });

    // Optionally call once on page load
    calculateTotals();
});
</script>

