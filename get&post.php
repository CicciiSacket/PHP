<?php

$x = $_GET['x'];
$y = $_GET['y'];

echo $_GET['x']. "\t" . $_GET['y'];


if($_GET["operazione"] == "somma" && is_numeric($x) && is_numeric($y)){
    echo  "<br>".(sum($x,$y));
}
elseif ($_GET["operazione"] == "differenza") {
    echo  "<br>".(dif($x,$y));
}
elseif ($_GET["operazione"] == "moltiplicazione") {
    echo  "<br>".(mol($x,$y));
}
elseif ($_GET["operazione"] == "divisione") {
    echo  "<br>".(div($x,$y));
}
elseif ($_GET["operazione"] == "fattoriale") {
    echo  "<br>".(fact($x));
}
    

function sum(int $x,int $y): int { 
    return $x + $y;
}
function dif(int $x,int $y): int { 
    return $x - $y;
}
function mol(int $x,int $y): int { 
    return $x * $y;
}
function div(int $x,int $y): float { 
    return $x / $y;
}
function fact(int $x){
    $result = 1;
    for($i = $x ; $i > 1; $i--){ 
        $result *= $i;
    }
    return $result;
}

//this is the use of get method;
// vanno trattati come variabili nell'url --> http://localhost:8888/index.php?x=5&y=6&operazione=divisione (a seconda del valore di operazione parte la funzione giusta)

?>