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
        $j = $i;
        while ((abs($ts[$j]) <= abs($ts[$min])) && $j > 0) {
            if ((abs($ts[$j]) == abs($ts[$min])) && ($ts[$min] > $ts[$j])) {
                $min = $min;
            } else {
                $min = $j;
            }
            $j--;
        }
    }
    $res = (int) $ts[$min];
    if ($card == 0) {
        $res = 0;
    }
    return $res;
}

/**
 * Method is_win
 * Il permet d'ecrire le jumeau(twin) d'un est un mot écrit avec exactement mêmes 
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
 * Il permet de retourne le moment ou la somme de ces chiffre se rejoins.
 * 
 * @param int $nombreX - 
 * @param int $nombreY -
 * 
 * @return int
 */
function computeJoinPoint(int $nombreX, int $nombreY)
{
    $bool = true;
    $sommeX = $nombreX;
    $sommeY = $nombreY;
    $resultat = null;

    while ($sommeX !== $sommeY && $bool) {
        $x = (string) $sommeX;
        $y = (string) $sommeY;
        $arrX = str_split(trim($x));
        $arrY = str_split(trim($y));
        $cardX = count($arrX);
        $cardY = count($arrY);

        for ($i = 0; $i < $cardX; $i++) {
            $sommeX = $sommeX + $arrX[$i];
        }
        for ($j = 0; $j < $cardY; $j++) {
            $sommeY = $sommeY + $arrY[$j];
        }
        if ($sommeX === $sommeY) {
            $bool = false;
            $resultat = $sommeX;
        }
    }
    return $resultat;
}
echo computeJoinPoint(471, 480) . "\n";
