<?php 
include 'header.php' ;  
include_once '../model/fonction.php';

if(!empty($_GET['id'])) {
 $article= getvente($_GET['id']);
}
?>

    <div class="home-content"> 
<div class="container d-flex justify-content-center">
  <div class="row ">
<div class="col">
    <div class="container" >
<div class="card" style="width: 30rem;">
      <div class="card-body">
      <form action="<?= empty($_GET['id']) ? "../model/ajoutee.php"  : "../model/motifiervente.php" ?>" method="post">
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
<label form="id_client">client</label> 
<select class="form-select"   aria-label="Default select example" name="id_client" id="id_client" placeholder="veuillez saisir le Catégorie">
<?php 
   $clients= getclient();
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
      <table id="vente" class="table  table-light table-striped d-flex justify-content-center ">
    <tr>
      <th scope="col">nom_article </th>
      <th scope="col">client</th>
      <th scope="col">Quantité</th>
      <th scope="col">Prix </th>
      <th scope="col">date vente </th>
      <th scope="col">Action</th>
    </tr>
 <?php 
 $vente=getvente();
 /*echo "<pre>";
  var_dump($vente);
 echo "</pre>";
 exit;*/
 /*var_dump($vente);
 exit;*/
 if(!empty($vente) && is_array($vente)) {
    foreach($vente as $key => $value) {
       if($value['etat']!=0):
        ?>

        <tr>
        <th scope="row"><?= $value ['nom_article']?></th>
        <th scope="row"><?= $value ['nom']." ". $value ['prenom']?></th>
        <th scope="row"><?= $value ['quantite']?></th>
        <th scope="row"><?= $value ['prix']?></th>
        <th scope="row"><?= $value ['date_vente']?></th>
        <th scope="row"><a href="./recuvente.php?id=<?= $value['id'] ?>"> <i class='bx bx-receipt'></i></a>
            <a href="./deletevente.php?id=<?=$value['id']?>"><i class='bx bx-hide' style="color:red;"></i></a>
      </th>
       </tr>
       <?php
       endif;
    }
 }
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
      <script>
        const table=document.getElementById('vente') ;
      
        const input =document.getElementById('search') ;
        input.addEventListener('input',function(event){
          console.log(event.target.value) ;
          filtreTable(document.getElementById('vente'),event.target.value);
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