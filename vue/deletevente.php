<?php 

include '../model/connexion.php';

 $id=$_GET['id'];
 $sql=$connexion->prepare("UPDATE vente SET etat=? where id=?");
 $sql->execute([0,$id]);
 header("location:./vente.php");

?>