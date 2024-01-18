<?php
require_once('header.php');
?>

<div class="row">
  <div class="col-lg-4">
    <div class="card mb-4">
      <div class="card-body text-center">
        <div id="qrcode"></div>
        <?php
        if ($row) {
          echo "<div class='d-flex justify-content-start mb-2'>
                           <a href='edit.php' class='btn btn-primary'>Modifier QRCODE</a>
                        </div>";
        }
        ?>

      </div>
    </div>

  </div>
  <div class="col-lg-8">
    <div class="card mb-4">
      <?php
      if ($row) {
        echo '<div class="card-body">
                <div class="row">

                  <div class="col-sm-3">
                    <p class="mb-0">nom</p>

                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">' . $row['nom'] . '</p>
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">prenom</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">' . $row['prenom'] . '</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">' . $row['email'] . '</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Mobile</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">' . $row['telephone'] . '</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Addresse</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">' . $row['Adresse'] . '</p>
                  </div>
                </div>
              </div>';
      }
      ?>

    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card mb-4 mb-md-0">
          <div class="card-body">
            <?php

            if ($row) {
              echo ' <p class="mb-4"><span class="text-primary font-italic me-1">sites</span>
                        </p>
                        <a href="' . $row['site'] . '" class="mb-1" style="font-size: .77rem;">site</a>';
            } else {
              echo ' <p class="mb-4"><span class="text-primary font-italic me-1">simple et éfficace</span>';
            }
            ?>
          </div>

        </div>
        <?php
        if ($row) {
          echo '';
        } else {
          echo '<a href="creer.php" class="btn btn-primary text-white">
                    créer un QRCODE 
                  </a>';
        }
        ?>

      </div>

      <div class="col-md-6">
        <div class="card mb-4 mb-md-0">
          <div class="card-body">
            <?php
            if ($row) {
              echo '<p class="mb-4"><span class="text-primary font-italic me-1">réseaux sociaux</span></p>';

              if($row['facebook'] !==""){
                echo '<p><a href="' . $row['facebook'] . '" class="mb-1" style="font-size: .77rem;">facebook</a></p>';
                
              }
              if($row['twitter'] !==""){
                echo '<p><a href="' . $row['twitter'] . '" class="mb-1" style="font-size: .77rem;">Twitter</a></p>';
              }
              if($row['instagram'] !==""){
                echo '<p><a href="' . $row['instagram'] . '" class="mb-1" style="font-size: .77rem;">Twitter</a></p>';
                
              }
                            
            } else {
              echo '<p class="mb-4"><span class="text-primary font-italic me-1">créer votre propre QR code en appuyant sur le bouton en dessus</span>';
      
            }
            ?>

          </div>
        </div>
      </div>
    </div>

    <?php
    if ($row) {
      echo '
      <form method="POST" action="generate.php">
          <div class="input-nom-prenom ">

           <div class="">
              <input id="nom" type="hidden" value="' . $row['indice'] . '" name="indice" id="indice" class="form-control" oninput="change(this)" required>
          </div>
          <button type="submit" name="png" class="btn btn-info text-white mb-4">
              télécharger mon QRCODE
          </button>
          </div>
    </form>';
    }
    ?>


  </div>
</div>
</div>
<?php
require_once('footer.php');



?>