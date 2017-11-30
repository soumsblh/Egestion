<?php $this->layout('layout', ['title' => 'Créer un Emprunteur']) ?>

<?php $this->start('main_content') ?>
<body class="align" id="homeco">
<div id="register">
    <div class="container register">
        <div class="row">
            <form class="col-md-4 col-md-push-4" method="POST">
                <h2>Ajouter un Emprunteur </h2>
                <div class="form-group">
                    <label class="control-label" for="Nom">Nom du l'emprunteur :</label>
                    <input type="text" class="form-control" id="Nom" name="Nom" ">
                </div>
                <div class="form-group">
                    <label class="control-label" for="Prenom">Prénom du l'emprunteur :</label>
                    <input type="text" class="form-control" id="Prenom" name="Prenom" ">
                </div>
                <div class="form-group">
                    <label for="">Sélectionner l'Ecole à affecter :</label>
                    <select class="selectpicker form-control" data-live-search="true" name="id">
                        <option disabled selected>Veuillez Sélectionner la promotion </option>
                        <?php foreach ($InfoEmprunteur as $Emprunteur) : ?>
                            <option name="id" value="<?= $Emprunteur['id'] ?> data-tokens="<?= $Emprunteur['id'];?>" ><?= $Emprunteur['Promo']." ".$Emprunteur['NomEcole']." ".$Emprunteur['AnneePromotion'] ;?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-default" name="button-register">Enregistrer</button>
                <?php if ($w_user['role'] === 'admin') : ?>
                    <a  href="<?= $this->url('default_profile_admin') ?>" class="btn btn-default">Annuler</a>
                <?php elseif ($w_user['role'] === 'user') :?>
                    <a  href="<?= $this->url('default_profile') ?>" class="btn btn-default">Annuler</a>
                <?php endif ;?>
            </form>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div><!-- #register -->
</body>

<?php $this->stop('main_content') ?>
