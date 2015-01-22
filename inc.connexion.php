<?php
	// Paramètres de connexion à la base de données
	try
{
	$bdd = new PDO('mysql:host=localhost;dbname=exos4', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
