 <?php  
 include 'connexion.php' ;

if(isset($_POST['submit'])) {
    extract($_POST);
if(empty($nom_article) || strlen($nom_article)<3){
    header("location:../vue/article.php?msg=enter un nom_article valide&class=danger");
    exit;
}

$sql= "INSERT INTO article(nom_article,Categorie,Quantite,Prix_unitaire,date_fabrication,date_expiration)
values(?,?,?,?,?,?)";
$req=$connexion->prepare($sql) ;
$req->execute(array(
    $_POST['nom_article'],
    $_POST['Catégorie'],
    $_POST['Quantité'],
    $_POST['Prix_unitaire'],
    $_POST['date_de_fabrication'],
    $_POST['date_expiration']
));
    header("location:../vue/article.php?msg=article ajouter avec success&class=success");
    exit;
}
 include '../vue/article.php';
 ?>
