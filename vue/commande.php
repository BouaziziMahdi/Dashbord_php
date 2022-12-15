<?php 
include 'header.php' ;  
include_once '../model/fonction.php';

if(!empty($_GET['id'])) {
 $article= getcommande($_GET['id']);
}
?>

    <div class="home-content"> 
<div class="container d-flex justify-content-center">
  <div class="row ">
<div class="col">
    <div class="container" >
<div class="card" style="width: 30rem;">
      <div class="card-body">
      <form id="commande" action="<?= empty($_GET['id']) ? "../model/ajoutecommande.php" : "../model/motifiercommande.php" ?>" method="post">
           <?php if(array_key_exists('msg',$_GET)): ?>
        <div class="alert alert-<?= $_GET['class'] ?>" role="alert">
           <?= $_GET['msg'] ?>
         </div>
    <?php endif;?>
   <input value="<?= !empty($_GET['id']) ? $article['id']: ""?>" type="hidden" class="form-control" name="id" id="nom_article" placeholder="veuillez saisir le nom"> 
            <label form="id_article">Article</label> 
<select class="form-select"   aria-label="Default select example" name="id_article" id="id_article" placeholder="veuillez saisir le Catégorie">
<?php 
   $articles= getArticle();
   if(!empty( $articles)&& is_array($articles)){
     foreach($articles as $key => $value){
     ?>
     <option data-prix="<?=$value['prix_unitaire']?>" value="<?=$value['id']?>"><?= $value['nom_article']."_".$value['quantite']."disponible"  ?></option>
     <?php
   }
  }
?>
</select>
<label form="id_fournisseur">Fournisseur</label> 
<select class="form-select"   aria-label="Default select example" name="id_fournisseur" id="id_fournisseur" placeholder="veuillez saisir le Catégorie">
<?php 
   $clients= getfournisseur();
   if(!empty( $clients)&& is_array($clients)){
     foreach($clients as $key => $value){
     ?>
     <option  value="<?=$value['id']?>"><?= $value['nom']."".$value['prenom']  ?></option>
     <?php
   }
  }
?>
</select>
<label form="nom_articel">Quantité</label>
 <input onkeyup="setPrix()" value="<?= !empty($_GET['id']) ? $article ['quantite']: ""?>" type="number" class="form-control" name="Quantité" id="Quantité" placeholder="veuillez saisir le Quantité">
 <label form="prix">Prix </label>
 <input value="<?= !empty($_GET['id']) ? $article ['prix']: ""?>"  type="text" class="form-control" name="Prix" id="Prix" placeholder="veuillez saisir le Prix">
  
 <button type="submit" name="submit" class="btn btn-primary ">Valider</button>
</form>      
      </div>
 
    </div>
    </div>
      </div>
      <div class="col">
      <table id="table" class="table  table-light table-striped d-flex justify-content-center ">
    <tr>
      <th scope="col">NomArticle </th>
      <th scope="col">Fournisseur</th>
      <th scope="col">Quantité</th>
      <th scope="col">Prix </th>
      <th scope="col">date vente </th>
      <th scope="col">Action</th>
    </tr>
 <?php 
 $commande=getcommande();
 /*echo "<pre>";
  var_dump($vente);
 echo "</pre>";
 exit;*/
 /*var_dump($vente);
 exit;*/
 if(!empty($commande) && is_array($commande)) {
    foreach($commande as $key => $value) { 
     
 ?>
        <tr>
        <th scope="row"><?= $value ['nom_article']?></th>
        <th scope="row"><?= $value ['nom']." ". $value ['prenom']?></th>
        <th scope="row"><?= $value ['quantite']?></th>
        <th scope="row"><?= $value ['prix']?></th>
        <th scope="row"><?= $value ['date_commande']?></th>
        <th scope="row"><a href="./recuvente.php?id=<?= $value['id'] ?>"> <i class='bx bx-receipt'></i></a>
            <a href="./deletecommande.php?id=<?=$value['id']?>"><i style="color:red ;" class='bx bxs-message-square-x'></i></a>
      </th>
       </tr>
       <?php
 }}
 ?>
</table>
</div>
  </div>
</div>
    </section>
     <?php 
      include 'footer.php' ;
    ?>
    <script>
      function setPrix(){
        var article= document.querySelector('#id_article') ;
        var quantite= document.querySelector('#Quantité') ;
        var prix= document.querySelector('#Prix') ;
        var prixUnitaire=article.options[article.selectedIndex].getAttribute('data-prix');
        prix.value=Number(quantite.value) * Number(prixUnitaire);
      }
    </script>