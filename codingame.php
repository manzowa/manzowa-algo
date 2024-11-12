<?php

/**
 * Method  sommeInterval
 * Il permet d'obtenir la somme d'intervale donnée
 * 
 * @param array $ts    -
 * @param int   $start -
 * @param int   $end   - 
 * 
 * @return int
 */
function sommeInterval(array $ts, int $start, int $end): int
{
    $card = sizeof($ts); // Taille du tableau 
    $somme = 0;
    $min = min($card - 1, $start);
    $max = max(0, $end);
    if (!is_array($ts) || 0 == $card) {
        return 0;
    }
    for ($i = $min; $max >= $i; $i++) {
        $somme = $somme + $ts[$i];
    }
    return $somme;
}
/**
 * Trouvez le plus petit intervalle (différence minimale) 
 * entre les nombres d'un tableau.
 * 
 * @param array $numbers - 
 * 
 * @return array $diff   - 
 */
function smallestInterval(array $numbers): int
{
    $length = count($numbers);
    sort($numbers);
    //  Valeur (sûre) maximale d’un nombre entier en PHP
    $diff = PHP_INT_MAX; //Falcultatif
    for ($i = 0; $i < $length - 1; $i++) {
        if ($numbers[$i + 1] - $numbers[$i] < $diff) {
            $diff = $numbers[$i + 1] - $numbers[$i];
        }
    }
    return $diff;
}
/**
 * Method valeurApprocheZero
 * 
 * @param array $ts - 
 * 
 * @return int
 */
function valeurApprocheZero(array $ts): int
{
    $card = sizeof($ts);
    $min = 0;
    for ($i = 0; $i < $card; $i++) {
        $t = $ts[$i];
        if((abs(intval($ts[$min])) == abs($t) && intval($ts[$min]) < $t)  or (abs(intval($ts[$min])) > abs($t))) 
        $min = $i;
    }
    $result = ( $card > 0 ) ? $ts[$min] : 0;
    return $result;
}

/**
 * Method is_win
 * 
 * IL permet d'affirmer le deux mot en parametre ont le même
 * lettres (indépendamment de la casse)
 * 
 * @param string $x - 
 * @param string $y -
 * 
 * @return bool
 */
function is_win(string $x, string $y)
{
    $cardX = mb_strlen(strtolower($x));
    $cardY = mb_strlen(strtolower($y));
    $arrX  = str_split(trim($x)); // Transformation un string en Tableau
    $arrY  = str_split(trim($y)); // Transformation un string en Tableau

    return (is_array($arrX)
        && is_array($arrY)
        && (count($arrX) == count($arrY))
        && (array_diff($arrX, $arrY) === array_diff($arrY, $arrX)));
}
//echo Is_win("marion", "romain") . "\n"; //"marion", "romain"

/**
 * Method computeJoinPoint
 * Il permet de retourne le moment ou la somme de ces chiffre se rejoint.
 * 
 * @param int $nombreX - 
 * @param int $nombreY -
 * 
 * @return int
 */
function computeJoinPoint(int $nombreX, int $nombreY) {
    $sommex = $nombreX;
    $sommey = $nombreY;
    $jointure = null;
    $level = 0; // Nombre des opération réalise 

    while($sommex !== $sommey && $level < 1000) {
        $sommex = $sommex + array_sum(str_split(strval($sommex))); 
        $sommey = $sommey + array_sum(str_split(strval($sommey)));
        ($sommey === $sommex)? $jointure = $sommex : false;
        $level++;
    }
    return $jointure;
}
// echo computeJoinPoint(471, 480) . "\n";
/**
 * Function election
 * 
 * Il permet de détermine l'année de l'éléction
 *
 * @param [type] $annee
 * @param integer $pEcart
 * @param integer $pAnneeStart
 * @return bool 
 */
function election($annee, $pEcart=5, $pAnneeStart=2007) {
    $ecart = $pEcart;
    $anneeStart = $pAnneeStart;
    $isbool = false;
    if ($annee >= $anneeStart) {
        $rest = $annee - $anneeStart;
        $nRest = ($rest == 0) ? $ecart : $rest;
        $counter = 1;
        $nEcart = $ecart;
        while ($nRest >= $nEcart) {
            if (($nEcart == $nRest) && ($nEcart/ $ecart >= 1)) {
            	 $isbool = true;
                 $counter = 1;
            }
            $counter++;
            $nEcart = $ecart * $counter;
        }
    }
   return $isbool;
}

/**
 * Function calc 
 * 
 * Il permet de retourne la somme de l'internal d'un tableau.
 *
 * @param array $array
 * @param integer $n1
 * @param integer $n2
 * @return integer
 */
function calc (array $array , int $n1, int $n2): int {
    $somme = 0;
    $index = $n1;
    while ($index <= $n2) {
        $somme = $somme + $array[$index];
        $index++;
    }
    return $somme;
}

function filterWords(array $words, string $letters): array {
    $resultat = [];
    $card = count($words);
    $index = 0;
    while ($card >= $index) {
        $word = trim($words[$index]).PHP_EOL;
        $wordLength= mb_strlen($word);
        $letterLength = mb_strlen($letters);
        
        for ($i=0; $i < $letterLength; $i++) { 
            for ($j=0; $j < $wordLength ; $j++) { 
                if ($letters[$i] == $word[$j] && $letters[$i] != "" ) {
                    $resultat[] = $word;
                    break;
                }
            }
        }
        $index++;
    }

    return $resultat;

}
/**
 * Function Magic
 *
 * @param array $stones
 * @return integer
 */
function magic(array $stones): int 
{
    $fusion = true;
    $level = 0;
    while ($fusion) {
        $fusion = false;
        $i = 0;
        $j = $i+1;
        $stones_tmp = [];
        while ($j < count($stones)) {
          if (($stones[$i] == $stones[$j])) {
            $fusion = true;
            $stones_tmp[] = $stones[$i] + 1;
            // Suppresion de valeur compare
            unset($stones[$i]);
            unset($stones[$j]);
            $stones= array_values($stones); // Reset index stones
          } else {
            $j++;
          }
        }
        $stones = [...$stones, ...$stones_tmp];
        $stones_tmp = [];
        $level ++;
    }
    return count($stones); 
}