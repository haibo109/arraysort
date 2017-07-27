<?php
$in =   [
    'A' =>  9,
    'B' =>  3,
    'C' =>  6,
    'D' =>  8,
    'F' =>  4,
    'G' =>  9,
];
$tmp    =   $in;
arsort($tmp);
$current    =   1;
$currentValue   =   current($tmp);
$out    =   arrSort($in, $current, $currentValue);
function arrSort($in, $current = 1, $currentValue, $out = []){
    $keyArray   =   array_keys($in, $currentValue);
    $add    =   0.5;
    $count  =   count($keyArray);
    foreach ($keyArray as $key){
        if($count == 1){
            $out[$keyArray[0]]  =   $current;
            unset($in[$keyArray[0]]);
        }else{
            $out[$key]  =   $current + $add;
            unset($in[$key]);
        }
    }
    $current    +=   $count;
    if(count($in) > 0){
        $currentValue   =   current($in);
        $out    =   arrSort($in, $current, $currentValue, $out);
    }
    return array_merge($out);

}
ksort($out);
