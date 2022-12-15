<?php 
include 'header.php' ;
include '../model/fonction.php';
if(!empty($_GET['id'])) {
 $article= getArticle($_GET['id']);
}
?>

    <div class="home-content"> 
<div class="container d-flex justify-content-center">
  <div class="row ">
<div class="col">
    <div class="container" >
<div class="card" style="width: 30rem;">
      <div class="card-body">
      <form action="<?= empty($_GET['id']) ? "../model/ajoutearticle.php" : "../model/motifierarticle.php"?>" method="post">
           <?php if(array_key_exists('msg',$_GET)): ?>
        <div class="alert alert-<?= $_GET['class'] ?>" role="alert">
           <?= $_GET['msg'] ?>
         </div>
    <?php endif;?>
    <label form="nom_articel">Nom De L'article</label>
            <input value="<?= !empty($_GET['id']) ? $article['id']: ""?>" type="hidden" class="form-control" name="id" id="nom_article" placeholder="veuillez saisir le nom"> 
  
            <input value="<?= !empty($_GET['id']) ? $article['nom_article']: ""?>" type="text" class="form-control" name="nom_article" id="nom_article" placeholder="veuillez saisir le nom"> 
            <label form="nom_articel">Catégorie</label>
            <select class="form-select"   aria-label="Default select example" name="Catégorie" id="Catégorie" placeholder="veuillez saisir le Catégorie">
  <option value="ordinateur">ordinateur</option>
  <option value="imprimante">imprimante</option>
  <option value="Accessoire">Accessoire</option>
</select>
<label form="nom_articel">Quantité</label>
 <input value="<?= !empty($_GET['id']) ? $article ['quantite']: ""?>" type="text" class="form-control" name="Quantité" id="Quantité" placeholder="veuillez saisir le Quantité">
 <label form="nom_articel">Prix Unitaire</label>
 <input value="<?= !empty($_GET['id']) ? $article ['prix_unitaire']: ""?>"  type="text" class="form-control" name="Prix_unitaire" id="Prix_unitaire" placeholder="veuillez saisir le Prix Unitaire">
 <label form="nom_articel">Date De Fabrication</label>
 <input value="<?= !empty($_GET['id']) ? $article ['date_fabrication']: ""?>" type="datetime-local" class="form-control" name="date_de_fabrication" id="date_de_fabrication" placeholder="veuillez saisir le date de fabrication">
 <label form="nom_articel">Date D'expiration</label>
 <input value="<?= !empty($_GET['id']) ? $article ['date_expiration']: ""?>" type="datetime-local" class="form-control" name="date_expiration" id="date_d'expiration" placeholder="veuillez saisir le date d'expiration">  
 <button type="submit" name="submit" class="btn btn-primary ">Valider</button>
</form>      
      </div>
 
    </div>
    </div>
      </div>
      <div class="col">
      <table id="article" class="table  table-light table-striped d-flex justify-content-center ">
    <tr>
      <th scope="col">Nom Article</th>
      <th scope="col">Categorie</th>
      <th scope="col">Quantité</th>
      <th scope="col">Prix Unitaire</th>
      <th scope="col">Date De Fabrication</th>
      <th scope="col">Date D'expiration</th>
      <th scope="col">Action</th>
    </tr>
 <?php 
 $articles=getArticle() ;
 if(!empty($articles)&& is_array($articles)) {
    foreach($articles as $key => $value) {
        ?>
        <tr>
        <th scope="row"><?= $value ['nom_article']?></th>
        <th scope="row"><?= $value ['categorie']?></th>
        <th scope="row"><?= $value ['quantite']?></th>
        <th scope="row"><?= $value ['prix_unitaire']?></th>
        <th scope="row"><?= $value ['date_fabrication']?></th>
        <th scope="row"><?= $value ['date_expiration']?></th>
        <th scope="row"> <a href="?id=<?=$value['id'] ?> "><i class='bx bx-edit-alt'></i></a></th>
       </tr>
       <?php
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
        const table=document.getElementById('article') ;
      
        const input =document.getElementById('search') ;
        input.addEventListener('input',function(event){
          console.log(event.target.value) ;
          filtreTable(document.getElementById('article'),event.target.value);
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