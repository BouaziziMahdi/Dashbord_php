<?php 

include '../model/connexion.php';

 $id=$_GET['id'];
 $sql=$connexion->prepare(" DELETE from commande where id=$id");
 $sql->execute([$id]);

 header("location:./commande.php");
 ?>

<?php
