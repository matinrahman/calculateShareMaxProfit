<?php

// Complete the stockmax function below.
function stockmax($prices) {

    $sizeofPrices = sizeof($prices)-1;
    $maxProfit = 0;
    $maxPrize = 0;
    $buyingPrices = array();
    
    for($i=$sizeofPrices;$i>=0;$i--){
        if($prices[$i]>$maxPrize){
            $maxPrize =$prices[$i];
        }else{
            $maxProfit += $maxPrize - $prices[$i];
        }
    }
return $maxProfit;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $t);

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    fscanf($stdin, "%d\n", $n);

    fscanf($stdin, "%[^\n]", $prices_temp);

    $prices = array_map('intval', preg_split('/ /', $prices_temp, -1, PREG_SPLIT_NO_EMPTY));

    $result = stockmax($prices);

    fwrite($fptr, $result . "\n");
}

fclose($stdin);
fclose($fptr);
