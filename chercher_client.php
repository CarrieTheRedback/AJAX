<?php
	
//verification des données transmises
$reID = (isset($_POST["reID"])) ? $_POST["reID"] : NULL;
	
	//connexion à la base de données
	if ($reID) {
	require_once 'inc.connexion.php';

//extraction des données demandées
$req = $bdd->prepare('SELECT profession_client, nom_client, date_ajout, identifiant_client FROM clients WHERE identifiant_client= ?');
$req->execute(array($reID));

//affichage en tableau et conversion du timestamp
while ($donnees = $req->fetch())
{
?>
   <table>
   <tr>
       <td> Votre nom: <?php echo $donnees['nom_client']; ?></td>
       <td>Votre profession: <?php echo $donnees['profession_client']; ?></td>
       <td>Votre identifiant: <?php echo $donnees['identifiant_client']; ?></td>
       <td>La date d'inscription: <?php echo date('d/m/Y',($donnees['date_ajout'])); ?></td> 
   </tr>
</table>
<?php
}

//fermeture de la requête
$reponse->closeCursor();

} 
?>
