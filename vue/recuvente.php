<?php 
include 'header.php' ;
include '../model/fonction.php';
if(array_key_exists('id',$_GET)) {
  $vente= getvente($_GET['id']);
 }

?>

<div class="home-content"> 
 <button id="btnprint" type="button" class="btn btn-primary" style="position: relative; left: 45%" ><i class='bx bx-printer'></i>imprimer</button> 
 <div class="container">
 <div class="card">
  <div class="card-body">
   <h2>Gestion Stock</h2>
   <div>
  <p>Recu N :# <?= $vente['id'] ?> </p>
  <p>date N #: <?= $vente['date_vente']?></p>

   </div>
   <div>
  <p>nom :<?= $vente['nom']. "". $vente['prenom']?></p>
 <p> adress: <?= $vente ['adress']?></p>
 <p> telephone :<?= $vente ['telephone']?></p>
   </div>
   <div class="col">
      <table class="table  table-primary table-striped d-flex justify-content-center ">
    <tr>
      <th scope="col">marque </th>
      <th scope="col">Quantité</th>
      <th scope="col">Prix_unitaire </th>
      <th scope="col">Prix </th>
    
    </tr> 
        <tr>
        <th scope="row"><?= $vente ['nom_article']?></th>
        <th scope="row"><?= $vente ['quantite']?></th>
        <th scope="row"><?= $vente ['prix_unitaire']?></th>
        <th scope="row"><?= $vente ['Prix']?></th>
       </tr>
</table>
</div>
 </div>
  </div>
  </div>
</div>
    </section>
     <?php 
      include 'footer.php' ;
    ?>
    <script>

      var btnprint=document.querySelector('#btnprint') ;

      btnprint.addEventListener("click",()=> {
        window.print();
      })

      function setPrix(){
        var article= document.querySelector('#id_article') ;
        var quantite= document.querySelector('#Quantité') ;
        var prix= document.querySelector('#Prix') ;
        var prixUnitaire=article.options[article.selectedIndex].getAttribute('data-prix');
        prix.value=Number(quantite.value) * Number(prixUnitaire);
      }
    </script>