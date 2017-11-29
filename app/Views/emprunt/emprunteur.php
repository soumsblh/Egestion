<?php $this->layout('layout', ['title' => 'Liste des Promotion']) ?>

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
        <h2 class="text-center">Emprunteurs</h2>
        <hr>
         <a class="btn btn-success"  href="<?php echo $this->url('security_register'); ?>">Ajouter un Emprunteur </a>
        <table class="table table-responsive-sm" style="margin-top:15px;">
          <thead class="thead-dark">
            <tr>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Ecole</th>
              <th>Promo</th>
              <th>Années</th>
              <th>Modification</th>
            </tr>
          </thead>  
           <?php foreach ($list_emprunteur as $list) : ?>
          <tbody>
            <tr>
              <td><?= $list['Nom']; ?></td>
              <td><?= $list['Prenom']; ?></td>
              <td><?= $list['NomEcole']; ?></td>
              <td><?= $list['Promo']; ?></td>
              <td><?= $list['AnneePromotion']; ?></td>
            <td>
                <a href="<?= $this->url('emprunt_update' , ['id' => $event['id_Materiels'] ] )?>"><i class="fa fa-scissors" aria-hidden="true"></i> Modifier</a>
            </td> 
            </tr>      
          </tbody>  
        <?php endforeach; ?>
        </table>
      </div>
    </div>  <!-- .row -->
  </div> <!-- .container-fluid -->
</div> <!-- #userslist -->

<?php $this->stop('main_content'); ?>
