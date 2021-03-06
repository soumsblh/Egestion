<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>
<body class="align" id="homeco">
<div>
    <div style="margin-top: 200px"></div>
</div>
<div id="login">
  <div class="container register">
    <div class="row">
      <form class="col-md-5 col-md-push-4" method="POST">
        <h2>Ajouter un Utilisateur :</h2>
        <div class="form-group <?= (isset($message['lastname'])) ? 'has-error' : ''?>">
          <label class="control-label" for="lastname">Nom :</label>
          <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $lastname  ?>">
          <?= (isset($message['lastname'])) ? '<span class="help-block">'.$message['lastname'].' </span>'  : '' ?>
        </div>

        <div class="form-group <?= (isset($message['firstname'])) ? 'has-error' : ''?>">
          <label class="control-label" for="firstname">Prénom :</label>
          <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $firstname  ?>">
          <?= (isset($message['firstname'])) ? '<span class="help-block">'.$message['firstname'].' </span>'  : '' ?>
        </div>

        <div class="form-group <?= (isset($message['username'])) ? 'has-error' : ''?>">
          <label class="control-label" for="username">Nom d'usage:</label>
          <input type="text" class="form-control" id="username" name="username" value="<?= $username  ?>">
          <?= (isset($message['username'])) ? '<span class="help-block">'.$message['username'].' </span>'  : '' ?>
        </div>

        <div class="form-group <?= (isset($message['email'])) ? 'has-error' : ''?>">
          <label class="control-label" for="email">Email :</label>
          <input type="text" class="form-control" id="email" name="email" value="<?= $email ?>">
          <?= (isset($message['email']) ) ? '<span class="help-block">'.$message['email'].' </span>'  : '' ?>
        </div>
        <div class="form-check form-check-inline <?= (isset($message['Id_Ecole'])) ? 'has-error' : ''?>">
          <label style="display: none">Votre utilisateur fera partie de ? </label><br>
        <?php if($w_user['Id_Ecole'] == 1) :?> 
            <label class="form-check-label" for="Id_Ecole">   
                <input class="form-check-input" type="radio" id="Id_Ecole" name="Id_Ecole"  value="1"> EPSI
            </label>
        <?php elseif($w_user['Id_Ecole'] == 2) :?> 
            <label class="form-check-label" for="Id_Ecole">
                <input class="form-check-input" type="radio"  id="Id_Ecole" name="Id_Ecole"  value="2"> Votre utilisateur fera partie de : OSS
            </label>
        <?php elseif($w_user['Id_Ecole'] == 3) :?> 
            <label class="form-check-label" for="Id_Ecole">
                <input class="form-check-input" type="radio"  id="Id_Ecole" name="Id_Ecole"  value="3"> Votre utilisateur fera partie de : WIS
            </label>
             <?= (isset($message['Id_Ecole']) ) ? '<span class="help-block">'.$message['Id_Ecole'].' </span>'  : '' ?>
        <?php endif;?>      
        </div>
      <div class="form-group <?= (isset($message['password'])) ? 'has-error' : ''?>">
          <label for="password">Mot de passe  :</label>
          <input type="password" class="form-control" id="password" name="password">
          <?= (isset($message['password']) ) ? '<span class="help-block">'.$message['password'].' </span>'  : '' ?>
        </div>

        <div class="form-group <?= (isset($message['cfpassword'])) ? 'has-error' : ''?>">
          <label for="cfpassword">Confirmation du Mot de passe  :</label>
          <input type="password" class="form-control" id="cfpassword" name="cfpassword">
          <?= (isset($message['cfpassword']) ) ? '<span class="help-block">'.$message['cfpassword'].' </span>'  : '' ?>
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
