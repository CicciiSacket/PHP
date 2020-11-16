<html>
    <head> 
        <title>MARIO</title>
    </head>
    <body>
        <?php
            $array = array(6,2,4,8,1);
            // sort($array);
            // for($i = 0; $i < count($array);$i++){
            //     echo $array[$i] . "\n";
            // }

            for($i = 0; $i < count($array) - 1 ; $i++){ //selection sort
                $valueminim = $i;
                for($j = $i + 1; $j < count($array); $j++){
                    if($array[$j] < $array[$valueminim]){
                        $valueminim = $j;
                    }
                    $temp = $array[$valueminim];
                }
                $array[$valueminim] = $array[$i];
                $array[$i] = $temp;
            }
            print_r($array);


            for($y = 0; $y < count($array); $y++){ //insertion sort 
                $key = $array[$y];
                for ($x = $y-1 ; $x>=0 && $array[$x] > $key; $x--){
                    $array[$x + 1] = $array[$x];
                }
                $array[$x + 1] = $key;
            }            
            print_r($array)





        ?>  
    </body>
</html>
