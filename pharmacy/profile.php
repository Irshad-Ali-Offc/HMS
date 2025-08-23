<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Profile</title>
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
 ?>
    <main class="main-content">
        <form method="post" class="add-medication-form">
            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <label for="name">Name*</label>
                        <input type="text" name="name" value="<?php echo $pharmacist['name'];?>" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username*</label>
                        <input type="username" name="username" value="<?php echo $pharmacist['username'];?>" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password*</label>
                        <input type="password" name="password" value="<?php echo $pharmacist['password'];?>" id="password" required>
                    </div>
            
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                        <button type="submit" name="submit" class="btn btn-primary">Update Profile</button>
                    </div>
        </form>
    </main>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="update users set name='$name', username='$username', password='$password' where id='".$pharmacist['id']."'";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        echo '<script>window.location.href="profile.php"
        alert("Profile updated successfully")</script>';
    }
    else{
        echo '<script>alert("Sorry try again later")</script>';
    }
}
?>