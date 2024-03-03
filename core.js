/**
    * @description      : 
    * @author           : christian
    * @group            : 
    * @created          : 18/07/2021 - 02:48:16
    * 
    * MODIFICATION LOG
    * - Version         : 1.0.0
    * - Date            : 18/07/2021
    * - Author          : christian
    * - Modification    : 
**/
/**
 * Method  sommeInterval
 * Il permet d'obtenir la somme d'intervale donnée
 * 
 * @param {object} ts    -
 * @param {number} start -
 * @param {number} end   - 
 * 
 * @return int
 */
function sommeInterval(ts, start, end)
{
    let card = ts.length ; // Taille du tableau 
    let somme = 0;
    let min = Math.min(card - 1, start);
    let max = Math.max(0, end);

    if (0 == card) return 0;

    for (let i = min; max >= i; i++) {
        somme = somme + ts[i];
    }
    return somme;
}
/**
 * Trouvez le plus petit intervalle (différence minimale) 
 * entre les nombres d'un tableau.
 * 
 * @param {object} numbers - 
 * 
 * @return {number} diff   - 
 */
function smallestInterval(numbers)
{
    let length = numbers.length;
    numbers.sort();
    // Valeur (sûre) maximale d’un nombre entier en JavaScript.
    let diff = Number.MAX_SAFE_INTEGER; //Falcultatif 
    for (let i = 0; i < length - 1; i++) {
        if (numbers[i + 1] - numbers[i] < diff) {
            diff = numbers[i + 1] - numbers[i];
        }
    }
    return diff;
}
/**
 * Method valeurApprocheZero
 * 
 * @param {array} ts - 
 * 
 * @return {number}
 */
 function valeurApprocheZero(ts)
{
    let card = ts.length;
    let min = 0;

    for (let i = 0; i < card; i++) {
        j = i;
        while ((Math.abs(ts[j]) <= Math.abs(ts[min])) && j > 0) {
            if ((Math.abs(ts[j]) == Math.abs(ts[min])) && (ts[min] > ts[j])) {
                min = min;
            } else {
                min = j;
            }
            j--;
        }
    }
    res = parseInt(ts[min]);
    if (card == 0) {
        res = 0;
    }
    return res;
}

/**
 * Method is_win
 * Il permet d'ecrire le jumeau(twin) d'un est un mot écrit avec exactement mêmes 
 * lettres (indépendamment de la casse)
 * 
 * @param {string} x - 
 * @param {string} y -
 * 
 * @return bool
 */
function is_win(x, y)
{
    x.toLocaleLowerCase(); // Convertir en minuscule
    y.toLocaleLowerCase(); // Convertir en minuscule
    const cardX = x.length;
    const cardY = y.length;
    const arrX  = x.trim().split(""); // Transformation un string en Tableau
    const arrY  = y.trim().split(""); // Transformation un string en Tableau

    let bool  = false;
    let i = 0;

    while (cardX === cardY && cardX > i) {
        for (let j = 0; cardY > j; j++) {
            bool = (arrX[i] === arrY[j]) ? true : false;
        }
        i++;
    }
    return bool;
}
//console.log({bool: is_win("marion", "romain")});

/**
 * Method computeJoinPoint
 * Il permet de retourne le moment ou la somme de ces chiffre se rejoins.
 * 
 * @param {int} nombreX - 
 * @param {int} nombreY -
 * 
 * @return int
 */
function computeJoinPoint(nombreX, nombreY)
{
    let bool = true;
    let sommeX = nombreX;
    let sommeY = nombreY;
    let resultat = null;

    while (sommeX !== sommeY && bool) {

        let x = sommeX.toString();
        let y = sommeY.toString();
        
        let arrX = x.trim().split("");
        let arrY = y.trim().split("");

        let cardX = arrX.length;
        let cardY = arrY.length;

        for (let i = 0; i < cardX; i++) {
            sommeX = sommeX + parseInt(arrX[i]);
        }
        for (let j = 0; j < cardY; j++) {
            sommeY = sommeY + parseInt(arrY[j]);
        }

        if (sommeX === sommeY) {
            bool = false;
            resultat = sommeX;
        }
    }
    return resultat;
}
console.log({ resultat: computeJoinPoint(471, 480) });

