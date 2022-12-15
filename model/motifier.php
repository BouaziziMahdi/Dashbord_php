<?php
include_once '../model/connexion.php' ;
   if(isset($_POST['update'])) {

   $id = $_POST['id'];
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $description = $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);
   

   $update_modele = $connexion->prepare("UPDATE model SET name = ?, description = ?,  WHERE id = ?");
   $update_modele->execute([$name, $description,$id]);

   $message[] = 'modele updated successfully!';

  
   $old_image_01 = $_POST['old_image_01'];
   $image_01 = $_FILES['image']['name'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image']['size'];
   $image_tmp_name_01 = $_FILES['image']['tmp_name'];
   $image_folder_01 = '../uploaded_img/'.$image_01;

   if(!empty($image_01)){
      if($image_size_01 > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $update_image_01 = $connexion->prepare("UPDATE model SET image = ? WHERE id = ?");
         $update_image_01->execute([$image_01, $id]);
         move_uploaded_file($image_tmp_name_01, $image_folder_01);
         unlink('../uploaded_img/'.$old_image_01);
         $message[] = 'image  updated successfully!';
      }
   } }
?>