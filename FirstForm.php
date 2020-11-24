<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operazioni</title>
</head>
<body style="background-color: #E0FFFF;">
<?php
  $First = "  ";
  $Second = "  ";
  $errorF = " ";
  $errorS = " ";
  $y = $_POST["Second"];
  $x = $_POST["First"];
  $op = $_POST["Operation"];


  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($x) && empty($y)) {
      $error = "Insert the number";
      $errorS = "Insert the number ";
    }
    elseif (empty($x)) { //il messaggio di errore non spunta se io inserisce op fattoriale, serve solo il primo valore
      $error = "Insert the number ";
    }
    elseif (empty($y) && $op!= "Factorial") { //il messaggio di errore non spunta se io inserisce op fattoriale, serve solo il primo valore
      $errorS = "Insert the number ";
    }
  }


  function Sum($x,$y){
    return $x + $y;
  }
  function Subtraction($x,$y){
    return $x - $y;
  }
  function Multiplication($x,$y){
    return $x * $y;
  }
  function Division($x,$y){
    return $x / $y;
  }
  function Factorial($x){
    $result = 1;
    for($i = $x ; $i > 1; $i--){ 
        $result *= $i;
    }
    return $result;
  }
?>


<h1>Inserisci due numeri e scegli un operazione: </h1>
<form method="post" action="index.php"> 
  Number: <input type="number" name="First" value= "<?php echo $x;?>">
  <span style="color:red;">* <?php echo $error;?></span> 
  <br><br>
  Number: <input type="number" name="Second" value= "<?php echo $y;?>">
  <span style="color:red;">* <?php echo $errorS;?></span> 
  <br><br>
  Choose operation
  <select name="Operation">
    <option value="Default">Operation</option>
    <option name="Sum"> Sum </option> 
    <option name="Subtraction">Subtraction</option>
    <option name="Multiplication">Multiplication</option>
    <option name="Division">Division</option>
    <option name="Factorial">Factorial</option>
  </select>
  <br><br>
  <input type="submit" value="Send">
  <input type="reset" value="Reset">
</form>


<?php 
echo "<br>";
if ($op == "Sum" && (!empty($x)) && (!empty($y))){
  echo "Sum value is: &nbsp" . Sum($x,$y);
}
elseif ($op == "Subtraction" && (!empty($x)) && (!empty($y))) {
  echo "Subtraction value is: &nbsp" . Subtraction($x,$y);
}
elseif ($op == "Multiplication" && (!empty($x)) && (!empty($y))) {
  echo "Multiplication value is: &nbsp" . Multiplication($x,$y);
}
elseif ($op == "Division" && (!empty($x)) && (!empty($y))) {
  echo "Division value is: &nbsp" . Division($x,$y);
}
elseif ($op == "Factorial" && (!empty($x))) {
  echo "Factorial value is: &nbsp" . Factorial($x);
}
//chiedere al prof perchè errore nella ricarica della pagina, _PROBABILE ERRORE_
?>


</body>
</html>
