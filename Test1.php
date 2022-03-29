<?php
$_fp = fopen("php://stdin", "r");

fscanf($_fp, "%d %d", $n, $d);
$items = explode(" ", trim(fgets($_fp)));
$arr = array_fill (0,201,0);
for($i = 0; $i < $d; $i++){
    $arr[$items[$i]] += 1;
}
$count = 0;
$m = floor($d/2)+1;
for($i = $d; $i < $n; $i++){
    $mi = 0;
    $j = 0;
    while($j <= 200 && $mi < $m-1){
        $mi += $arr[$j];
        $j++;
    }
    if($d%2 == 0)
        $meiden = $j-1;
    while($j <= 200 && $mi < $m){
        $mi += $arr[$j];
        $j++;
    }
    if($d%2 == 0)
        $meiden += $j-1;
    else
        $meiden = 2*($j-1);
    if($meiden <= $items[$i])
        $count++;
    $arr[$items[$i-$d]] -= 1; 
    $arr[$items[$i]] += 1;
}
echo $count."\n";
