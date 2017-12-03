<?php $this->layout('layout', ['title' => 'event_update']); ?>

<?php $this->start('main_content'); ?>



<body  class="align" id="homeco">
   <div class="container register">
     <h1>Modifier un Emprunt</h1>
        <div>
            <?php if($w_user) : ?>
                <!--<a href="<?php //echo $this->url('event_index') ?>">< Revenir à la liste des articles</a>-->
            <?php else : ?>

            <?php endif; ?>
        </div>
        <form class="col-lg-4 col-lg-push-4" method="POST" action="">
            <div class="form-group">
                <label for="id_Emprunteur">Emprunteur :</label>
                <input type="text" class="form-control" name="id_Emprunteur" value="<?php echo $emprunt['id_Emprunteur']; ?>">
            </div>
            <div class="form-group">
                <label for="DatePrevRetour">Date de l'evenement :</label>
                <input type="date" class="form-control" name="DatePrevRetour" value="<?= $emprunt['DatePrevRetour']; ?>">
              </div>
            <div class="form-group">
                <label for="id_Materiels">Materiels :</label>
                <input type="text" class="form-control" name="id_Materiels" value="<?= $emprunt['id_Materiels']; ?>"">
            </div>
             <hr>
            <div class="form-group">
              <label for="QuantiteEmprunter">Quantité Emprunter :</label>
              <input type='number' name='QuantiteEmprunter' class="form-control" value="<?= $emprunt['QuantiteEmprunter']; ?>"/>
            </div>
            <div class="form-group">
              <label for="id_Etat_1">Etat :</label>
              <input type='text' name='id_Etat_1' class="form-control" value="<?= $emprunt['id_Etat_1']; ?>"  />
            </div>
            <button class="btn btn-submit">Editer l'emprunt</button>
        </form>
    </div>
</body>
<?php $this->stop('main_content'); ?>
