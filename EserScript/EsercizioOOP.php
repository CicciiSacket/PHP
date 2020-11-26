<?php
class Calcolatrice{
    public $Operazioni;

    function __construct($Operazioni) {
        $this->Operazioni = array(); 
    }
    function sum($x,$y){
        $sum++;
        $result = $x + $y;
        $op = new Operazione('somma',$x,$y,$result);
        array_push($this->Operazioni,$op);
        return $result;
    }
    function difference($x,$y){
        $diff++;
        $result = $x - $y;
        $op = new Operazione('sottrazione',$x,$y,$result);
        array_push($this->Operazioni,$op);
        return $result;
    }
    function multiplication($x,$y){
        $per++;
        $result = $x * $y;
        $op = new Operazione('moltiplicazione',$x,$y,$result);
        array_push($this->Operazioni,$op);
        return $result;
    }
    function division($x,$y){
        $div++;
        $result = $x / $y;
        $op = new Operazione('divisione',$x,$y,$result);
        array_push($this->Operazioni,$op);
        return $result;
    }
    function exponentiation($x,$y){
        $esp++;
        $result = pow($x,$y);
        $opEspo = new Operazione('esponente',$x,0,$result);
        array_push($this->Operazioni,$y);
        return $result;
    }
    function sqrtFun($x){
        $rq++;
        $result = sqrt($x);
        $op = new Operazione('radicequadrata',$x,0,$result);
        array_push($this->Operazioni,$op);
        return $result;
    }
    function converter($x){
        $conv1++;
        $result = decbin($x);
        $op = new Operazione('Dec-Bin',$x,0,$result);
        array_push($this->Operazioni,$op);
        return $result;
    }
    function UNconverter($x){
        $conv2++;
        $result = bindec($x);
        $op = new Operazione('Bin-Dec',$x,0,$result);
        array_push($this->Operazioni,$op);
        return $result;
    }
}


class Operazione {
    public $Opname;
    public $x;
    public $y;
    public $result;

    function __construct($Opname,$x,$y,$result){
        $this->Opname = $Opname;
        $this->x = $x;
        $this->y = $y;
        $this->result = $result;
    }
}

$CalcolatriceProva = new Calcolatrice($Operazioni);
echo "\n";
echo $CalcolatriceProva->sum(1,1);echo "\n";
echo $CalcolatriceProva->difference(4,1);echo "\n";
echo $CalcolatriceProva->multiplication(2,10);echo "\n";
echo $CalcolatriceProva->division(10,2);echo "\n";
echo $CalcolatriceProva->exponentiation(2,5);echo "\n";
echo $CalcolatriceProva->sqrtFun(25);echo "\n";
echo $CalcolatriceProva->converter(1);echo "\n";
echo $CalcolatriceProva->UNconverter(001);echo "\n";
echo "\n";
print_r($CalcolatriceProva->Operazioni)

?>