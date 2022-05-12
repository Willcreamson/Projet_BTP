<?php

/* Recevoir les modifications du formulaire FAQ
Ce sont des modifications de role qu'il faut mettre à jour dans la BDD gestion_profil
*/
//require('C:\xampp\htdocs\Projet\Controller\connexion.php');
$dsn = "mysql:host=localhost;dbname=gestion_profil;charset=utf8";
$opt = array(
PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );
$pdo = new PDO($dsn, 'root','', $opt);

$sql = sprintf(
    " UPDATE utilisateur
     SET `Nom` = :Nom, `Prenom` = :Prenom, `Role`= :leRole, `adresse_mail`= :Mail
     WHERE id_user = :id "
    ); 
$stmt = $pdo -> prepare($sql);
$stmt -> bindParam(':Nom',$_POST['Nom'],PDO::PARAM_STR);
$stmt -> bindParam(':Prenom',$_POST['Prenom'],PDO::PARAM_STR);
$stmt -> bindParam(':leRole',$_POST['Role'],PDO::PARAM_STR);
$stmt-> bindParam(':Mail',$_POST['adresse_mail'],PDO::PARAM_STR);
$stmt ->bindParam(':id',$_POST['id'],PDO::PARAM_INT);
echo($_POST['Nom']);
$stmt ->execute();


/*if(!$stmt){
$lastInsertId = $pdo->lastInsertId();
if($lastInsertId>0)
{
echo "OK";
}
else
{
echo "not OK";
}
}*/
?>
