<?php $this->layout('layout', ['title' => 'Créer un Matériel']) ?>

<?php $this->start('main_content') ?>
<body class="align" id="homeco">
<div>
    <div style="margin-top: 200px"></div>
</div>
<div id="register">
  <div class="container register">
    <div class="row">
      <form class="col-md-4 col-md-push-4" method="POST">
        <h2>Ajouter un Matériel :</h2>
          <div class="form-group">
              <label for="">Type :</label>
              <select class="selectpicker form-control" data-live-search="true" name="id_type">
                  <option disabled selected>Veuillez Sélectionner le matériel</option>
                  <?php foreach ($listtype as $type) : ?>
                      <option name="id_type" value="<?= $type['id_type'] ?> data-tokens="<?= $type['TypeMateriel'];?>" ><?= $type['TypeMateriel'];?></option>
                  <?php endforeach; ?>
              </select>
          </div>
          <div class="form-group">
              <label for="">Marque :</label>
              <select class="selectpicker form-control" data-live-search="true" name="id_marque">
                  <option disabled selected>Veuillez Sélectionner la marque</option>
                  <?php foreach ($listMarque as $marque) : ?>
                  <option name="id_marque" value="<?= $marque['id_marque'] ?> data-tokens="<?= $marque['nom_marque'];?>" ><?= $marque['nom_marque'];?></option>
                  <?php endforeach; ?>
              </select>
          </div>
        <div class="form-group">
          <label class="control-label" for="ModelMateriel">Modèle Materiel :</label>
          <input type="text" class="form-control" id="ModelMateriel" name="ModelMateriel" ">
        </div>
        <div class="form-check form-check-inline">
          <label>Saisir l'état du matériel </label><br>
            <label class="form-check-label" for="id_Etat">   
                <input class="form-check-input" type="radio" id="id_Etat" name="id_Etat"  value="1"> BON
            </label>
            <label class="form-check-label" for="id_Etat">
                <input class="form-check-input" type="radio"  id="id_Etat" name="id_Etat"  value="2"> Moyen
            </label>
            <label class="form-check-label" for="id_Etat">
                <input class="form-check-input" type="radio"  id="id_Etat" name="id_Etat"  value="3"> Médiocre
            </label>
            <label class="form-check-label" for="id_Etat">
                <input class="form-check-input" type="radio"  id="id_Etat" name="id_Etat"  value="4"> Mauvais
            </label>  
          </div>
         <div class="form-group">
              <label for="">Quantité mis à disposition :</label>
              <input type="number" class="form-control" name="QuantiteMateriels" id="QuantiteMateriels" " >
        </div>
        <button type="submit" class="btn btn-default" name="button-register">Enregistrer</button>
         <?php if ($w_user['role'] === 'admin') : ?>
                    <button  href="<?= $this->url('default_profile_admin') ?>" class="btn btn-default">Annuler</button>
                <?php elseif ($w_user['role'] === 'user') :?>
                    <button  href="<?= $this->url('default_profile') ?>" class="btn btn-default">Annuler</button>
          <?php endif ;?>
      </form>
    </div> <!-- .row -->
  </div> <!-- .container -->
</div><!-- #register --> 
</body>

<?php $this->stop('main_content') ?>
