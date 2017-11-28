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
               <label class="control-label" for="TypeMateriels">Numéros de Matériels:</label>
                <input type="text" class="form-control" id="id_type" name="id_type"  >
            </div>   
        <div class="form-group ">
          <label class="control-label" for="TypeMateriels">Type de Matériel (ex : Souris/Clavier) :</label>
          <input type="text" class="form-control" id="TypeMateriels" name="TypeMateriels" ">
        </div>

        <div class="form-group">
          <label class="control-label" for="nom_marque">Marque:</label>
          <input type="text" class="form-control" id="nom_marque" name="nom_marque" ">
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
              <input type="number" class="form-control" name="QuantiteEmprunter" id="QuantiteEmprunter" " >
        </div>
        <button type="submit" class="btn btn-default" name="button-register">Enregistrer</button>
      </form>
    </div> <!-- .row -->
  </div> <!-- .container -->
</div><!-- #register --> 
</body>

<?php $this->stop('main_content') ?>
