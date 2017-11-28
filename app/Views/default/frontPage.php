<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<body class="align" id="homeco">
<div class="login">
  <h1>Se Connecter</h1>
    <form method="post">
      <input type="text" placeholder="Nom" required="required" id="username" name="username" />
        <input type="password" id="password" name="password" placeholder="Mots de passe" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large" name="button-login" id="button-login">     
            <p>Se Connecter</p> 
            <?php if($w_user) : ?>
          <?php if($w_user['role'] === 'user') : ?>
            <?php $this->url('default_profile')?>
          <?php elseif($w_user['role'] === 'admin'): ?>
            <?php $this->url('default_profile_admin'); ?>
          <?php  endif; ?> <!-- $w_user['role'] -->
        <?php  endif; ?><!-- if($w_user) --> 
      </button>
         <li><a href="<?php echo $this->url('security_forget'); ?>">Mot de passe oublié</a></li>          
    </form>
</div>
</body>
<?php $this->stop('script') ?>
