<?php  

      $select_modele = $connexion->prepare("SELECT * FROM model");
      $select_modele->execute();
      if($select_modele->rowCount() > 0){
         while($select_modele = $select_modele->fetch(PDO::FETCH_ASSOC)){ 
   ?>

   <div class="box">
      <img src="../uploaded_img/<?= $select_modele['image_01']; ?>" alt="">
      <div class="name"><?= $select_modele['name']; ?></div>
      <div class="description">$<span><?= $select_modele['decription']; ?></span>/-</div>

      <div class="flex-btn">
         <a href="update_product.php?update=<?= $select_modele['id']; ?>" class="option-btn">update</a>
         <a href="products.php?delete=<?= $select_modele['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
   </div>
   

<?php }} ?>


