<?php $this->layout('layout', ['title' => 'Mon profil']) ?>

<?php $this->start('main_content') ?>
  <div id="profileAdmin">
  <div class="container-fluid">
    <div class="row">
         <h2 class="text-center">Bienvenus Sur E-GESTION </title> </h2>
            <h3 class="text-center">Bonjour <?php echo $w_user['lastname']." ".$w_user['firstname']; ?> !</h3>
            <hr>
        <ul class="nav nav-pills nav-justified col-sm-3 col-md-9">
            <li role="presentation" ><a href="<?= $this->url('emprunt_createbyUser')?>"><i class="fa fa-plus-circle"></i> Emprunt</a></li>
            <li role="presentation"><a href="<?= $this->url('emprunteur_NewEmprunteur')?>"><i class="fa fa-plus-circle"></i> Emprunteur</a></li>
            <li role="presentation" class="bg-info"><a href="<?= $this->url('security_changeInfos'); ?>" class="fa fa-user-circle"> Mes informations</a></li>
            <li role="presentation" class="bg-danger"><a href="<?= $this->url('security_logout')?>"><i class="fa fa-sign-out"></i> Déconection</a></li>
        </ul>
    </div>
    <br>
    <div class="well">
      <h4>Information sur les Emprunts</h4>
        <p>Tous les emprunt sont initialisés de façon à ce que le dernier emprunt saisis soit visible, les emprunts munis d'un bouton <strong>RENDRE</strong> sont : en Cours de prêt ou en Retard, pour les rendre cliquer seulement sur le bouton. Les autres emprunts ne peuvent  être modifié, se référer a votre Administrateur.<br> L'ordre de tri sera le suivant :
          <li>Les Emprunts ayants la date de retour Prévue expirée : <strong>En rouge</strong></li>
          <li>Les Emprunts ayants la date de retour Prévue qui n'est pas encore expirée : <strong>En Vert</strong></li>
          <li>Les Emprunts Rendus : <strong>En Bleu</strong></li>
        </p>
    </div> 
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
        Tableau de gestion des Emprunts
         </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="row">
                <div class="col-sm-6">
                <div class="dataTables_length" id="dataTables-example_length">
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-sm-12">
        <table class="table">
          <thead class="table-light">
            <tr>
              <th>Numeros D'Emprunt</th>
              <th>Nom/Prénom</th>
              <th>Ecole / Promo </th>
              <th>Date & heure d'emprunt</th>
              <th>Matériel Emprunté</th>
              <th>Quantité Empruntée</th>
              <th>Etat du matériel </th>
              <th>Date prévue de retour</th>
              <th>Date de Retour</th>
              <th>Etat de L'emprunt</th>
              <th>Action</th>    
            </tr>
          </thead>
            <?php foreach ($emprunt as $event) : ?>
             <tbody class="table-striped">
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
            </tr>
          </tbody>      
        <?php endforeach; ?>
        </table>
      </div>
    </div>  <!-- .row -->
  </div> <!-- .container-fluid -->
</div>  <!-- #profileAdmin -->
<?php $this->stop('main_content'); ?>
