<?php


//connexion à la base de données

try
{
 $db =new PDO('mysql:host=localhost;dbname=jf;charset=utf8','root', '');
}
catch (Exception $e)
{
 die('Erreur : ' . $e->getMessage());
}



if (!empty($_POST))
{
$user=$_POST['Username'];
$pass=$_POST['Password'];

if (!empty($_POST['selector']))
{
    
    
// On récupère tout le contenu de la table client
$sqlQuery = "SELECT *  FROM compte where email='$user' and pass='$pass';";
$requete = $db->prepare($sqlQuery);
$requete->execute();
$res = $requete->fetchAll();

// On affiche chaque client

if(!empty($res)){
    
    $sqlQuery = "SELECT *  FROM vendeur where email='$user' and cin=$pass;";
    $requete = $db->prepare($sqlQuery);
    $requete->execute();
    $res = $requete->fetchAll();
    if(!empty($res)){

    session_start();
        $_SESSION['user']=$_POST['Username'];
        $_SESSION['pass']=$_POST['Password'];
        $_SESSION['selector']=$_POST['selector'];
        $_SESSION['test']=true;
    header('location:../espace_vendeur.php');
    }
    else
    {
        header('location:../login.html');      
    }
}
else
{ 
  header('location:../login.html');      
}
}
else
{
 
// On récupère tout le contenu de la table client
$sqlQuery = "SELECT *  FROM compte where email='$user' and pass='$pass';";
$requete = $db->prepare($sqlQuery);
$requete->execute();
$res = $requete->fetchAll();

// On affiche chaque client

if(!empty($res)){
    session_start();
        $_SESSION['user']=$_POST['Username'];
        $_SESSION['pass']=$_POST['Password'];
        $_SESSION['selector']='c';
        $_SESSION['test']=true;
    header('location:../index.php');
}
else
{ 
  header('location:../index.html');      
}
}
 
}




?>