<?php  //testing Script

require_once 'ManageDB.php';
session_start();

$mysqli = connectDB('localhost','root','root');

createDB($mysqli,'EsercizioComplicato');

useDB($mysqli,'EsercizioComplicato');

// createTablePerson($mysqli);       //funziona
// createTableAccess($mysqli);      //funziona
//createTableFavourites($mysqli);   //funziona
//createTableProducts($mysqli);     //funziona
//createPerson([params]);   //funziona
//readPerson($mysqli,_SESSION['userID']);      //funziona
//login($mysqli);                   //funziona
//editPerson($mysqli,9,"pippo");    //funziona, tipo il cambio password
//createAccess($mysqli,$_SESSION['userID']);          //funziona!!
// createProduct($mysqli,'TV OLED',249);     //funziona
// addFavourite($mysqli,3,3);     //funziona
// removeFavourite($mysqli,1) //funziona
// ListProducts($mysqli) //funziona
// ListProductsFavouritesForSingleID($mysqli,$_SESSION['userID']); // funziona
// ListAccessForSingleID($mysqli,$_SESSION['userID']);  //funziona
// totalProducts($mysqli) //funziona
?> 

