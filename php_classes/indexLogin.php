<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('Main.php');
require_once('../database connection/operation.php');
$main = new Main();

$main->addPrivates(new _Private('Monica.Disaro@FLL.it','Admin','1111111111','Monica','Disaro',1));
$main->addPrivates(new _Private('Filippo.Parovel@FLL.it','Admin','2222222222','Filippo','Parovel',2));
$main->addPrivates(new _Private('Lorenzo.Lashkiba@FLL.it','Admin','3333333333','Lorenzo','Lashkiba',3));
$main->addPrivates(new _Private('Marco.Mattiuz@FLL.it','Admin','4444444444','Marco','Mattiuz',4));
$main->addPrivates(new _Private('Damiano.Gobbo@FLL.it','Admin','5555555555','Damiano','Gobbo',5));
$main->addPrivates(new _Private('Macchinista@FLL.it','Macchinista','6666666666','Giacomo il macchinista','Macchinista',6));
$main->addPrivates(new _Private('Venezia@FLL.it','Venezia','777777777','Stazione venezia','venezia',7));
$main->addPrivates(new _Private('MarioRossi@gmail.com','Admin','888888888','Mario Rossi','Mario',8));



$_SESSION['main'] = $main;
$mail=$_POST['mailLog'];
$password=$_POST['passwordLog'];
if(login($mail,$password)==1){
    $_SESSION['logged'] = true;
}else  $_SESSION['logged'] = false;   


// foreach ($main->getPrivates() as $private)
// {
//     if($private->getPassword() == $password && $private->getMail() == $mail)
//     {
//         $_SESSION['mail'] = $_POST['mailLog'];
//         $_SESSION['password'] = $_POST['passwordLog'];
//         echo $mail;
//         $_SESSION['nome'] = $main->getUser($_SESSION['mail']);
//         $_SESSION['logged'] = true;


//        $_SESSION['macchinista'] = $_SESSION['password']=='Macchinista'? true : false;  
//        if( $_SESSION['macchinista']==false){
//        $_SESSION['stazione'] = $_SESSION['password']=='Venezia'? true : false;
//        }    

//         $trovato = true;
//     }
// }
if($_SESSION['logged']==false)
{
   // echo '<h5>Credenziali sbagliate o inesistenti</h5>';
    header('location: ../pages/registration.php?n=1');
exit;
}
$_SESSION['macchinista'] = $password =='Macchinista'? true : false;  
    if( $_SESSION['macchinista']==false){
        $_SESSION['stazione'] = $password =='Venezia'? true : false;
    }    
$_SESSION['nome']=$mail;
 // $hubs=$main->getHubs();
//var_dump($hubs);
//$trains=$main->getTrainS();
//$ws=$hubs['Torino']->getTrainInOutConfig($trains[0]);
//echo $ws;

header('location: ../index.php?n=1');
exit;
?>

<html>

<head>
    <title>INDEX DI PROVA</title>
</head>

<body> 
        <a href="infoHub.php">
            info hub
        </a>
    <pre>
        <?php


        
        //echo "<br/><br/><br/>";
        // $main->splitWagons();
        ?>
        </pre>
</body>

</html>