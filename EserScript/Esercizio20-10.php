<?php 
  $array = array(1,-2,3,-5,4,7,-10,6,-6,5,-2,5,4,5,-8,9,11,13,11,3,-2,13);
  $array1 = array(-11,-3,-1,6,7,9,11,13,15);
  $array2 = array(15,13,12,6,0,-4,-5);

  function analyzer($array1){
      $newAr = array();
      $newArPos = array();
      $nullAr = array();
      $arraypari = array();
      $arrayDisp = array();
        foreach($array1 as $element){
                if($element < 0){
                    array_push($newAr,$element);
                }   
                else if($element > 0){
                    array_push($newArPos,$element);
                }
                else if($element == 0){
                    array_push($nullAr,$element);
                }
            }  
            foreach($array1 as $element){
                if ($element % 2 == 0){
                    array_push($arraypari,$element);
                }     
                else{
                    array_push($arrayDisp,$element);
                } 
            }  
        echo"\n";
        echo "i numeri negativi sono\t" .  count($newAr);
        echo"\n";
        echo "i numeri positivi sono\t" .  count($newArPos);
        echo"\n";
        echo "i valori nulli sono\t" .  count($nullAr);
        echo"\n";
        echo "i numeri pari sono\t" . count($arraypari);
        echo"\n";
        echo "i numeri dispari sono\t" . count($arrayDisp);
    } 

    function orderBy($array1){ //ERROR
        $result = null;
        for ($i=0; $i < count($array1) - 1 ; $i++) {
            if ($array1[$i] > $temp){
                
            }
            
            
           
        }
        return $result;
    }

    echo "\n";
    echo analyzer($array) . "\nARRAY\n";
    echo "\n";
    echo analyzer($array1) . "\nARRAY1\n";
    echo "\n";
    echo analyzer($array2) . "\nARRAY2\n";
    echo "\n";
    echo orderBy($array) . "\nARRAY\n"; //not order
    echo "\n";
    echo orderBy($array1) . "\nARRAY1\n";//crescente
    echo "\n";
    echo orderBy($array2) . "\nARRAY2\n";//decrescente
    echo "\n";
    echo orderBy([1,0,2,3,4,5]);
    echo "\n";
    echo orderBy([5,6,4,3,2,1]);
    echo "\n";
    echo orderBy([85,41,3,1]);
    echo "\n";
    echo orderBy([1,-2,3,-5,4,7,-10,6,-6,5,-2,5,4,5,-8,9,11,13,11,3,-2,13])


?>