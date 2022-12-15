 <?php  
 include 'connexion.php' ;

 function getArticle($id=null) {
    if (!empty($id)) {
       $sql ="SELECT * FROM article WHERE id=?";
   $req = $GLOBALS['connexion']->prepare($sql);
    $req->execute(array($id));
     return $req->fetch();
    } else {
       $sql="SELECT * FROM article" ;
   $req = $GLOBALS['connexion']->prepare($sql);
    $req->execute();
     return $req->fetchALL();
    }
   }


$sql= "INSERT INTO commande(id_article,id_fournisseur,quantite,prix)values(?,?,?,?)";
$req=$connexion->prepare($sql) ;
$req->execute(array(
    $_POST['id_article'],
    $_POST['id_fournisseur'],
    $_POST['Quantité'],
    $_POST['Prix'],
 
));
$sql="UPDATE article SET quantite=quantite+? WHERE id=?" ;
$req=$connexion->prepare($sql) ;
$req->execute(array(
    $_POST['id_article'],
    $_POST['id_client'],
));
    header("location:../vue/article.php?msg=commande effectue avec success&class=success");
    exit;

 include '../vue/commande.php';
 ?>
