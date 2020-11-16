<?php
require_once 'ManageDB.php';
$mysqli = connectDB('localhost','root','root');
useDB($mysqli,'EsercizioComplicato');
session_start();
$_SESSION['utente'];
$_SESSION['userID']; 
createAccess($mysqli,$_SESSION['userID']);//crea l'accesso al login

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Home</title>
</head>
<body >
    <h1>WELCOME</h1>
    <h2><?php echo $_SESSION['utente']?></h2>

    <p style="color:blue;">Lista prodotti utente <?php echo $_SESSION['userID']?>:<br></p>
    <?php ListProductsFavouritesForSingleID($mysqli,$_SESSION['userID']);?>

    <p style="color:blue;">Lista accessi utente <?php echo $_SESSION['userID']?>:<br></p>
    <?php ListAccessForSingleID($mysqli,$_SESSION['userID']);?>


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div> 
        <form action="" method="post">
            <input type="submit" value="Access Page" name="acp">
            <input type="submit" value="LOGOUT" name="esci">
        </form>
        <?php if ($_POST['esci']) {
            logout($mysqli);
        }  ?>
        <?php if ($_POST['acp']) {
            header("Location: Access.php"); 
        }  ?>
    </div>
   
</body>
</html>

 