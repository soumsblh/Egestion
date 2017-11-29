<?php $this->layout('layout', ['title' => 'Créer un Matériels']) ?>

<?php $this->start('main_content') ?>
<body class="align" id="homeco">
<div id="register">
  <div class="container register">
    <div class="row">
      <form class="col-md-4 col-md-push-4" method="POST">
        <h2>Ajouter un Matériels :</h2>
          <div class="form-group">
              <label for="">Materiels :</label>
              <select class="form-control" name="id_type">
                  <option disabled selected>Veuillez Sélectionné le matériel</option>
                  <?php foreach ($listtype as $type) : ?>
                      <option name="id_type" value="<?= $type['id_type'] ?>" ><?= $type['TypeMateriel'];?></option>
                  <?php endforeach; ?>
              </select>
          </div>
          <div class="form-group">
              <label for="">Materiels :</label>
              <select class="form-control" name="id_marque">
                  <option disabled selected>Veuillez Sélectionné le matériel</option>
                  <?php foreach ($listMarque as $marque) : ?>
                      <option name="id_marque" value="<?= $marque['id_marque'] ?>" ><?= $marque['nom_marque'];?></option>
                  <?php endforeach; ?>
              </select>
          </div>
        <div class="form-group">
          <label class="control-label" for="ModelMateriel">Model Materiel :</label>
          <input type="text" class="form-control" id="ModelMateriel" name="ModelMateriel" ">
        </div>
        <div class="form-check form-check-inline">
          <label>Saisir l'etat du matériels </label><br>
            <label class="form-check-label" for="id_Etat">   
                <input class="form-check-input" type="radio" id="id_Etat" name="id_Etat"  value="1"> BON
            </label>
            <label class="form-check-label" for="id_Etat">
                <input class="form-check-input" type="radio"  id="id_Etat" name="id_Etat"  value="2"> Moyen
            </label>
            <label class="form-check-label" for="id_Etat">
                <input class="form-check-input" type="radio"  id="id_Etat" name="id_Etat"  value="3"> Mediocre
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
      </form>
    </div> <!-- .row -->
  </div> <!-- .container -->
</div><!-- #register --> 
</body>

<?php $this->stop('main_content') ?>
