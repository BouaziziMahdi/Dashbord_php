 <?php  
 include 'connexion.php' ;

if(isset($_POST['submit'])) {

$sql= "UPDATE article SET nom_article=?,categorie=?,quantite=?,prix_unitaire=?,date_fabrication=?,date_expiration=? 
 WHERE id=? " ;
$req=$connexion->prepare($sql) ;
$req->execute(array(
    $_POST['nom_article'],
    $_POST['Catégorie'],
    $_POST['Quantité'],
    $_POST['Prix_unitaire'],
    $_POST['date_de_fabrication'],
    $_POST['date_expiration'],
    $_POST['id'],
));
if($req){
header("location:../vue/article.php?msg=article modifier avec succes&class=success");
    exit;
}
}
include '../vue/article.php';
 ?>
