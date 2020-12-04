
<?php //creare classi per triangolo, quadrilatero, rettangolo, figura(capostipite),rombo, quadrato per ogni classe istanziare un oggetto e calcolare area e perimetro, per il trianglo utilizzare la notazione ::

abstract class figure {
    public static $numberSide = '';
    abstract public function perimeter();
    abstract public function area();
}

class triangle extends figure{
    public static $numberSide = 3;
    public $side1;
    public $side2;
    public $side3;

    function __construct($side1,$side2,$side3){
        $this->side1 = $side1;
        $this->side2 = $side2;
        $this->side3 = $side3; 
    }
    public function perimeter(){
        return $this->side1 + $this->side2 + $this->side3;
    }
    public function area(){
        $p = ($this->side1 + $this->side2 + $this->side3) / 2;
        $area = sqrt($p * ($p - $this->side1) * ($p - $this->side2) * ($p - $this->side3)); //formula di erone
        return $area;
    }
}

abstract class quadrilateral extends figure{
    public static $numberSide = 4;
    public $side1;
    public $side2;
    public $side3;
    public $side4;
}

class square extends quadrilateral{
    public $side1;
    public $side2;
    public $side3;
    public $side4;

    function __construct($side1,$side2,$side3,$side4){
        $this->side1 = $side1;
        $this->side2 = $side2;
        $this->side3 = $side3;
        $this->side4 = $side4;
    }
    public function perimeter(){
        return $this->side1 * quadrilateral::$numberSide;
    }
    public function area(){
        return $this->side1 * $this->side1;
    }
}

class rhombus extends quadrilateral{ 
    public $side1;
    public $side2;
    public $side3;
    public $side4;
    public $radius;//della circonferenza in cui è iscritto

    function __construct($side1,$side2,$side3,$side4,$radius){
        $this->side1 = $side1;
        $this->side2 = $side2;
        $this->side3 = $side3;
        $this->side4 = $side4;
        $this->radius = $radius;
    }
    public function perimeter(){
        return $this->side1 * quadrilateral::$numberSide;
    }
    public function area(){
        return $this->side1 * ($this->radius * 2);
    }
}

class rectangle extends quadrilateral{
    public $side1;
    public $side2;
    public $side3;
    public $side4;

    function __construct($base,$altezza,$base2,$altezza2){
        $this->side1 = $base;
        $this->side2 = $altezza;
        $this->side3 = $base2;
        $this->side4 = $altezza2;
    }
    public function perimeter(){
        return ($this->side1 * 2) + ($this->side2 * 2);
    }
    public function area(){
        return $this->side1 * $this->side2;
    }
}




$triangolo = new triangle(3,3,1);
echo "\n";
echo "triangle\n";
echo $triangolo->perimeter();
echo "\n";
echo $triangolo->area();
echo "\n";

$quadrato = new square(2,2,2,2);
echo "\n";
echo "sqare\n";
echo $quadrato->perimeter();
echo "\n";
echo $quadrato->area();
echo "\n";

$rombo = new rhombus(4,4,4,4,16);
echo "\n";
echo "rhombus\n";
echo $rombo->perimeter();
echo "\n";
echo $rombo->area();
echo "\n";

$rettangolo = new rectangle(4,6,4,6);
echo "\n";
echo "rectangle\n";
echo $rettangolo->perimeter();
echo "\n";
echo $rettangolo->area();
echo "\n";
?>