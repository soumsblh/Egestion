<?php $this->layout('layout', ['title' => 'Ajouté un Emprunt']) ?>

<?php $this->start('main_content') ?>
<body class="align" id="homeco">
<div id="register">
    <div class="container register">
      <h1 class="text-center">Ajouter un Emprunt:</h1>
      <form class="col-lg-4 col-lg-push-4" method="POST">
        <div class="form-group">
            <label for="">Etudiant :</label>
              <select class="form-control" name="id_Emprunteur">
                 <option>Veuillez Sélectionné L'étudiant</option>
               <?php foreach ($emprunt as $event) : ?>
                <option value="<?= $event['id_Emprunteur']?>"><?= $event['Nom']?></option>
                <?php endforeach; ?>
              </select>
        </div>
        <div class="form-group">
            <label for="">Materiels :</label>
              <select class="form-control" name="id_Materiels">
                 <option>Veuillez Sélectionné le(s) matériel(s) a emprunter</option>
               <?php foreach ($listMat as $mat) : ?>
                <option value="<?= $mat['id_Materiels'] ?>" ><?= $mat['TypeMateriel']."  ".$mat['nom_marque']."  ".$mat['ModelMateriel'];?></option>
              <?php endforeach; ?>
              </select>
            </div>  
              <label for="">Date Prévu de Retour :</label>
                <div class="input-group date" style="height:25px;" data-provide="datepicker">
                <input type="text" class="form-control" name="DatePrevRetour">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
              </div>
            <div class="form-group">
              <label for="">Quantité emprunter :</label>
              <input type="number" class="form-control" name="QuantiteEmprunter" >
            </div>
            <div class="form-group">
              <label for="">Etat de matériel à la sortie :</label>
              <select class="form-control" name="id_Etat_1">
                 <option>Veuillez Sélectionné l'etat du matériel a emprunter</option>
               <?php foreach ($listetat as $etat) : ?>
                <option value="<?= $event['id_Etat_1']?>"><?= $etat['Libelle'];?></option>
              <?php endforeach; ?>
              </select>
            </div>
        <button id="publie" type="submit" class="btn btn-default">Publier l'évènement</button>
      </form>
    </div>
</div>
</body>
<?php $this->stop('main_content') ?>
