<?php
// Démarrage du moteur de session
session_start();

header('Content-Type: application/json');

require_once($_SESSION['root_path']."core/classes/lordrat.class/lordrat.api.config.php");
require_once($_SESSION['root_path']."core/classes/lordrat.class/lordrat.api.class.php");
require_once($_SESSION['root_path']."core/classes/user.class/user.class.php");

$User = unserialize($_SESSION['login']);
$Lord = new LORDRAT_API(LORDRAT_API_APP,LORDRAT_API_KEY,LORDRAT_API_URL,LORDRAT_AGENT);

if(isset($User->connect) AND $User->connect)
{
	$index = TRUE;

	require_once($_SESSION['root_path'].'core/config.php');
	require_once($_SESSION['root_path'].'core/co_db.php');
	
	if(!empty(filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT)))
	{
		$params = array(
			'id'	=> filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT)
		);
	}
	else if(!empty(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT)))
	{
		$params = array(
			'id'	=> filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT)
		);
	}
	else
	{
		$params = NULL;
	}
	
	if(!is_null($params))
	{
		$media = $Lord->getMedia($params)->response->datas;
		
		$media[0]->{"full_link"}		= $_SESSION['medias_http'].$media[0]->fichier;
		$media[0]->{"thumbnail_link"}	= $_SESSION['medias_http']."thumbnail/".$media[0]->fichier;
		
		echo json_encode($media);
	}
}
else
{
	echo "auth";
}