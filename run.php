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

/**
 * The function searchBinary performs a binary search on a sorted array of integers to find a specific
 * item.
 * 
 * @param array ints The `ints` parameter in the `searchBinary` function is an array of integers that
 * will be searched for the specified `item`. The function is a binary search algorithm that aims to
 * find the index of the `item` within the `ints` array.
 * @param item The `` parameter in the `searchBinary` function represents the element that you are
 * searching for within the sorted array ``. The function is designed to perform a binary search
 * to find the index of the `` within the array.
 * 
 * @return int The function is currently returning 0.
 */
function searchBinary(array $ints, $item): int|null
{
    $high  = count($ints) -1;
    $low   = 0;
    $mid   = ceil(($high + $low)/2);
    $guess = $ints[$mid];

    while ($low <= $high) {
        if ($guess == $item) {
            return $mid;
        }elseif ($guess > $item) {
            $high = $mid - 1;
        } else {
            $low= $mid + 1;
        }
        return 0;
    }
    return 0;
}
$ints = [31,41,59,26,41, 58]; 
$intsOrderBy= [1,3, 5, 7, 9];
//print_r(triByInsertAsc($ints)); // [26, 31, 41, 41, 58]
// print_r(triByInsertDesc($ints)); // [58, 41, 41, 31, 26]
print_r(searchBinary($intsOrderBy, 7));