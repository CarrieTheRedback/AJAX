<?php

//verification des donnees transmises
	$nom = (isset($_POST["nom"])) ? $_POST["nom"] : NULL;
	$selec = (isset($_POST["selec"])) ? $_POST["selec"] : NULL;
	$date_ajout = (isset($_POST["date_ajout"])) ? $_POST["date_ajout"] : NULL;
	$val = (isset($_POST["val"])) ? $_POST["val"] : NULL;
	
	
//connexion a la base de donnees
	if ($nom && $selec && $date_ajout && $val) {
	require_once 'inc.connexion.php';

//generation du timestamp et vérification de la date
$date_array = explode("/",$date_ajout); 
$jour = $date_array[0]; 
$mois = $date_array[1]; 
$annee = $date_array[2]; 
$timestamp = mktime(0, 0, 0, $jour, $mois, $annee);
$result = checkdate($mois, $jour, $annee);

  if( $result == true )
  {
//génération de l'identifiant en 3 parties
$id=substr($nom,0,3).$val.rand(1000,9999);

//insertion dans la base de données
$req = $bdd->prepare('INSERT INTO clients(identifiant_client, nom_client, profession_client, date_ajout) VALUES(:id, :nom, :profession, :date)');
$req->execute(array(
	'id' => $id,
	'nom' => $nom,
	'profession' => $selec,
	'date' => $timestamp,
	));
   echo " le client identifiant $id a été ajouté à la BDD ";
  }else echo 'la date n\'est pas valide';
}else echo "Les zones de texte n’ont pas été correctement remplies";

?>
