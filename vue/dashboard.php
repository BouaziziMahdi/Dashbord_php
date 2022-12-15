<?php 
include 'header.php' ; 
include '../model/fonction.php' ;
?>
<div class="home-content">
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Commande</div>
              <div class="number"><?php echo getALLcommande()['nbre']?></div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Depuis hier</span>
              </div>
            </div>
            <i class="bx bx-cart-alt cart"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Vente</div>
              <div class="number"><?php echo getALLvente()['nbre']?></div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Depuis hier</span>
              </div>
            </div>
            <i class="bx bxs-cart-add cart two"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Article</div>
              <div class="number"><?php echo getALLarticle()['nbre']?></div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Depuis hier</span>
              </div>
            </div>
            <i class="bx bx-cart cart three"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Revenu</div>
              <div class="number"><?php echo number_format(getCA()['prix'],0,',',' ')?></div>
              <div class="indicator">
                <i class="bx bx-down-arrow-alt down"></i>
                <span class="text">Aujourd'hui</span>
              </div>
            </div>
            <i class="bx bxs-cart-download cart four"></i>
          </div>
        </div>

        <div class="sales-boxes">
          <div class="recent-sales box">
            <div class="title">Vente recentes</div>
            <?php
                $commantes=getlastcommande();
                $clients=getlastclient();
              ?>
            <div class="sales-details">
              <ul class="details">
                <li class="topic">Date</li>
           <?php 
           foreach($commantes as $key => $value) {
                  ?>
                   <li><a href="#"><?php echo date('d M Y',strtotime($value['date_commande'])) ?></a></li>
                  <?php
           }
                      ?>
              </ul>
              <ul class="details">
                <li class="topic">Client</li>
                <?php 
             foreach($clients as $key => $value) {
                    ?>
                     <li><a href="#"><?php echo $value['nom']."".$value['prenom'] ?></a></li>
                    <?php
             }
                        ?>
              
              </ul>
              <ul class="details">
              <?php 
             foreach($clients as $key => $value) {
                    ?>
                     <li><a href="#"><?php echo $value['nom_article'] ?></a></li>
                    <?php
             }
                        ?>
               
              </ul>
              <ul class="details">
                <li class="topic">Prix</li>
                <?php 
             foreach($clients as $key => $value) {
                    ?>
                     <li><a href="#"><?php echo $value['prix']?></a></li>
                    <?php
             }
                        ?>
               
              </ul>
            </div>
            <div class="button">
              <a href="#">Voir Tout</a>
            </div>
          </div>
          <div class="top-sales box">
            <div class="title">Produit le plus vendu</div>
            <ul class="top-sales-details">
              <?php $articles=getMostclient() ; 
                
                 foreach($articles as $key => $value) {
                  ?>
                  <li>
                <a href="#">
                 
                  <span class="product"><?php echo $value['nom_article']?></span>
                </a>
                <span class="price"><?php echo $value['prix']?></span>
              </li>
                  <?php
                 }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </section>
     <?php 
      include 'footer.php' ;
    ?>