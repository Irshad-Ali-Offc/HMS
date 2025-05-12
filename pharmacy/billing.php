<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing System | Medication Inventory</title>
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
        
        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
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
    include 'navbar.php';
    include 'header.php';
    ?>
    <main class="main-content">
        <div class="billing-container">
            <div class="billing-form">
                <h2>Create New Bill</h2>
                
                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label for="patient-name">Patient Name</label>
                            <input type="text" id="patient-name" placeholder="Enter patient name">
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label for="patient-age">Age</label>
                            <input type="number" id="patient-age" min="0" max="120" placeholder="Age">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="patient-contact">Contact Number</label>
                    <input type="tel" id="patient-contact" placeholder="Phone number">
                </div>
                
                <div class="form-group">
                    <label for="doctor-name">Doctor's Name (Optional)</label>
                    <input type="text" id="doctor-name" placeholder="Doctor's name">
                </div>
                
                <h3>Add Medications</h3>
                
                <div class="form-group medication-search">
                    <label for="search-medication">Search Medication</label>
                    <input type="text" id="search-medication" placeholder="Search by name or ID">
                    <div class="search-results" id="search-results">
                        <!-- Search results will appear here -->
                    </div>
                </div>
                
                <table class="billing-items">
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
                    <tbody id="bill-items">
                        <!-- Bill items will appear here -->
                        <tr class="no-items">
                            <td colspan="6" style="text-align: center; padding: 30px; color: #95a5a6;">
                                No medications added yet
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="form-group">
                    <label for="instructions">Special Instructions</label>
                    <textarea id="instructions" rows="3" placeholder="Any special instructions for the patient"></textarea>
                </div>
                
                <button type="button" class="btn btn-primary">Save as Draft</button>
            </div>
            
            <div class="billing-summary">
                <h2>Bill Summary</h2>
                
                <div class="summary-row">
                    <span>Subtotal:</span>
                    <span id="subtotal">₹0.00</span>
                </div>
                
                <div class="form-group">
                    <label for="discount">Discount</label>
                    <div class="form-row" style="gap: 10px;">
                        <select id="discount-type" style="flex: 1;">
                            <option value="percentage">Percentage</option>
                            <option value="fixed">Fixed Amount</option>
                        </select>
                        <input type="number" id="discount-value" min="0" value="0" style="flex: 1;">
                    </div>
                </div>
                
                <div class="summary-row">
                    <span>Discount:</span>
                    <span id="discount-amount">-₹0.00</span>
                </div>
                
                <div class="summary-row">
                    <span>Tax (5%):</span>
                    <span id="tax-amount">₹0.00</span>
                </div>
                
                <div class="summary-row summary-total">
                    <span>Total Amount:</span>
                    <span id="total-amount">₹0.00</span>
                </div>
                
                <div class="form-group">
                    <label for="payment-method">Payment Method</label>
                    <select id="payment-method">
                        <option value="cash">Cash</option>
                        <option value="card">Credit/Debit Card</option>
                        <option value="upi">UPI</option>
                        <option value="insurance">Insurance</option>
                    </select>
                </div>
                
                <button type="button" class="btn btn-success">Complete Payment</button>
            </div>
        </div>
    </main>

    <script>
        // This would be connected to your actual inventory data in a real implementation
        document.getElementById('search-medication').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const resultsContainer = document.getElementById('search-results');
            
            if (searchTerm.length < 2) {
                resultsContainer.style.display = 'none';
                return;
            }
            
            // Mock data - in a real app, this would come from your inventory
            const mockMedications = [
                { id: 'M001', name: 'Amoxicillin', dosage: '500mg', price: 15.50, stock: 120 },
                { id: 'M002', name: 'Lisinopril', dosage: '10mg', price: 8.75, stock: 45 },
                { id: 'M003', name: 'Atorvastatin', dosage: '20mg', price: 12.30, stock: 0 },
                { id: 'M004', name: 'Metformin', dosage: '850mg', price: 5.25, stock: 85 },
                { id: 'M005', name: 'Ibuprofen', dosage: '200mg', price: 3.50, stock: 210 }
            ];
            
            const filtered = mockMedications.filter(med => 
                med.name.toLowerCase().includes(searchTerm) || 
                med.id.toLowerCase().includes(searchTerm)
                .filter(med => med.stock > 0);
            
            if (filtered.length > 0) {
                resultsContainer.innerHTML = filtered.map(med => `
                    <div class="search-item" data-id="${med.id}" data-name="${med.name}" data-dosage="${med.dosage}" data-price="${med.price}">
                        <strong>${med.name}</strong> (${med.id})<br>
                        ${med.dosage} - ₹${med.price.toFixed(2)} - Stock: ${med.stock}
                    </div>
                `).join('');
                
                resultsContainer.style.display = 'block';
                
                // Add click handlers to search items
                document.querySelectorAll('.search-item').forEach(item => {
                    item.addEventListener('click', function() {
                        addToBill(
                            this.dataset.id,
                            this.dataset.name,
                            this.dataset.dosage,
                            parseFloat(this.dataset.price)
                        );
                        resultsContainer.style.display = 'none';
                        document.getElementById('search-medication').value = '';
                    });
                });
            } else {
                resultsContainer.innerHTML = '<div class="search-item">No medications found</div>';
                resultsContainer.style.display = 'block';
            }
        });
        
        // Close search results when clicking elsewhere
        document.addEventListener('click', function(e) {
            if (e.target.id !== 'search-medication') {
                document.getElementById('search-results').style.display = 'none';
            }
        });
        
        // Bill items array
        let billItems = [];
        
        function addToBill(id, name, dosage, price) {
            // Check if item already exists in bill
            const existingItem = billItems.find(item => item.id === id);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                billItems.push({
                    id,
                    name,
                    dosage,
                    price,
                    quantity: 1
                });
            }
            
            updateBillDisplay();
        }
        
        function updateBillDisplay() {
            const billItemsContainer = document.getElementById('bill-items');
            
            if (billItems.length === 0) {
                billItemsContainer.innerHTML = `
                    <tr class="no-items">
                        <td colspan="6" style="text-align: center; padding: 30px; color: #95a5a6;">
                            No medications added yet
                        </td>
                    </tr>
                `;
            } else {
                billItemsContainer.innerHTML = billItems.map(item => `
                    <tr>
                        <td>${item.name} (${item.id})</td>
                        <td>${item.dosage}</td>
                        <td>₹${item.price.toFixed(2)}</td>
                        <td>
                            <div class="quantity-control">
                                <button class="quantity-btn" onclick="updateQuantity('${item.id}', -1)">-</button>
                                <input type="number" class="quantity-input" value="${item.quantity}" min="1" 
                                    onchange="updateQuantity('${item.id}', 0, this.value)">
                                <button class="quantity-btn" onclick="updateQuantity('${item.id}', 1)">+</button>
                            </div>
                        </td>
                        <td>₹${(item.price * item.quantity).toFixed(2)}</td>
                        <td><span class="remove-btn" onclick="removeItem('${item.id}')">×</span></td>
                    </tr>
                `).join('');
            }
            
            updateSummary();
        }
        
        function updateQuantity(id, change, newValue = null) {
            const item = billItems.find(item => item.id === id);
            
            if (item) {
                if (newValue !== null) {
                    item.quantity = parseInt(newValue) || 1;
                } else {
                    item.quantity += change;
                    if (item.quantity < 1) item.quantity = 1;
                }
                
                updateBillDisplay();
            }
        }
        
        function removeItem(id) {
            billItems = billItems.filter(item => item.id !== id);
            updateBillDisplay();
        }
        
        function updateSummary() {
            const subtotal = billItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const discountValue = parseFloat(document.getElementById('discount-value').value) || 0;
            let discount = 0;
            
            if (document.getElementById('discount-type').value === 'percentage') {
                discount = subtotal * (discountValue / 100);
            } else {
                discount = Math.min(discountValue, subtotal);
            }
            
            const taxable = subtotal - discount;
            const tax = taxable * 0.05; // 5% tax
            const total = taxable + tax;
            
            document.getElementById('subtotal').textContent = `₹${subtotal.toFixed(2)}`;
            document.getElementById('discount-amount').textContent = `-₹${discount.toFixed(2)}`;
            document.getElementById('tax-amount').textContent = `₹${tax.toFixed(2)}`;
            document.getElementById('total-amount').textContent = `₹${total.toFixed(2)}`;
        }
        
        // Add event listeners for discount changes
        document.getElementById('discount-type').addEventListener('change', updateSummary);
        document.getElementById('discount-value').addEventListener('input', updateSummary);
        
        // Complete payment button
        document.querySelector('.btn-success').addEventListener('click', function() {
            if (billItems.length === 0) {
                alert('Please add at least one medication to the bill');
                return;
            }
            
            const patientName = document.getElementById('patient-name').value;
            if (!patientName) {
                alert('Please enter patient name');
                return;
            }
            
            if (confirm('Confirm payment and complete this transaction?')) {
                // In a real app, this would save the transaction and update inventory
                alert('Payment completed successfully!');
                resetBill();
            }
        });
        
        function resetBill() {
            billItems = [];
            updateBillDisplay();
            document.getElementById('patient-name').value = '';
            document.getElementById('patient-age').value = '';
            document.getElementById('patient-contact').value = '';
            document.getElementById('doctor-name').value = '';
            document.getElementById('instructions').value = '';
            document.getElementById('discount-value').value = '0';
            document.getElementById('payment-method').value = 'cash';
            updateSummary();
        }
    </script>
</body>
</html>