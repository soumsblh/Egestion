<?php $this->layout('layout', ['title' => 'Profil de l\'administrateur']) ?>

<?php $this->start('main_content') ?>
<div id="profileAdmin">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2 col-sm-3 panel-admin">
        <h3 class="text-center">Bonjour <?php echo $w_user['firstname']; ?></h3 >
        <div class="list-group">
          <ul class="list-unstyled" id="admin">
            <li>
              <a href="<?= $this->url('default_profile_admin'); ?> " class="list-group-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> Emprunts <span class="badge"><?= $count_events['emprunt']; ?></span></a>
            </li>
            <li>
              <a href="<?= $this->url('default_userslist'); ?>" class="list-group-item"><i class="fa fa-user-circle" aria-hidden="true"></i> Utilisateurs <span class="badge"><?= $count_users['users']; ?></span></a>
            </li>
            <li>
              <a href="<?= $this->url('default_equipement'); ?>" class="list-group-item"><i class="fa fa-briefcase" aria-hidden="true"></i> Materiels <span class="badge"><?= $count_list['list']; ?></span></a>
            </li>
             <li>
              <a href="<?= $this->url('default_emprunteur'); ?>" class="list-group-item"><i class="fa fa-users" aria-hidden="true"></i> Emprunteurs <span class="badge"><?= $count_emprunteur['emprunteur']; ?></span></a>
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
        <h2 class="text-center">Toutes les emprunts</h2>
        <hr>
        <a class="btn btn-success" href="<?= $this->url('emprunt_create')?>">Ajouter un emprunts</a><br>
<!--         <?php echo($event['DatePrevRetour']."  ".date("Y-m-d")) ;if( $event['DatePrevRetour'] < date("Y-m-d") ) : ?>
          <div class="alert alert-danger" role="alert">
         <?php foreach ($emprunt as $event) : ?>
          <?= $event['Nom']." ".$event['Prenom'];?>
        <?php endforeach; ?>
        </div>
          <?php  endif; ?> -->
        <table class="table table-dark">
          <thead>
            <tr>
              <th>Numeros D'Emprunt</th>
              <th>Nom/Prenom</th>
              <th>Ecole / Promo </th>
              <th>Date & heure d'emprunt</th>
              <th>Materiel Emprunter</th>
              <th>Quantité Emprunter</th>
              <th>Etat du materiel </th>
              <th>Date prévu de retour</th>
              <th>Date de Retour</th>
              <th>Etat de L'emprunt</th>
              <th>Action</th>    
              <th>Modifications</th>
            </tr>
          </thead>
            <?php foreach ($emprunt as $event) : ?>
            <tbody>
                <?php if ($event['DatePrevRetour'] > date("Y-m-d") && (!isset($event['DateRetour']))) :?>
              <tr class="success"> 
                <?php  elseif ( ($event['EtatEmprunt'] == 1) && (isset($event['DateRetour']))) : ?>
              <tr class="info">
                <?php  else : ?>
              <tr class="danger">
                <?php  endif; ?>
                <td><?php echo $event['id_Emprunt'];?></td>
                <td><?php echo $event['Nom']." ".$event['Prenom'];?></td>
                <td><?php echo $event['NomEcole']."/".$event['Promo']?></td>
                <td><?php $datetime = new DateTime($event['DateEmprunt']);
                  $intl = new IntlDateFormatter('fr_FR',IntlDateFormatter::FULL,IntlDateFormatter::MEDIUM);
                  echo $intl->format($datetime);?>
                </td>
                <td><?php echo $event['TypeMateriel']."<br>".$event['ModelMateriel'];    ?></td>
                <td><?php echo $event['QuantiteEmprunter'];    ?></td>
                <td><?php echo $event['Libelle'];?></td>
                <td><?php echo $event['DatePrevRetour'];?></td>
                <td><?php echo $event['DateRetour'];?></td>
                <td><?php if(($event['EtatEmprunt'] == 0)) :?><?="Non Rendu"?><?php else : ?><?="Rendu"?> <?php endif;?></td>
                <td>
                  <?php if(($event['EtatEmprunt'] == 0)) :?>
                    <form class="form-inline" action="" method="post">
                      <select class="form-control" name="EtatEmprunt" style="display: none;">
                        <option class="" value="1">Retour</option>
                      </select>
                    <button type="submit" class="btn btn-primary btn-lg" name="button-<?= $event['id_Emprunt']; ?>"> RENDRE </button>
                    </form>
                   <?php endif;?> 
                </td>
                <td>
                  <a href="<?= $this->url('emprunt_update' , ['id' => $event['id_Emprunt'] ] )?>"><i class="fa fa-scissors" aria-hidden="true"></i> Modifier</a>
                  <a href="<?= $this->url('emprunt_view'   , ['id' => $event['id_Emprunt'] ] )?>"><i class="fa fa-book" aria-hidden="true"></i> Lire</a>
                </td>           
            </tr>
          </tbody>      
        <?php endforeach; ?>
        </table>
      </div>
    </div>  <!-- .row -->
  </div> <!-- .container-fluid -->
</div>  <!-- #profileAdmin -->
<?php $this->stop('main_content'); ?>
