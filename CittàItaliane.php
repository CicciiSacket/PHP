<?php //prof lo mando ma dovrò ultimarlo quindi glielo farò avere anche nella prossima lezione, non è molto diverso da quello che le avevo fatto
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Alcune città italiane sono</h1> 

<?php 
  $singleCity = explode(",",$_POST["città"]);

  $_SESSION["final"] = array();

  foreach($singleCity as $element){
    if (!in_array($element,$_SESSION["final"])){
      array_push($_SESSION["final"],$element);
    }
  }

  if (isset($_SESSION['final'])) {
  foreach ($_SESSION['final'] as $city) {
  echo "<li>Citta:" . $city . "</li>"; 
  }
} 
?>     
  <form action="index.php" method="post">
  Insert city <input type="text" name="città" value="" placeholder= "Roma, Napoli, Palermo..." >
  <input type="submit" value="Send">
  </form>
</body>
</html>