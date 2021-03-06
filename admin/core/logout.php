<?php
if($index)
{
	?>
	<!DOCTYPE html>
	<html lang="fr">
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>LORD Admin</title>

			<!-- Bootstrap -->
			<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

			<!-- Font Awesome -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

			<!-- Personalisation CSS -->
			<link rel="stylesheet" href="core/css/login.css">

			<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
			<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
			<!--[if lt IE 9]>
			  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<![endif]-->
		</head>
		<body>	
			<?php
			// Fermeture Session PHP
			if(session_destroy())
			{
				// Suppression des cookies de session si existants
				if($Login->logout())
				{
					echo "
					<div class='row'>
						<div class='col-lg-12 text-center alert alert-block alert-success'>
							<p>Déconnexion réalisée avec succès. Vous pouvez fermer l'onglet.</p>
						</div>
					</div>";
				}
				else
				{
					echo "
					<div class='row'>
						<div class='col-lg-12 text-center alert alert-block alert-danger'>
							<p>Erreur critique lors de la tentative de déconnexion.</p>
						</div>
					</div>";
				}
			}
			else
			{
				echo "
				<div class='row'>
					<div class='col-lg-12 text-center alert alert-block alert-danger'>
						<p>Erreur critique lors de la tentative de déconnexion.</p>
					</div>
				</div>";
			}
			?>
		</body>
	</html>
	<?php
}
else
{
	include('error.php');
}



