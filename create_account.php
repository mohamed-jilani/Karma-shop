<?php
if (!empty($_POST))
{								
    $email=$_POST['email'];										
    $cin=$_POST['cin'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $country=$_POST['country'];
    $adress=$_POST['adress'];
    $code_postal=$_POST['code_postal'];
    

 //connexion à la base de données
try
{
 $db =new PDO('mysql:host=localhost;dbname=jf;charset=utf8', 'root', '');
}
catch (Exception $e)
{
 die('Erreur : ' . $e->getMessage());
}
// execution de la requete d insertion
if(!empty($_POST['selector'])){
$sqlQuery ="INSERT INTO `vendeur` ( `cin`, `name`, `email`, `phone`, `country`, `address`, `code_postal`) VALUES($cin, '$name', '$email', '$phone', '$country', '$address', '$code_postal')";
}
else
{

$sqlQuery ="INSERT INTO `client` (`cin`, `name`, `email`, `phone`, `country`, `address`, `code_postal`) VALUES($cin, '$name', '$email', '$phone', '$country', '$address', '$code_postal')";

}
$sqlQuery2 ="INSERT INTO `compte` (`email`, `pass`) VALUES ('$email',$cin )";

$requete = $db->prepare($sqlQuery);
$requete->execute();

header('location:login.html'); 
}
else
{
header('location:create_account.html'); 
}
    
?>