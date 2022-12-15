<?php 
include 'header.php'; 
if(array_key_exists('modifier',$_GET)){
   $req=$connexion->prepare("select * FROM model WHERE id=:id");
   $req->execute(['id'=>$_GET['modifier']]);
   $model_a_modifier=$req->fetch();
   // var_dump($model_a_modifier);
   $id=$model_a_modifier['id'];
   $name=$model_a_modifier['name'];
   $description=$model_a_modifier['description'];
   $old_image=$model_a_modifier['image'];
}
?>
<div class="container text-center">
  <div class="row">
    <div class="col">
   <div class="home-content"> 
 <div class="container d-flex justify-content-center">
  <div class="row ">
<div class="col">
    <div class="container" >
<div class="card" style="width: 30rem;">
      <div class="card-body">
<h1 >Model</h1>

<form action="" method="post" enctype="multipart/form-data">
   <div class="flex">
      <div class="inputBox">
         <span>MODEL name </span>
         <input type="text" class="form-control" required maxlength="100" name="name" value="<?= isset($id) ? $name : '' ?>">
         <input type="hidden" name="id" value="<?= isset($id) ? $id : ''?>">
      </div>
      <div class="inputBox">
         <span>description </span>
         <input type="text" min="0" class="form-control" required max="9999999999" placeholder="enter model description" onkeypress="if(this.value.length == 10) return false;" name="description" value="<?= isset($id) ? $description : '' ?>">
      </div>
      <input type="hidden" name="old_image" value="value="<?= isset($id) ? $old_image : ''?>">
     <div class="inputBox">
         <span>image </span>
         <input type="file" name="image" accept="image/jpg, image/jpeg, image/png, image/webp" class="form-control">
     </div>
     <?php  if(!isset($id)){?>
   <input type="submit" value="add modele" class="btn btn-primary  "name="add_modele">
   <?php }else{?>
      <input type="submit" value="update modele" class="btn btn-primary" name="update">
      <?php } ?> 
</form>
 </div>
 </div>
 </div>
 </div>
 </div>
 <div class="col">
 <?php  

$select_modele = $connexion->prepare("SELECT * FROM model");
$select_modele->execute();
if($select_modele->rowCount() > 0){   
?>
<div class="col">
<table id="model" class="table  table-ligth table-striped d-flex justify-content-center ">
<tr>
<th scope="col">name  </th>
<th scope="col">description</th>
<th scope="col">image</th>
<th scope="col">Action</th>

</tr>
<?php
   while($fetch_modeles = $select_modele->fetch(PDO::FETCH_ASSOC)){  

?>
<tr>
  <th scope="row"><?= $fetch_modeles['name']; ?></th>
  <th scope="row"><?= $fetch_modeles['description']; ?></th>
  <th scope="row"><img alt="erreur" style="height: 50px ;" src="../uploaded_img/<?=$fetch_modeles['image'] ; ?>"></th>
  <th><a href="modele.php?delete=<?= $fetch_modeles['id']; ?>" class="delete-btn"><i style="color:red;" class='bx bxs-message-square-x'></i></a>
  <a href="modele.php?modifier=<?=$fetch_modeles['id']; ?>"><i class='bx bx-edit-alt'></i></a></th>
 </tr>
<?php }}?>
</table>

  </div>
 </div>
   


<?php

if(isset($_POST['add_modele'])){

$name = $_POST['name'];
$name = filter_var($name, FILTER_SANITIZE_STRING);
$description = $_POST['description'];
$description= filter_var($description, FILTER_SANITIZE_STRING);

$image = $_FILES['image']['name'];
$image = filter_var($image, FILTER_SANITIZE_STRING);
$image_size_01 = $_FILES['image']['size'];
$image_tmp_name_01 = $_FILES['image']['tmp_name'];
$image_folder_01 = '../uploaded_img/'.$image;


$select_modele = $connexion->prepare("SELECT * FROM model WHERE name = ?");
$select_modele->execute([$name]);

if($select_modele->rowCount() > 0){
   $message[] = 'product name already exist!';
}else{

   $insert_modele = $connexion->prepare("INSERT INTO model(name, description,image) VALUES(?,?,?)");
   $insert_modele->execute([$name ,$description ,$image]) ;

   if($insert_modele){
      if($image_size_01 > 2000000){
         $message[] = 'image size is too large!';
      }else{
         move_uploaded_file($image_tmp_name_01, $image_folder_01);
         $message[] = 'new product added!';
      }

   }

}  

};
 ?>
<?php 

if(isset($_GET['delete'])){

$delete_id = $_GET['delete'];
$delete_modele_image = $connexion->prepare("SELECT * FROM model WHERE id = ?");
$delete_modele_image->execute([$delete_id]);
$fetch_delete_image = $delete_modele_image->fetch(PDO::FETCH_ASSOC);

$delete_modele =$connexion->prepare("DELETE FROM model WHERE id = ?");
$delete_modele->execute([$delete_id]);

   

}
     ?>
  <?php

   if(isset($_POST['update'])) {

   $id = $_POST['id'];
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $description = $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);
   

   $update_modele = $connexion->prepare("UPDATE model SET name = :name, description = :description  where id = :id");
   $update_modele->execute(
      ['name'=>$name,'description'=>$description,'id'=>$id]);
   $message[] = 'modele updated successfully!';
      
   $old_image = $_POST['old_image'];
   $image_01 = $_FILES['image']['name'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image']['size'];
   $image_tmp_name_01 = $_FILES['image']['tmp_name'];
   $image_folder_01 = '../uploaded_img/'.$image_01;
   if(!empty($_FILES['image']['name'])){
      if($image_size_01 > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $update_image_01 = $connexion->prepare("UPDATE model SET image = ? WHERE id = ?");
         $update_image_01->execute([$image_01, $id]);
         move_uploaded_file($image_tmp_name_01, $image_folder_01);
         $message[] = 'image  updated successfully!';
      }
   }
   unset($id);
   unset($_GET['modifier']);
 }
?>
  <script>
        const table=document.getElementById('model') ;
      
        const input =document.getElementById('search') ;
        input.addEventListener('input',function(event){
          console.log(event.target.value) ;
          filtreTable(document.getElementById('model'),event.target.value);
        })
        function filtreTable(table,search) {
         
         for(let i=1,row;(row=table.rows[i]) ;i++) {
           let temp=[...row.cells].map(c=>c.innerHTML);
           if(!temp.includes(search) && search && search.length>0){
             row.style.display="none" ;
           }if(temp.includes(search)||!search) {
            row.style.display="block" ;
           }
      
         }
        
        }

</script>