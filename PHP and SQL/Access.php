<?php
require_once 'ManageDB.php';
$mysqli = connectDB('localhost','root','root');
useDB($mysqli,'EsercizioComplicato');
session_start();
$_SESSION['utente'];
$_SESSION['userID']; 
$_POST['choose'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Access</title>
</head>
<body>

    <p style="color:blue;">Lista accessi utente <?php echo $_SESSION['userID']?>:<br></p>
    <?php ListAccessForSingleID($mysqli,$_SESSION['userID']);?>
    <p style="color:blue;">Lista completa dei prodotti:<br></p>
    <?php totalProducts($mysqli) ?>
    <p style="color:blue;">Lista prodotti utente <?php echo $_SESSION['userID']?>:<br></p>
    <?php ListProductsFavouritesForSingleID($mysqli,$_SESSION['userID']);?>

<div>
    <p style="color:blue;">Aggingere un favorito:<br></p>
   <form action="" method="post">
   Choose product ID
    <select name="choose">
        <option value="Default">Product</option>
        <option name="1">1</option> 
        <option name="2">2</option>
        <option name="3">3</option>
        <option name="4">4</option>
        <option name="5">5</option>
  </select>
  <input type="submit" value="add" name="adp">
  <input type="submit" value="remove" name="rmp">
  
  <br><br>
   </form>
   <?php
   if ($_POST['adp']) {
    addFavourite($mysqli,$_POST['choose'],$_SESSION['userID']);
   }
   if ($_POST['rmp']) {
    removeFavourite($mysqli,$_POST['choose']);
   }

   ?>
</div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div> 
        <form action="" method="post">
            <input type="submit" value="LOGOUT" name="esci">
        </form>
        <?php if ($_POST['esci']) {
            logout($mysqli);
        }  ?>
    </div>
</body>
</html>
