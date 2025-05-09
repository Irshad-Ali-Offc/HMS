<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reception Module - Reports Creation</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
            color: #333;
        }
        
        .container {
            max-width: 1200px;
            margin: -17px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        
        h1 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-top: 0;
        }
        
        .report-controls {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .report-type, .date-range {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #2c3e50;
        }
        
        select, input {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        
        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
            font-size: 16px;
            margin-right: 10px;
        }
        
        .btn-generate {
            background-color: #3498db;
            color: white;
        }
        
        .btn-print {
            background-color: #2ecc71;
            color: white;
        }
        
        .btn-download {
            background-color: #9b59b6;
            color: white;
        }
        
        .btn:hover {
            opacity: 0.9;
        }
        
        .report-preview {
            margin-top: 30px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            background-color: white;
        }
        
        .report-header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }
        
        .hospital-name {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
            margin: 0;
        }
        
        .report-title {
            font-size: 18px;
            color: #2c3e50;
            margin: 10px 0;
        }
        
        .report-date {
            color: #7f8c8d;
            font-size: 14px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        
        th {
            background-color: #3498db;
            color: white;
            padding: 10px;
            text-align: left;
        }
        
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        .summary {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        
        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        
        .summary-label {
            font-weight: bold;
        }
        
        .no-report {
            text-align: center;
            padding: 50px;
            color: #7f8c8d;
            font-style: italic;
        }
        
        @media print {
            body * {
                visibility: hidden;
            }
            .report-preview, .report-preview * {
                visibility: visible;
            }
            .report-preview {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                margin: 0;
                padding: 20px;
                box-shadow: none;
                border: none;
            }
            .report-controls, .btn-container {
                display: none;
            }
        }
        
        @media (max-width: 768px) {
            .report-controls {
                grid-template-columns: 1fr;
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
    <div class="container">
        <h1>Reports Creation</h1>
        
        <div class="report-controls">
            <div class="report-type">
                <h3>Report Type</h3>
                <div class="form-group">
                    <label for="report-category">Category</label>
                    <select id="report-category">
                        <option value="">Select a category</option>
                        <option value="patient">Patient Reports</option>
                        <option value="financial">Financial Reports</option>
                        <option value="appointment">Appointment Reports</option>
                        <option value="inventory">Inventory Reports</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="report-type">Report Type</label>
                    <select id="report-type">
                        <option value="">Select a report type</option>
                        <option value="daily-registration">Daily Patient Registration</option>
                        <option value="admission">Admission Summary</option>
                        <option value="discharge">Discharge Summary</option>
                        <option value="revenue">Daily Revenue</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="report-format">Output Format</label>
                    <select id="report-format">
                        <option value="preview">Preview on Screen</option>
                        <option value="pdf">PDF Document</option>
                        <option value="excel">Excel Spreadsheet</option>
                        <option value="print">Print Directly</option>
                    </select>
                </div>
            </div>
            
            <div class="date-range">
                <h3>Date Range</h3>
                <div class="form-group">
                    <label for="start-date">Start Date</label>
                    <input type="date" id="start-date">
                </div>
                
                <div class="form-group">
                    <label for="end-date">End Date</label>
                    <input type="date" id="end-date">
                </div>
                
                <div class="form-group">
                    <label for="time-period">Quick Select</label>
                    <select id="time-period">
                        <option value="custom">Custom Range</option>
                        <option value="today">Today</option>
                        <option value="yesterday">Yesterday</option>
                        <option value="this-week">This Week</option>
                        <option value="last-week">Last Week</option>
                        <option value="this-month">This Month</option>
                        <option value="last-month">Last Month</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="btn-container">
            <button class="btn btn-generate">Generate Report</button>
            <button class="btn btn-print" onclick="window.print()">Print Report</button>
            <button class="btn btn-download">Download Report</button>
        </div>
        
        <div class="report-preview">
            <div class="no-report">
                <p>No report generated yet. Please select report parameters and click "Generate Report".</p>
            </div>
            
            <!-- Sample report content (hidden by default) -->
            <div style="display: none;">
                <div class="report-header">
                    <h2 class="hospital-name">MediCare HMS</h2>
                    <h3 class="report-title">DAILY PATIENT REGISTRATION REPORT</h3>
                    <div class="report-date">Date: May 15, 2023 - May 20, 2023</div>
                </div>
                
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>New Patients</th>
                            <th>Returning Patients</th>
                            <th>Total Patients</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>May 15, 2023</td>
                            <td>24</td>
                            <td>56</td>
                            <td>80</td>
                        </tr>
                        <tr>
                            <td>May 16, 2023</td>
                            <td>32</td>
                            <td>62</td>
                            <td>94</td>
                        </tr>
                        <tr>
                            <td>May 17, 2023</td>
                            <td>28</td>
                            <td>58</td>
                            <td>86</td>
                        </tr>
                        <tr>
                            <td>May 18, 2023</td>
                            <td>35</td>
                            <td>71</td>
                            <td>106</td>
                        </tr>
                        <tr>
                            <td>May 19, 2023</td>
                            <td>30</td>
                            <td>65</td>
                            <td>95</td>
                        </tr>
                        <tr>
                            <td>May 20, 2023</td>
                            <td>22</td>
                            <td>48</td>
                            <td>70</td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="summary">
                    <div class="summary-item">
                        <span class="summary-label">Total New Patients:</span>
                        <span>171</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Total Returning Patients:</span>
                        <span>360</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Grand Total Patients:</span>
                        <span>531</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Average Daily Patients:</span>
                        <span>88.5</span>
                    </div>
                </div>
                
                <div style="text-align: center; margin-top: 30px; font-size: 12px; color: #7f8c8d;">
                    Report generated on May 21, 2023 at 10:15 AM by Reception User
                </div>
            </div>
        </div>
    </div>
    </main>
</body>
</html>