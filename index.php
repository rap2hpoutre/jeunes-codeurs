<?php
if (isset($_POST['name'])) {
		function clean_field($text) {
				$text = htmlspecialchars(trim($text), ENT_QUOTES);
				if (1 === get_magic_quotes_gpc()) {
					$text = stripslashes($text);
				}
				$text = nl2br($text);
				return $text;
		}

		$msg_success = array();
		$msg_errors = array();
		if ($_POST['name'] == '') array_push($msg_errors, "Vous n'avez pas saisi de nom.");
		if ($_POST['email'] == '') array_push($msg_errors, "Vous n'avez pas saisi d'adresse email.");
		else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) array_push($msg_errors, "Vous n'avez pas saisi une adresse email valide.");
		if ($_POST['message'] == '') array_push($msg_errors, "Vous n'avez pas saisi de message.");
		
		if (count($msg_errors) == 0) {
				$clean_name = clean_field($_POST['name']);
				$clean_email = clean_field($_POST['email']);
				$clean_message = clean_field($_POST['message']);
		
				$email_from = 'noreply@jeunescodeurs.com';
				$email_to = 'jeunes.codeurs@gmail.com';
				$email_subject = "Nouveau message de la part de ".$clean_name." !";
				$email_message = "
E-mail : " . $clean_email . "

Message :
" . $clean_message;
				
				$email_headers  = 'MIME-Version: 1.0' . "\r\n";
				$email_headers .= 'From:Jeunes Codeurs Home <'.$email_from.'>' . "\r\n" .
							'Reply-To:'.$email_from. "\r\n" .
							'X-Mailer:PHP/'.phpversion();
				
				if (mail($email_to, $email_subject, $email_message, $email_headers)) array_push($msg_success, "Votre message a été envoyé avec succès.");
				else array_push($msg_errors, "Il y a eu un problème lors de l'envoi de l'e-mail.");
		}
}
?>

<!DOCTYPE HTML>
<!--
	Strongly Typed 1.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Jeunes Codeurs</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="viewport" content="width=1040" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600|Arvo:700" rel="stylesheet" type="text/css" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
	</head>
	<body class="no-sidebar">

		<!-- Header Wrapper -->
			<div id="header-wrapper">

				<!-- Header -->
					<div id="header" class="container">

						<!-- Logo -->
							<h1 id="logo"><a href="#">Jeunes Codeurs</a></h1>
							<p><h2>La programmation est un jeu d'enfant</h2></p>
							<p>
								<i class="fa fa-child fa-5x"></i>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<i class="fa fa-arrow-circle-o-right fa-3x"></i>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<i class="fa fa-rocket fa-4x"></i>
							</p>

						<!-- Nav -->
							<nav id="nav" class="navbar-fixed-top">
								<ul>
									<li><a class="fa fa-home" href="#header"><span>Bienvenue</span></a></li>
									<li><a class="fa fa-bug" href="#main-wrapper"><span>Projet</span></a></li>
									<li><a class="fa fa-phone" href="#footer-wrapper"><span>Contact</span></a></li>
								</ul>
							</nav>

					</div>

			</div>

		<!-- Main Wrapper -->
			<div id="main-wrapper">

				<!-- Main -->
					<div id="main" class="container">





<!-- Content -->
								<div class="row">
									<div id="content" class="12u skel-cell-important">
											<article class="is-post">

												<h3>Projet, contexte et objectifs</h3>
												<p>Nous souhaitons, sur une année, aborder la programmation sous différents axes pédagogiques. Nous sommes persuadés que le code peut s'apprendre dès huit ans, comme on apprend le basket, le judo ou le théâtre, et que cela peut même être amusant. En groupe restreint, en périscolaire dans le cadre de la réforme, le soir, ou peut-être même un jour sur le temps scolaire, quelques mois de cours seront suffisants pour permettre aux enfants et jeunes adultes de réaliser eux-mêmes des applications, et d'exprimer leur créativité à travers les possibilités innombrables qu'offre la programmation.</p>	
											</article>

									</div>
								</div>
								<div class="row">
									<div class="6u skel-cell-important">
										<article class="is-post">
											<h3>Initiation aux concepts de base de la programmation</h3>
											<p>Découvrir la face cachée des applications que nous utilisons chaque jour, comprendre qu'il est à la portée de tous d'en créer de nouvelles ou de modifier l'existant.</p>
										</article>
									</div>
									<div class="6u skel-cell-important">
										<article class="is-post">
											<h3>Création d'un jeu vidéo avec Scratch</h3>
											<p>Tête la première dans la programmation sur quelques séances avec la création guidée d’un jeu simple : mise en place d’éléments à l’écran, animation de personnages, lecture de son. Nous abordons donc ici des concepts de manière simple : boucles, conditions, instructions, variables, évènements.</p>
										</article>
									</div>
								</div>
								<div class="row">
									<div class="6u skel-cell-important">
										<article class="is-post">
											<h3>Création d'un site internet</h3>
											<p>Connaitre le fonctionnement d'internet dans ses grandes lignes, comprendre les risques, analyser une URL, apréhender la mécanique client/serveur... Ces thématiques seront abordées afin de pouvoir développer soi-même un site internet. De la découverte des balises HTML à la création de scripts, nous ferons donc tous ensemble un site internet dynamique.</p>
										</article>
									</div>
									<div class="6u skel-cell-important">
										<article class="is-post">
											<h3>Monter un projet en équipe</h3>
											<p>Nous souhaitons terminer l'année par l'élaboration d'un projet en équipe. Ce projet sera décidé en fonction des notions déjà apprises et maîtrisées, des envies et motivations des élèves et bien sûr du temps qu'il reste. Nous pensons que savoir travailler seul est important, mais que le vrai bonheur d'un développeur, c'est de monter et réaliser ses projets en équipe.</p>
										</article>
									</div>
								</div>
							</div>
			</div>

		<!-- Footer Wrapper -->
			<div id="footer-wrapper">

				<!-- Footer -->
					<div id="footer" class="container">
						<header>
							<h2>Des questions ? <strong>Contactez-nous !</strong></h2>
						</header>
						
						<?php if (isset($msg_errors) && count($msg_errors) > 0) { ?>
						<div class="12u message-errors">
								<ul>
										<?php foreach ($msg_errors as $msg_single) { echo '<li>' . $msg_single . '</li>'; } ?>
								</ul>
						</div>
						<?php 
						}
						
						if (isset($msg_success) && count($msg_success) > 0) { 
						?>
						<div class="12u message-success">
								<ul>
										<?php foreach ($msg_success as $msg_single) { echo '<li>' . $msg_single . '</li>'; } ?>
								</ul>
						</div>
						<?php 
						}
						?>
						
						<div class="row">
							<div class="6u">
								<section>
									<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>#footer-wrapper">
										<div class="row half">
											<div class="6u">
												<input name="name" placeholder="Nom" type="text" class="text" value="<?php if (!empty($_POST['name']) && count($msg_errors) > 0) echo $_POST['name']; ?>" />
											</div>
											<div class="6u">
												<input name="email" placeholder="Email" type="text" class="text" value="<?php if (!empty($_POST['email']) && count($msg_errors) > 0) echo $_POST['email']; ?>" />
											</div>
										</div>
										<div class="row half">
											<div class="12u">
												<textarea name="message" placeholder="Message"><?php if (!empty($_POST['message']) && count($msg_errors) > 0) echo $_POST['message']; ?></textarea>
											</div>
										</div>
										<div class="row half">
											<div class="12u">
												<input type="submit" class="button button-icon fa fa-envelope" value="Envoyer" />
											</div>
										</div>
									</form>
								</section>
							</div>
							<div class="6u">
								<section>
									<p>Nous sommes deux développeurs passionnés, nous sommes heureux de vous avoir présenté notre projet. N'hésitez pas à nous contacter, que ce soit pour une question, une critique ou une suggestion : le projet peut encore évoluer et nous serons ravis d'en discuter avec vous.</p>
									<div class="row">
										<ul class="icons 6u">
											<li class="fa fa-home">
												jeunes.codeurs.mnstrl.org
											</li>
											<li class="fa fa-envelope">
												<a href="mailto:jeunes.codeurs@gmail.com">jeunes.codeurs@gmail.com</a>
											</li>
										</ul>
										<ul class="icons 6u">
											<li class="fa fa-twitter">
												<a href="http://twitter.com/jeunescodeurs">@jeunescodeurs</a>
											</li>
											<li class="fa fa-phone">
												06 26 54 79 71
											</li>
										</ul>
									</div>
								</section>
							</div>
						</div>
					</div>

				<!-- Copyright -->
					<div id="copyright" class="container">
						<ul class="links">
							<li>&nbsp;&nbsp;&nbsp;&copy; Jeunes codeurs</li>
							<li>Design: <a href="http://html5up.net/">HTML5 UP</a></li>
						</ul>
					</div>

			</div>

	</body>
</html>
