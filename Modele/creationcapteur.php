<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=athom;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$name = $_POST['name'];
$typecapteur = $_POST['typecapteur'];
$etat = $_POST['etat'];
$piece = $_POST['piece'];
try{
    echo $typecapteur, $name, $piece, $etat;
    $req = $bdd->prepare("INSERT INTO capteur(nom_capteur, type_capteur, etat,nom_pièce,idmaison) VALUES(:nom, :typecapteur,:etat,:piece, 1)");
    $req->bindParam(':nom',$name);
    $req->bindParam(':typecapteur',$typecapteur);
    $req->bindParam(':etat',$etat);
    $req->bindParam(':piece',$piece);
    $req->execute();
    $req->closeCursor();
}catch(Exception $e){
    echo "<br>-------------------<br> ERREUR ! <br>";
    //print_r($params);
    die('<br>Requete Erreur !: '.$e->getMessage());

}
header ("Location: $_SERVER[HTTP_REFERER]" );
?>