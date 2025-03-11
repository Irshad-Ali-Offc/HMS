<?php
include 'header.php';
?>
         <form method="post">
         <section id="appointments-section">
            <div class="appointments-container">
            
               <div class="search-container">
                  <input type="text" name="keyword" id="search-input" placeholder="Search department..." required/>
                  <button type="submit" name="search" id="search-btn" class="search-btn">
                  <i class="fa fa-search"></i>
                  </button>
               </div>
               <a href="add_department.php"><button type="button" id="add-appointment-btn" class="action-btn">Add Department</button></a>
               </form>
               <table class="appointments-table">
                  <thead>
                     <tr>
                        <th>Sr.</th>
                        <th>Department Name</th>
                        <th style="width:25%;">Actions</th>
                     </tr>
                  </thead>
                  <tbody id="appointments-body">
                  <?php
				  $i=1;
				  if(isset($_POST['search'])){
					  $keyword=$_POST['keyword'];
					  $sql="select * from department where dep_name LIKE '%$keyword%'";
				  }
				  else{
					 $sql="select * from department"; 
				  }
				  $result=mysqli_query($con,$sql);
				  if(mysqli_num_rows($result)>0){
				  while($row=mysqli_fetch_array($result)){
				  ?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['dep_name'];?></td>
                    <td>
                    <a href="update_department.php?id=<?php echo $row['id'];?>"><button type="button" class="update-btn">Update</button></a>
                    <a href="delete_department.php?id=<?php echo $row['id'];?>" onclick="return confirm('Do you want to delete?');"><button type="button" class="delete-btn">Delete</button></a>
                    </td>
                </tr>
                <?php } } else{ ?>
                <tr>
                    <td colspan="3">No record found</td>
                </tr>   
                <?php } ?>
            </tbody>
               </table>
            </div>
         </section>
      </main>
   </body>
</html>