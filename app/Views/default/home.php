<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<body class="align" id="homeco">
	<div class="login">
		<div class="form-group">
		<h1>Bienvenue !</h1>
			<a href="<?= $this->url('default_frontPage')?>" class="btn skip col-md-12"  id="puce">
			</span>Accèder a notre site </a>
		</div>
	</div>
</body>
<?php $this->stop('main_content') ?>
