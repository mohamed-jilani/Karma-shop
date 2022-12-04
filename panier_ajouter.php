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

echo"<br><br><br><br><br> article :  ";                          
if(!empty($_GET)){
echo ($_GET["ida"]. "<br><br><br><br>".$_SESSION['user']."<br><br>");
}
$ida=$_GET["ida"];
$user=$_SESSION['user'];
try
{
    $sqlQuery = "INSERT INTO panier VALUES($ida,'$user')";
    $requete = $db->prepare($sqlQuery);
    $requete->execute();
    $res = $requete->fetchAll();
    
}
catch (Exception $e)
{
    header('location:index.php');                                       
}


header('location:index.php');                                       

?>
                    





            

            



