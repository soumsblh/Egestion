<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<body class="align" id="homeco">
	<div class="login">
		<div class="form-group">
		<h1>Bienvenue !</h1>

		</div>
        <div class="panel panel-default">
            <div class="panel-heading">
               Quelques informations sur E-GESTION
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <p>Egestion est site web pour l'administration du matériel géré par chaque école, Ce site recense tout les matériels, les élèves ainsi que le personnel utilisateur de chaque école, Ce site a été creer dans le cadre de la formation U 'dev, Creer par les etudiants de l'<a target="_blank" href="http://www.epsi.fr/">EPSI</a> Promo U'dev.</p>
                <a href="<?= $this->url('default_frontPage')?>" class="btn skip col-md-12"  id="puce">
                    </span>Accèder a notre site </a>
            </div>
            <!-- /.panel-body -->
        </div>
	</div>
</body>
<?php $this->stop('main_content') ?>
