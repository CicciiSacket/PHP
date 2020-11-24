<?php
   $provare = array(3,4,5,6,7);
   $sum;

   echo (min($provare));
   echo"\n";
   echo (max($provare));
   echo "\n";

   foreach($provare as $i){
       $sum+=$i; 
   }
   $media = $sum/count($provare);
   echo($media);

/*
   echo "\n!!!!FUNZIONI!!!!!\n"; #!!!!!!!!!!!!!!
   echo "\n";

   function massimo($provare){
        for($i = 0; $i < count($provare); $i++){ //selection sort
            $valuemax = $i;
            if($provare[$i] > $valuemax){
                $valuemax = $provare[$i];
            }
        }
        return $valuemax;
    }

    echo "value maxi is " . massimo($provare);
   */
?>