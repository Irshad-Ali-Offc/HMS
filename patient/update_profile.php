<?php
include 'header.php';
?>



<main class="main-content">
    <div class="dashboard-section">
        <section id="profile-section">
            <?php
            $sql = "select patient.*, users.name, username, password from patient INNER JOIN users ON users.id=patient.user_id where user_id='" . $patient['id'] . "'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
            ?>
            <h2>Update Profile</h2>
            <form method="post" id="profile-form" enctype="multipart/form-data">
                <label for="full-name">Full Name:</label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>" placeholder="Enter full name" required>
                <label>Username:</label>
                <input type="text" name="username" value="<?php echo $row['username']; ?>" placeholder="Enter username" required>
                <label>Password:</label>
                <input type="password" name="password" value="<?php echo $row['password']; ?>" placeholder="Enter password" required>

                <label for="dob">Date of Birth:</label>
                <input type="date" name="dob" value="<?php echo $row['dob']; ?>" required>

                <label for="gender">Gender:</label>
                <select name="gender" required>
                    <option value="<?php echo $row['gender']; ?>" selected><?php echo $row['gender']; ?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>

                <label for="cnic">CNIC:</label>
                <input type="text" name="cnic" value="<?php echo $row['cnic']; ?>" placeholder="Enter CNIC" required>

                <label for="address">Address:</label>
                <textarea name="address" rows="3" required placeholder="Enter address"><?php echo $row['address']; ?></textarea>

                <label for="contact-number">Contact Number:</label>
                <input type="tel" name="contact" value="<?php echo $row['contact']; ?>" placeholder="Contact No" required>

                <label for="email">Email Address:</label>
                <input type="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Enter address" required>
                <label for="profile-image">Profile Image:</label>
                <input type="file" name="profile" accept="image/*">

                <button type="submit" name="submit" class="profile-update">Update</button>
            </form>
        </section>

</main>
</div>
</div>

</html>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $cnic = $_POST['cnic'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $_SESSION['patient'] = $username;
    $profile_img = $row['profile']; // Default to current image
    if (isset($_FILES['profile']) && $_FILES['profile']['error'] == 0) {
        $target_dir = "../image/";
        $profile_img = basename($_FILES["profile"]["name"]);
        $target_file = $target_dir . $profile_img;
        move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file);
    }

    $sql = "UPDATE users SET name='$name', username='$username', password='$password' WHERE id='" . $patient['id'] . "'";
    $result = mysqli_query($con, $sql);

    $sql = "UPDATE patient SET dob='$dob', gender='$gender', cnic='$cnic', address='$address', contact='$contact', email='$email', profile='$profile_img' WHERE user_id='" . $patient['id'] . "'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo '<script>alert("Profile updated successfully")</script>';
    } else {
        echo '<script>alert("Sorry, try again later")</script>';
    }
}
?>