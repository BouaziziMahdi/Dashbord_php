<!DOCTYPE html>  
<?php
include '../model/connexion.php';
session_start() ; 


?>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title> <?php
     echo ucfirst(str_replace(".php", "" ,basename($_SERVER['PHP_SELF'])) );?></title>
    <link rel="stylesheet" href="../public/css/style.css"/>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' 
    rel='stylesheet' />
    <script src="https://kit.fontawesome.com/c90822e000.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
   
    <div class="sidebar">
      <div class="logo-details">
      <i class='bx bxs-data'></i>
        <span class="logo_name">Gestion Stock</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard.php" class="<?php echo basename($_SERVER['PHP_SELF'])== "dashborad.php" ?"active" :" "?> ">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="../vue/vente.php" class="<?php echo basename($_SERVER['PHP_SELF'])== "vente.php" ?"active" :" "?> ">
          <i class='bx bxs-shopping-bags'></i>
            <span class="links_name">Vente</span>
          </a>
        </li>
        <li>
          <a href="./client.php" class="<?php echo basename($_SERVER['PHP_SELF'])== "client.php" ?"active" :" "?> ">
            <i class="bx bx-user"></i>
            <span class="links_name">Client</span>
          </a>
        </li>
        <li>
          <a href="./article.php" class="<?php echo basename($_SERVER['PHP_SELF'])== "article.php" ?"active" :" "?> ">
            <i class="bx bx-box"></i>
            <span class="links_name">Article</span>
          </a>
        </li>
        <li>
          <a href="fournisseur.php" class="<?php echo basename($_SERVER['PHP_SELF'])== "fournisseur.php" ?"active" :" "?> ">
          <i class="bx bx-user"></i>
            <span class="links_name">fournisseur</span>
          </a>
        </li>
        <li>
          <a href="commande.php" class="<?php echo basename($_SERVER['PHP_SELF'])== "commande.php" ?"active" :" "?> ">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Commandes</span>
          </a>
        </li>
        <li> 
        <a href="modele.php" class="<?php echo basename($_SERVER['PHP_SELF'])== "modele.php" ?"active" :" "?> ">
            <i class='bx bx-exclude'></i>
            <span class="links_name">model</span>
          </a>
        </li>
       
    
        
        <li class="log_out">
          <a href="./index.php">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Déconnexion</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard"> <?php
     echo ucfirst(str_replace(".php", "" ,basename($_SERVER['PHP_SELF'])) );
    
    ?></span>
        </div>
        <div class="input-group px-5">
  <input  id="search" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
  <button    type="button" class="btn btn-outline-primary">search</button>
</div>
        <div class="profile-details">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbiy0xBM8FFmarwdC-2WoFzmg11AdA50YTow&usqp=CAU">
          <a  href="profile.php"> <i class='bx bx-user-circle'></i> </a>
        </div>
      </nav>
    