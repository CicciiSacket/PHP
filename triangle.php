<?php 

$x = $_GET['x'];
$y = $_GET['y'];
$z = $_GET['z'];

if($_GET["operazione"] == "Exist"){
    echo Exist($x,$y,$z);
}
elseif ($_GET["operazione"] == "Area") {
    echo Area($x,$y,$z);
}
elseif ($_GET["operazione"] == "Type") {
    echo Type($x,$y,$z);
}

function Type($x,$y,$z){
    $result = '';
    if($x < $y + $z && $y < $x + $z && $z < $y + $x) {
        if($x == sqrt($y*$y + $z*$z) || $y == sqrt($x*$x + $z*$z) || $z == sqrt($x*$x + $y*$y)){
            $result =  "rettangolo";        
        }
        elseif($x == $y && $y == $z){
            $result = "equilatero";
        }
        elseif($x == $y || $x == $z ||  $y == $z){
            $result = "isoscele";
        }
        else {
            $result =  "scaleno";
        }
    }
    else {
        $result = 'Not triangle.';
    }
    return $result;
}
function Area($x,$y,$z){
    $result = '';
    $one = ($x + $y + $z);
    $two = (-$x + $y + $z);
    $three = ($x - $y + $z);
    $four = ($x + $y - $z);
    $area = sqrt($one * $two * $three * $four) / 4;
    if ($area > 0 && ($x < $y + $z && $y < $x + $z && $z < $y + $x)) {
        $result =  $area . '<br> this is area of your triangle:';
    } else {
        $result = 'Not triangle.';
    }
    return $result;
}
function Exist($x,$y,$z){
    $result = '';
    if($x < $y + $z && $y < $x + $z && $z < $y + $x){
        $result = 'triangle';
    }
    else {
        $result = 'Not triangle.';
    }
    return $result;
}
//diocan
?>