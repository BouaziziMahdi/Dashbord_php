<?php 
include 'connexion.php';
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
function getclient($id=null) {
    if (!empty($id)) {
       $sql ="SELECT * FROM client WHERE id=?";
   $req = $GLOBALS['connexion']->prepare($sql);
    $req->execute(array($id));
     return $req->fetch();
    } else {
       $sql="SELECT * FROM client" ;
   $req = $GLOBALS['connexion']->prepare($sql);
    $req->execute();
     return $req->fetchALL();
    }
   }

   function getvente( $id=null) {
    if ($id!=null) {
       $sql ="SELECT *
       FROM client,article,vente  WHERE vente.id_article=article.id AND vente.id_client=client.id and vente.id=?";
         $req = $GLOBALS['connexion']->prepare($sql);
         $req->execute(array($id));
         return $req->fetch();
    } else {
        $sql="SELECT vente.etat,vente.id, nom_article, nom, prenom, vente.quantite, prix, date_vente
        FROM client , vente , article WHERE vente.id_article=article.id AND vente.id_client=client.id " ;
                $req = $GLOBALS['connexion']->prepare($sql);
      $req->execute();
     return $req->fetchALL();
    }
   }

   function getfournisseur($id=null) {
    if (!empty($id)) {
       $sql ="SELECT * FROM fournisseur WHERE id=?";
   $req = $GLOBALS['connexion']->prepare($sql);
    $req->execute(array($id));
     return $req->fetch();
    } else {
       $sql="SELECT * FROM fournisseur" ;
   $req = $GLOBALS['connexion']->prepare($sql);
    $req->execute();
     return $req->fetchALL();
    }
   }

   function getcommande( $id=null) {
    if ($id!=null) {
       $sql ="SELECT *
       FROM fournisseur,article,commande  WHERE commande.id_article=article.id AND commande.id_fournisseur=fournisseur.id and commande.id=?";
         $req = $GLOBALS['connexion']->prepare($sql);
         $req->execute(array($id));
         return $req->fetch();
    } else {
        $sql="SELECT commande.id, nom_article, nom, prenom, commande.quantite, prix, date_commande
        FROM fournisseur , commande , article WHERE commande.id_article=article.id AND commande.id_fournisseur=fournisseur.id " ;
                $req = $GLOBALS['connexion']->prepare($sql);
      $req->execute();
     return $req->fetchALL();
    }
   } 

   function getALLcommande() {
  $sql="SELECT COUNT(*) AS nbre FROM commande" ;
  $req = $GLOBALS['connexion']->prepare($sql);
    $req->execute();
     return $req->fetch();

   }
   function getALLvente() {
    $sql="SELECT COUNT(*) AS nbre FROM vente WHERE etat=? " ;
    $req = $GLOBALS['connexion']->prepare($sql);
      $req->execute(array(1));
       return $req->fetch();
  
     }
     function getALLarticle() {
        $sql="SELECT COUNT(*) AS nbre FROM article" ;
        $req = $GLOBALS['connexion']->prepare($sql);
          $req->execute();
           return $req->fetch();
      
         }
         function getCA() {
            $sql="SELECT SUM(prix) AS prix FROM vente" ;
            $req = $GLOBALS['connexion']->prepare($sql);
              $req->execute();
               return $req->fetch();
          
             }
             function getlastcommande() {
                $sql="SELECT commande.id, nom_article, nom, prenom, commande.quantite, prix, date_commande
                FROM fournisseur , commande , article WHERE commande.id_article=article.id AND commande.id_fournisseur=fournisseur.id " ;
                        $req = $GLOBALS['connexion']->prepare($sql);
              $req->execute();
             return $req->fetchALL();
             } 
             function getlastclient() {
                $sql="SELECT vente.etat,vente.id, nom_article, nom, prenom, vente.quantite, prix, date_vente
        FROM client , vente , article WHERE vente.id_article=article.id AND vente.id_client=client.id " ;
                        $req = $GLOBALS['connexion']->prepare($sql);
              $req->execute();
             return $req->fetchALL();
             }
               
             function getMostclient() {
                $sql="SELECT nom_article, prix
        FROM client , vente , article WHERE vente.id_article=article.id AND vente.id_client=client.id AND etat=?
        GROUP BY vente.id ORDER BY SUM('prix') Desc limit 10 " ;
                        $req = $GLOBALS['connexion']->prepare($sql);
              $req->execute(array(1));
             return $req->fetchALL();
             }

        
?>