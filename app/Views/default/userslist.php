<?php $this->layout('layout', ['title' => 'Liste des utilisateurs Administrateur']) ?>

<?php $this->start('main_content') ?>
<div id="userslist">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2 col-sm-3 panel-admin">
        <h3 class="text-center">Bonjour <?= $w_user['firstname']; ?></h3 >
        <div class="list-group">
         <ul class="list-unstyled" id="admin">
            <li>
              <a href="<?= $this->url('default_profile_admin'); ?> " class="list-group-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> Emprunts <span class="badge"><?= $count_events['emprunt']; ?></span></a>
            </li>
            <li>
              <a href="<?= $this->url('default_userslist'); ?>" class="list-group-item"><i class="fa fa-user-circle" aria-hidden="true"></i> Utilisateurs <span class="badge"><?= $count_users['users']; ?></span></a>
            </li>
            <li>
              <a href="<?= $this->url('equipement_equipement'); ?>" class="list-group-item"><i class="fa fa-briefcase" aria-hidden="true"></i> Materiels <span class="badge"><?= $count_list['list']; ?></span></a>
            </li>
             <li>
              <a href="<?= $this->url('emprunt_emprunteur'); ?>" class="list-group-item"><i class="fa fa-users" aria-hidden="true"></i> Emprunteurs <span class="badge"><?= $count_emprunteur['emprunteur']; ?></span></a>
            </li>
          </ul>
        </div>
        <hr>
        <div class="list-group">
        <a href="<?= $this->url('security_logout'); ?>" class="list-group-item list-group-item active">  Exporté Votre Base</a> 
        <a href="<?= $this->url('security_logout'); ?>" class="list-group-item list-group-item-success active">  Importé Votre Base</a>                    
        </div>
        <div class="list-group">
        <a href="<?= $this->url('security_logout'); ?>" class="list-group-item list-group-item-danger active ">Deconnexion</a>                  
        </div>

      </div>
      <div class="col-md-10 col-sm-9">
        <h2 class="text-center">Utilisateurs</h2>
        <hr>
         <a class="btn btn-success"  href="<?php echo $this->url('security_register'); ?>">Ajouter un Utilisateur </a>
        <table class="table table-responsive-lg">
          <thead class="table-dark">
            <tr>
              <th>Numéros</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Ecole</th>
              <th>Email</th>
              <th>Role</th>
              <th>Modifications</th>
            </tr>
          </thead>  <?php foreach ($user_list as $list) : ?>
          <tbody>
            <tr>
              <td><?= $list['id']; ?></td>
              <td><?= $list['lastname']; ?></td>
              <td><?= $list['firstname']; ?></td>
              <td><?= $list['NomEcole']; ?></td>
              <td><?= $list['email']; ?></td>
              <td><?= $list['role']; ?></td>
              <td>
              <form class="form-inline" method="post">
                <select class="form-control" name="role">
                  <option disabled selected>Sélectionner le Role</option>
                  <option class="" value="admin">Administrateur</option>
                  <option class="" value="user">Utilisateur</option>
                </select>
                <button type="submit" name="button-<?= $list['id']; ?>">Changer le role</button>
              </form>
              </td>
            </tr>
          
          </tbody>  <?php endforeach; ?>
        </table>
      </div>
    </div>  <!-- .row -->
  </div> <!-- .container-fluid -->
</div> <!-- #userslist -->

<?php $this->stop('main_content'); ?>
