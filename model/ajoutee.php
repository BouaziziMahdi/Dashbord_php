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
if(isset($_POST['submit'])) {

$article=getArticle($_POST['id_article']) ;
if(!empty($article) && is_array($article)){
if($_POST['quantite'] > $article['quantite']) {
    header("location:../vue/vente.php?msg= la quantite n'est pas disponible&class=danger");
}else {
$sql= "INSERT INTO vente(id_article,id_client,quantite,prix)values(?,?,?,?)";
$req=$connexion->prepare($sql) ;
$req->execute(array(
    $_POST['id_article'],
    $_POST['id_client'],
    $_POST['Quantité'],
    $_POST['Prix'],
 
));}
$sql="UPDATE article SET quantite=quantite-? WHERE id=?" ;
$req=$connexion->prepare($sql) ;
$req->execute(array(
    $_POST['id_article'],
    $_POST['id_client'],
));
    header("location:../vue/article.php?msg=vente effectue avec success&class=success");
    exit;
} else {
    header("location:../vue/vente.php?msg= erreur de l'operartion   &class=danger");
}
}
 include '../vue/vente.php';
 ?>
