
<?php $this->layout('layout', ['title' => 'Un événement']); ?>

<?php $this->start('main_content'); ?>
<body class="align" id="homeco">
<div id="sd-entete-map" >
		<div class="container well">
			<div class="col-md-6">
				<?php foreach ($emprunt as $view) :?>
				<p><?php echo $emprunt['DateEmprunt'] ?></p>
				<p>Date de l'evenement : <?php echo date('d-m-Y' ,strtotime($emprunt['date_time'])) ?></p>
				<p>Heure de l'evenement : <?php echo $emprunt['hour'] ?></p>
				<br />
				<p>Emprunts éditer le : <?php
				$datetime = new DateTime($emprunt['DateEmprunt']);
				$intl = new IntlDateFormatter('fr_FR',IntlDateFormatter::FULL,IntlDateFormatter::MEDIUM);
				echo $intl->format($datetime);?></p>
			<?php endforeach;?>
			</div>
		</div>
		</div>
	</div>
</body>
<?php $this->stop('main_content'); ?>

