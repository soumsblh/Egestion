<?php $this->layout('layout', ['title' => 'Changer mes informations']) ?>

<?php $this->start('main_content') ?>
<body class="align" id="homeco">
    <div >
      <div class="col-md-6 col-md-push-3" id="login">
        <h3 class="text-center">Changer mon adresse email</h3>
        <div class="form-group">
          <label for="">Adresse email actuelle :</label>
          <input class="form-control" type="text" value="<?= $profil['email']; ?>" disabled="">
        </div>
        <form class="" action="" method="post">
          <div class="form-group <?= (isset($message['lastname'])) ? 'has-error' : ''?>">
            <label for="email">Nouvelle adresse email :</label>
            <input id="email" name="email" type="text" class="form-control" placeholder="Email">
            <?= (isset($message['email'])) ? '<span class="help-block">'.$message['email'].' .</span>'  : '' ?>
          </div>
          <button class="btn btn-success center-block" type="submit" name="button-email">Changer mon adresse email</button>
        </form>
        <br>
        <h3 class="text-center">Changer mon mot de passe</h3>
        <form class="" action="" method="post">
          <div class="form-group">
            <label for="password">Nouveau mot de passe :</label>
            <input id="password" name="password" type="password" class="form-control" placeholder="Mot de passe">
          </div>
          <div class="form-group">
            <label for="cfpassword">Confirmer le nouveau mot de passe :</label>
            <input id="cfpassword" name="cfpassword" type="password" class="form-control" placeholder="Mot de passe">
          </div>
          <button class="btn btn-success center-block" type="submit" name="button-password">Changer mon mot de passe</button>
              <?php if ($w_user['role'] === 'admin') : ?>
                    <a  href="<?= $this->url('default_profile_admin') ?>" class="btn btn-default">Annuler</a>
                <?php elseif ($w_user['role'] === 'user') :?>
                    <a  href="<?= $this->url('default_profile') ?>" class="btn btn-default">Annuler</a>
                <?php endif ;?>
        </form>
      </div>
  </div><!-- .container-fluid -->
</body>

<?php $this->stop('main_content') ?>
