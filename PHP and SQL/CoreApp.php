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
//createPerson($mysqli,"pippo","pippo",'2000-03-25',"pippo","pippo","pippo","pippo","pippo");   //funziona
//readPerson($mysqli,"pippo");      //funziona
//login($mysqli);                   //funziona
//editPerson($mysqli,9,"pippo");    //funziona, ma il cambio password
//createAccess($mysqli,$_SESSION['userID']);          //funziona!!
// createProduct($mysqli,'book',1.30);     //funziona
// addFavourite($mysqli,3,3);     //funziona
// removeFavourite($mysqli,1) //funziona
// ListProducts($mysqli) //funziona
// ListProductsFavouritesForSingleID($mysqli,$_SESSION['userID']); // funziona
// ListAccessForSingleID($mysqli,$_SESSION['userID']);  //funziona
// totalProducts($mysqli) //funziona
?> 

