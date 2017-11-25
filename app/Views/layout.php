<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	<!-- CSS FILES  -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">

	<!-- FAVICON -->
	<link rel="icon" type="img/ico" href="<?= $this->assetUrl('img/favicon.ico') ?>" />

</head>
<header>
    <div class="flex">
		 <a class="logo" href="<?= $this->url('default_home') ?>"></a>
  	</div>
</header>	
		<section>
			<?= $this->section('main_content') ?>
		</section>

			<?= $this->section('script') ?>
			<script src="<?= $this->assetUrl('js/jquery-3.2.1.min.js') ?>" charset="utf-8"></script>
			<script src="<?= $this->assetUrl('js/bootstrap.min.js') ?>" charset="utf-8"></script>
			<script src="<?= $this->assetUrl('js/jquery.validate.min.js') ?>" charset="utf-8"></script>
			<script src="<?= $this->assetUrl('js/additional-methods.min.js') ?>" charset="utf-8"></script>
			<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/35984/lottie.min.js" charset="utf-8"></script>
			<script src="<?= $this->assetUrl('js/main.js') ?>" charset="utf-8"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
		    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js"></script>
		    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
			<?= $this->section('javascript') ?>
		</footer>
</html>
