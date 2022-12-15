 <?php  
 include 'connexion.php' ;

if(isset($_POST['submit'])) {
    extract($_POST);
if(empty($nom) || strlen($nom)<3){
    header("location:../vue/fournisseur.php?msg=enter un nom valide&class=danger");
    exit;
}
if(empty($prenom) || strlen($prenom)<3){
    header("location:../vue/fournisseur.php?msg=enter un prenom valide&class=danger");
    exit;
}
if(empty($telephone) || strlen($telephone)<3){
    header("location:../vue/fournisseur.php?msg=enter un telephone valide&class=danger");
    exit;
}
if(empty($adress) || strlen($adress)<3){
    header("location:../vue/fournisseur.php?msg=enter un adress valide&class=danger");
    exit;
}
$sql= "INSERT INTO fournisseur(nom, prenom, telephone, adress)VALUES(?,?,?,?)";
$req=$connexion->prepare($sql) ;
$req->execute(array(
    $_POST['nom'],
    $_POST['prenom'],
    $_POST['telephone'],
    $_POST['adress']
));
    header("location:../vue/fournisseur.php?msg=fournisseur ajouter avec success&class=success");
    exit;
}
 include '../vue/fournisseur.php';
 ?>
