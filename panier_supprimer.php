<?php
session_start();
//connexion à la base de données
try
{
$db =new PDO('mysql:host=localhost;dbname=jf;charset=utf8','root', '');
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
                      
if(!empty($_GET)){
$ida=$_GET["ida"];
$user=$_SESSION['user'];
}

try
{
    $sqlQuery = "DELETE FROM panier WHERE `panier`.`id` = $ida AND `panier`.`client_email` = '$user'";
    $requete = $db->prepare($sqlQuery);
    $requete->execute();
    $res = $requete->fetchAll();
}
catch (Exception $e)
{
    header('location:panier.php');                                       
}


header('location:panier.php');                                       

?>
                    





            

            



