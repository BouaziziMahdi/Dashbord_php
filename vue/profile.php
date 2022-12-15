<?php          
include '../model/connexion.php';   
include 'header.php' ;   


"<br>
<br>" ;
$select_profile = $connexion->prepare("SELECT * FROM `users` WHERE id = ?");
$select_profile->execute([$_SESSION['user_id']]) ;
if($select_profile->rowCount() > 0){
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
?>   

<div class="home-content"> 
<div class="container">
<div class="card" >
  <div class="card-body">
<div class="col">
      <table class="table  table-light table-striped d-flex justify-content-center ">
    <tr>
    <th scope="col">id </th>
      <th scope="col">Nom </th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
 <?php 
        ?>
        <tr>
        <th scope="row"><?= $fetch_profile["id"]; ?></th>
        <th scope="row"><?= $fetch_profile["name"]; ?></th>
        <th scope="row"><p><?= $fetch_profile["Email"]; ?></p></th>
        <th scope="row">  
         <a href="index.php" ><i class='bx bx-up-arrow-circle'></i></a>
         <div >
            <a href="userregistre.php" ><i class='bx bxs-registered'></i></a>
            
         </div>
         <a href="vue/index.php"  onclick="return confirm('logout from the website?');"><i class='bx bx-log-out'></i></a> 
         <?php
            }else{
         ?>
         <p>please login or register first!</p>
         <div >
            <a href="userregistre.php" ><i class='bx bxs-registered'></i></a>
            <a href="index.php" class="option-btn">login</a>
         </div>
         <?php 
         
            }
         ?></th>
       </tr>
       <?php
 ?>
</table>
</div>
  </div>
</div>
</div>
</div>