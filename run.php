<?php 
/**
 * Function triByInsertAsc
 * 
 * @param array $ints 
 * 
 * @return array
 */
function triByInsertAsc(array $ints) : array
{
    $cardinal = count($ints);
    for ($j=1; $cardinal> $j; $j++) {
        $key = $ints[$j];
        $i= $j - 1;
        while ($i>-1 && $ints[$i] >$key) {
            $ints[$i + 1] = $ints[$i];
            $i = $i - 1;
        }
        $ints[$i + 1] = $key;
    }
    return $ints;
}
/**
 * Function triByInsertDesc
 * 
 * @param  array $ints
 * 
 * @return array
 */
function triByInsertDesc(array $ints) : array 
{

    $cardinal = count($ints);
    for ($j=1; $cardinal> $j; $j++) {
        $key = $ints[$j];
        $i= $j - 1;
        while ($i>-1 && $ints[$i] < $key) {
            $ints[$i + 1] = $ints[$i];
            $i = $i - 1;
        }
        $ints[$i + 1] = $key;
    }    return $ints;
}
$ints = [31,41,59,26,41, 58]; 
print_r(triByInsertAsc($ints)); // [26, 31, 41, 41, 58]
print_r(triByInsertDesc($ints)); // [58, 41, 41, 31, 26]