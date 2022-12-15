 <?php  
 include 'connexion.php' ;

if(isset($_POST['submit'])) {
$sql= "UPDATE client SET nom=?,prenom=?,telephone=?,adress=? WHERE id=? " ;
$req=$connexion->prepare($sql) ;
$req->execute(array(
    $_POST['nom'],
    $_POST['prenom'],
    $_POST['telephone'],
    $_POST['adress'],
    $_POST['id'],
));
if($req){
header("location:../vue/client.php?msg=client modifier avec succes&class=success");
   
}
}
include '../vue/client.php';
 ?>
