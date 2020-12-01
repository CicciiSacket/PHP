<?php
class Calcolatrice{
    public $Operazioni;
    public $sum = array();
    public $diff = array();

    function __construct($Operazioni) {
        $this->Operazioni = array(); 
    }
    function sum($x,$y){
        $result = $x + $y;
        $op = new Operazione('somma',$x,$y,$result);
        array_push($this->Operazioni,$op);
        return $result;
    }
    function difference($x,$y){
        $result = $x - $y;
        $op = new Operazione('sottrazione',$x,$y,$result);
        array_push($this->Operazioni,$op);
        return $result;
    }
    function multiplication($x,$y){
        $result = $x * $y;
        $op = new Operazione('moltiplicazione',$x,$y,$result);
        array_push($this->Operazioni,$op);
        return $result;
    }
    function division($x,$y){
        $result = $x / $y;
        $op = new Operazione('divisione',$x,$y,$result);
        array_push($this->Operazioni,$op);
        return $result;
    }
    function exponentiation($x,$y){
        $result = pow($x,$y);
        $opEspo = new Operazione('esponente',$x,'exp:'.$y,$result);
        array_push($this->Operazioni,$opEspo);
        return $result;
    }
    function sqrtFun($x){
        $result = sqrt($x);
        $op = new Operazione('radicequadrata',$x,'',$result);
        array_push($this->Operazioni,$op);
        return $result;
    }
    function converter($x){
        $result = decbin($x);
        $op = new Operazione('Dec-Bin',$x,'',$result);
        array_push($this->Operazioni,$op);
        return $result;
    }
    function UNconverter($x){
        $result = bindec($x);
        $op = new Operazione('Bin-Dec',$x,'',$result);
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
$CalcolatriceProva->sum(1,1);
$CalcolatriceProva->difference(4,1);
$CalcolatriceProva->multiplication(2,10);
$CalcolatriceProva->division(10,2);
$CalcolatriceProva->exponentiation(2,5);
$CalcolatriceProva->sqrtFun(25);
$CalcolatriceProva->converter(1);
$CalcolatriceProva->UNconverter(001);
print_r($CalcolatriceProva->Operazioni);

for ($i=0; $i < count($CalcolatriceProva->Operazioni) ; $i++) { 
    if ($CalcolatriceProva->Operazioni[$i]->Opname == "somma"){
        array_push($CalcolatriceProva->sum,$CalcolatriceProva->Operazioni[$i]);
        $res = $CalcolatriceProva->sum;
    }
    else if($CalcolatriceProva->Operazioni[$i]->Opname == "sottrazione"){
        array_push($CalcolatriceProva->diff,$CalcolatriceProva->Operazioni[$i]);
        $res = $CalcolatriceProva->$diff;
    }
    if (count($CalcolatriceProva->sum) == count($CalcolatriceProva->diff)) {
        $resp =  'uguali';
    }
    else if (count($CalcolatriceProva->sum) > count($CalcolatriceProva->diff)) {
        $resp =  '+ somme';
    }
    else if (count($CalcolatriceProva->diff) > count($CalcolatriceProva->sum) ) {
        $resp = '+ differenze';
    }
}
echo $resp;   

?>