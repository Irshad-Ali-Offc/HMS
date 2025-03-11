<?php
include 'header.php';
?>
         <form method="post">
         <section id="appointments-section">
            <div class="appointments-container">
            
               <div class="search-container">
                  <input type="text" name="keyword" id="search-input" placeholder="Search patient..." required/>
                  <button type="submit" name="search" id="search-btn" class="search-btn">
                  <i class="fa fa-search"></i>
                  </button>
               </div>
               </form>
               <table class="appointments-table">
                  <thead>
                     <tr>
                        <th>Sr.</th>
                        <th>Name</th>
                        <th>Dob</th>
                        <th>Gender</th>
                        <th>CNIC</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th style="width:24%;">Actions</th>
                     </tr>
                  </thead>
                  <tbody id="appointments-body">
                  <?php
				  $i=1;
				  if(isset($_POST['search'])){
					  $keyword=$_POST['keyword'];
					  $sql="select patient.*, users.name from patient INNER JOIN users on users.id=patient.user_id where name LIKE '%$keyword%' OR cnic LIKE '%$keyword%' OR address LIKE '%$keyword%'";
				  }
				  else{
					 $sql="select patient.*, users.name from patient INNER JOIN users on users.id=patient.user_id"; 
				  }
				  $result=mysqli_query($con,$sql);
				  if(mysqli_num_rows($result)>0){
				  while($row=mysqli_fetch_array($result)){
				  ?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo date('d M Y',strtotime($row['dob']));?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['cnic'];?></td>
                    <td><?php echo $row['contact'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td>
                    <a href="history.php?id=<?php echo $row['user_id'];?>"><button type="button" class="history-btn">History</button></a>
                    <a href="delete_patient.php?id=<?php echo $row['id'];?>" onclick="return confirm('Do you want to delete?');"><button type="button" class="delete-btn">Delete</button></a>
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