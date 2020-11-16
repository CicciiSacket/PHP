<?php
    echo "\n!!!!FUNZIONI!!!!!\n"; #!!!!!!!!!!!!!!
    echo "\n";

    $provare = array(3,4,5,6,7,8,2);
    function massimo($provare){
        for($i = 0; $i < count($provare) -1 ; $i++){ 
            $valuemax = $i;
            if($provare[$i] > $valuemax){
                $valuemax = $provare[$i];
            }
        }
        return $valuemax;
    }

    echo "value maxi is " . massimo($provare) . "\n";

    function sommaPari($provare){
        $sum = 0;
        for($i = 0; $i < count($provare); $i++){ 
            if($provare[$i] % 2 == 0)
            $sum += $provare[$i];
        }
        return $sum;
    }
    echo "sum of value pari is\t" . sommaPari($provare);

    function sommaDispari($provare){
        $sumd = 0;
        for($i = 0; $i < count($provare); $i++){ 
            if($provare[$i] % 2 != 0)
            $sum += $provare[$i];
        }
        return $sum;
    }
    echo "\nsum of value dispari is \t" . sommaDispari($provare);

    function media($provare){
        foreach($provare as $i){
            $sum+=$i; 
        }
        $media = $sum/count($provare);
        return $media;
    }

    echo "\nmedia value is\t" . media($provare);
?>