<?php

abstract class figure2 {
    public static $numberSide = '';
    abstract static function perimeter(Float $side1, Float $side2, Float $side3);
    abstract static function area(Float $side1, Float $side2, Float $side3);
}

class triangleMult extends figure2{
    public static $numberSide = 3;
    private $side1;
    private $side2;
    private $side3;

    public static function perimeter(Float $side1,Float $side2,Float $side3){
        if($side1 < $side2 + $side3 && $side2 < $side1 + $side3 && $side3 < $side2 + $side1){
            return $side1 + $side2 + $side3;
        }
        else return 'not triangle';    
    }

    public static function area(Float $side1, Float $side2, Float $side3){
        $p = ($side1+ $side2 + $side3) / 2;
        $area = sqrt($p * ($p - $side1) * ($p - $side2) * ($p - $side3)); //formula di erone
        if($area > 0){
            return $area;
        } else return 'not triangle';
    }
}

echo triangleMult::perimeter(1,4,6);
echo"\n";
echo triangleMult::area(4,5,5);
?>