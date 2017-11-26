<?php $this->layout('layout', ['title' => 'Tous les évènement']); ?>

<?php $this->start('main_content'); ?>
  <div id="allEventsUser">
    <div class="container-fluid">
      <h2 class="text-center">Toutes Nos Sorties</h2>
      <hr>
      <?php if(isset($count_events)): ?>
         <a class="btn btn-success" href="<?= $this->url('event_create')?>">Ajouter un evenement</a><br />
      <?php endif; ?>
      <?php foreach( $events as $count => $event) : ?>
      <div class="row">
          <div class="well col-md-8 col-md-push-2 col-sm-6 col-sm-push-0 col-xs-10 col-xs-push-1">
              <div class="col-md-4">
                <img class="img-responsive" src="<?= $event['image']; ?>" alt="Event img">
              </div>
              <div class="col-md-6 col-md-push-1">
                <h1><?= $event['title']; ?></h1>
                <p><?php echo $event['event']; ?></p>
                <p>
                  Evénement posté le  <?php $datetime = new DateTime($event['post']);
                  $intl = new IntlDateFormatter( 'fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::MEDIUM); echo $intl->format($datetime); ?>
                </p>
                <h4>Départ : <?= $event['depart']; ?></h4>
                <h4>Arrivée : <?= $event['arrivee']; ?></h4>
                <a class="btn btn-default" href="<?= $this->url('event_view', ['id' => $event['id_events'] ] )?>"><i class="fa fa-search-plus"></i> Consulter l'évènement</a>
              </div>
            </div><!--.img well-->
         </div>
      <?php endforeach; ?>

      <div class="row">
        <ul class="pagination col-md-4 col-md-push-5 col-sm-4 col-sm-push-5 col-xs-push-4">
    			<?php if ($page > 1): ?>
    				<li><a href="<?= $this->url('event_index' , ['page' => $page - 1]); ?>"><<</a></li>
    			<?php endif; ?>

    			<?php for ($i=1; $i <= $max_pages ; $i++) { ?>
    				<li><a href="<?= $this->url('event_index', ['page' => $i ] );  ?>"><?php echo $i; ?></a></li>
    			<?php } ?>

    			<?php if ($max_pages > $page ): ?>
    				<li><a href="<?= $this->url('event_index' , ['page' => $page + 1]); ?>">>></a></li>
    			<?php endif; ?>
    	   </ul>
      </div>
    </div>
</div>
<?php $this->stop('main_content'); ?>
