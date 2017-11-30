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
              <a href="<?= $this->url('equipement_equipement'); ?>" class="list-group-item"><i class="fa fa-briefcase" aria-hidden="true"></i> Matériels <span class="badge"><?= $count_list['list']; ?></span></a>
            </li>
             <li>
              <a href="<?= $this->url('emprunteur_emprunteur'); ?>" class="list-group-item"><i class="fa fa-users" aria-hidden="true"></i> Emprunteurs <span class="badge"><?= $count_emprunteur['emprunteur']; ?></span></a>
            </li>
          </ul>
        </div>
        <hr>
        <div class="list-group">
            <a href="<?= $this->url('security_logout'); ?>" class="list-group-item list-group-item active"><i class="fa fa-database">  Exporté Votre Base</i></a>
            <a href="<?= $this->url('security_logout'); ?>" class="list-group-item list-group-item-success active"><i class="fa fa-database"> Importé Votre Base</i></a>
        </div>
        <div class="list-group">
        <a href="<?= $this->url('security_changeInfos'); ?>" class="list-group-item list-group-item active "><i class="fa fa-user-circle"> Mes informations</i></a>
        <a href="<?= $this->url('security_logout'); ?>" class="list-group-item list-group-item-danger active "><i class="fa fa-sign-out"> Deconnexion</i></a>
        </div>
          <div class="well">
              <h4>Information sur les Emprunts</h4>
              <p>Tous les emprunt sont initilisé de façon a ce que le dernier emprunt saisie sont visible l'ordre sera le suivant :
                  <li>Les Emprunts ayant la date de retour Prévu expiré : <strong>En rouge</strong></li>
                  <li>Les Emprunts ayant la date de retour Prévu qui n'est pas encore expiré : <strong>En Vert</strong></li>
                  <li>Les Emprunts Rendu : <strong>En Blue</strong></li>
              </p>
          </div>
      </div>
<div class="col-md-10 col-sm-6">
  <h2 class="text-center">Tous les Emprunt</h2>
    <hr>
    <a class="btn btn-success" href="<?= $this->url('emprunt_create')?>">Ajouter un emprunts</a><br>
  <div class="row" style="margin-top: 15px;">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">Tableau de gestion des Emprunt 
        </div>
<!-- /.panel-heading -->
<div class="panel-body">
<div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
    <div class="row">
      <div class="col-sm-12">
        <div class="tab-content">
        <table class="table-bordered">
          <thead class="table-light">
            <tr>
              <th>Numeros D'Emprunt</th>
              <th>Nom/Prénom</th>
              <th>Ecole / Promo </th>
              <th>Date & heure d'emprunt</th>
              <th>Matériel Emprunter</th>
              <th>Quantité Emprunter</th>
              <th>Etat du matériel </th>
              <th>Date prévu de retour</th>
              <th>Date de Retour</th>
              <th>Etat de L'emprunt</th>
              <th>Action</th>    
              <th>Modifications</th>
            </tr>
          </thead>


            <?php foreach ($emprunt as $event) : ?>
            <tbody class="table-striped">
                <?php if ($event['DatePrevRetour'] > date("Y-m-d") && (empty($event['DateRetour']))) :?>
              <tr class="bg-success">
                <?php  elseif ( ($event['EtatEmprunt'] == 1) && (isset($event['DateRetour']))) : ?>
              <tr class="bg-info">
                <?php  else : ?>
              <tr class="bg-danger">
                <?php  endif; ?>
                <?php if($event['Id_Ecole'] == 1)?> 
                <td><?php echo $event['id_Emprunt'];?></td>
                <td><?php echo $event['Nom']." ".$event['Prenom'];?></td>
                <td><?php echo $event['NomEcole']."/".$event['Promo']?></td>
                <td><?php $datetime = new DateTime($event['DateEmprunt']);
                  $intl = new IntlDateFormatter('fr_FR',IntlDateFormatter::FULL,IntlDateFormatter::NONE);
                  echo $intl->format($datetime);?>
                </td>
                <td><?php echo $event['TypeMateriel']." ".$event['ModelMateriel']." ".$event['nom_marque'];    ?></td>
                <td><?php echo $event['QuantiteEmprunter'];    ?></td>
                <td><?php echo $event['Libelle'];?></td>
                <td><?php $datetime = new DateTime($event['DatePrevRetour']);
                  $intl = new IntlDateFormatter('fr_FR',IntlDateFormatter::FULL,IntlDateFormatter::NONE);
                  echo $intl->format($datetime);?>
                </td>
                  <?php if(isset($event['DateRetour'])) :?>
                <td><?php $datetime = new DateTime($event['DateRetour']);
                  $intl = new IntlDateFormatter('fr_FR',IntlDateFormatter::FULL,IntlDateFormatter::NONE);
                  echo $intl->format($datetime);?></td>
                <?php else : ?>
                  <td></td>
                <?php endif ; ?>
                <td><?php if(($event['EtatEmprunt'] == 0)) :?><?="Non Rendu"?><?php else : ?><?="Rendu"?> <?php endif;?></td>
                <td>
                  <?php if(($event['EtatEmprunt'] == 0)) :?>
                    <form class="form-inline" action="" method="post">
                      <select class="form-control" name="EtatEmprunt" style="display: none;">
                        <option class="" value="1">Retour</option>
                      </select>
                    <button type="submit" class="btn btn-primary btn-xs" style="font-size:9px; " name="button-<?= $event['id_Emprunt']; ?>"> Rendre </button>
                    </form>
                   <?php endif;?> 
                </td>
                <td>
                  <a href="<?= $this->url('emprunt_update' , ['id' => $event['id_Emprunt'] ] )?>"><i class="fa fa-scissors" aria-hidden="true"></i> Modifier</a>
                </td>           
            </tr>
          </tbody>
        <?php endforeach; ?>
        </table>
        </div> <!-- .container-fluid -->
        </div>  <!-- #profileAdmin -->
<?php $this->stop('main_content'); ?>
