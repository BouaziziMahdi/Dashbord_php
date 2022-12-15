<?php 
include 'header.php' ;

include '../model/fonction.php';

if(!empty($_GET['id'])) {
 $client= getclient($_GET['id']);
}
?>

    <div class="home-content"> 
<div class="container d-flex justify-content-center">
  <div class="row ">
<div class="col">
    <div class="container" >
<div class="card" style="width: 30rem;">
      <div class="card-body">
      <form action="<?= empty($_GET['id']) ? "../model/ajouteClient.php" : "../model/motifierclient.php"?>" method="post">
           <?php if(array_key_exists('msg',$_GET)): ?>
        <div class="alert alert-<?= $_GET['class'] ?>" role="alert">
           <?= $_GET['msg'] ?>
         </div>
    <?php endif;?>
            <input value="<?= !empty($_GET['id']) ? $client['id'] : ""?>" type="hidden" class="form-control" name="id" id="nom" placeholder="veuillez saisir le nom"> 
            <label form="nom">nom</label>
            <input value="<?= !empty($_GET['id']) ? $client['nom']: ""?>" type="text" class="form-control" name="nom" id="nom" placeholder="veuillez saisir le nom"> 
            
            <label form="prenom">prenom</label>
            <input value="<?= !empty($_GET['id']) ? $client['prenom']: ""?>" type="text" class="form-control" name="prenom" id="prenom" placeholder="veuillez saisir le prenom"> 
            
<label form="telephone">N Telephone</label>
 <input value="<?= !empty($_GET['id']) ? $client ['telephone']: ""?>" type="text" class="form-control" name="telephone" id="telephone" placeholder="veuillez saisir votre Telephone">
 <label form="adress">Adress</label>
 <input value="<?= !empty($_GET['id']) ? $client ['adress']: ""?>"  type="text" class="form-control" name="adress" id="adress" placeholder="veuillez saisir le adress">

 <button type="submit" name="submit" class="btn btn-primary ">Valider</button>
</form>      
      </div>
 
    </div>
    </div>
      </div>
      <div class="col">
      <table id="client" class="table  table-light table-striped d-flex justify-content-center ">
    <tr>
      <th scope="col">Nom </th>
      <th scope="col">Prénom</th>
      <th scope="col">Telephone</th>
      <th scope="col">Adress</th>

      <th scope="col">Action</th>
    </tr>
 <?php 
 $clients=getclient() ;
 if(!empty($clients)&& is_array($clients)) {
    foreach($clients as $key => $value) {
        ?>
        <tr>
        <th scope="row"><?= $value ['nom']?></th>
        <th scope="row"><?= $value ['prenom']?></th>
        <th scope="row"><?= $value ['telephone']?></th>
        <th scope="row"><?= $value ['adress']?></th>
        <th scope="row"><a href="?id=<?=$value['id'] ?>"><i class='bx bx-edit-alt'></i></a></th>
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
        const table=document.getElementById('client') ;
      
        const input =document.getElementById('search') ;
        input.addEventListener('input',function(event){
          console.log(event.target.value) ;
          filtreTable(document.getElementById('client'),event.target.value);
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