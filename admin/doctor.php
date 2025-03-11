<?php
include 'header.php';
?>
         <form method="post">
         <section id="appointments-section">
            <div class="appointments-container">
            
               <div class="search-container">
                  <input type="text" name="keyword" id="search-input" placeholder="Search doctor..." required/>
                  <button type="submit" name="search" id="search-btn" class="search-btn">
                  <i class="fa fa-search"></i>
                  </button>
               </div>
               <a href="add_doctor.php"><button type="button" id="add-appointment-btn" class="action-btn">Add Doctor</button></a>
               </form>
               <table class="appointments-table">
                  <thead>
                     <tr>
                        <th>Sr.</th>
                        <th>Department</th>
                        <th>Name</th>
                        <th>Specialization</th>
                        <th>Designation</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th style="width:25%;">Actions</th>
                     </tr>
                  </thead>
                  <tbody id="appointments-body">
                  <?php
				  $i=1;
				  if(isset($_POST['search'])){
					  $keyword=$_POST['keyword'];
					  $sql="select doctor.*, department.dep_name, users.name from doctor INNER JOIN users on users.id=doctor.user_id INNER JOIN department on department.id=doctor.dep_id where name  LIKE '%$keyword%' OR dep_name LIKE '%$keyword%' OR specialization LIKE '%$keyword%' OR qualification LIKE '%$keyword%' OR designation LIKE '%$keyword%'";
				  }
				  else{
					 $sql="select doctor.*, department.dep_name, users.name from doctor INNER JOIN users on users.id=doctor.user_id INNER JOIN department on department.id=doctor.dep_id"; 
				  }
				  $result=mysqli_query($con,$sql);
				  if(mysqli_num_rows($result)>0){
				  while($row=mysqli_fetch_array($result)){
				  ?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['dep_name'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['specialization'];?></td>
                    <td><?php echo $row['designation'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td>
                    <a href="update_doctor.php?id=<?php echo $row['id'];?>"><button type="button" class="update-btn">Update</button></a>
                    <a href="delete_doctor.php?id=<?php echo $row['id'];?>" onclick="return confirm('Do you want to delete?');"><button type="button" class="delete-btn">Delete</button></a>
                    </td>
                </tr>
                <?php } } else{ ?>
                <tr>
                    <td colspan="8">No record found</td>
                </tr>   
                <?php } ?>
            </tbody>
               </table>
            </div>
         </section>
      </main>
   </body>
</html>