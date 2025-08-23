<?php
include 'header.php';
?>
		<section id="Referal-section">
            <div class="container">
               <h2>Add Receptionist</h2>
               <form method="post" enctype="multipart/form-data">
                  <div class="form-group">
                     <label>Name</label>
                     <input type="text" name="name" placeholder="Enter name" required />
                  </div>
                  <div class="form-group">
                     <label>Username</label>
                     <input type="text" name="username" placeholder="Enter username" required />
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" placeholder="Enter password" required />
                  </div>
                  <button type="submit" name="submit" class="add-btn">Add Receptionist</button>
               </form>
            </div>
         </section>
      </main>
   </body>
</html>
<?php
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$username=$_POST['username'];
	$password=$_POST['password'];	
	$sql="insert into users values('','$name','$username','$password','receptionist')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>window.location.href="receptionist.php"
				alert("Receptionist added successfully")</script>';
	}
	else{
		echo '<script>alert("Sorry try again later")</script>';	
	}
}
?>
<script>
    ClassicEditor
        .create( document.querySelector( '#content' ),{
          ckfinder:
          {
            uploadUrl: 'fileupload.php'
          }
        })
        .then(editor => {
          console.log(editor);
        })
        .catch( error => {
            console.error( error );
        });
</script>