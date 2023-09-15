/**
 * Correction Rxjs Fruits
 *  https://www.rxjs-fruits.com/
 * 
 */

/** Level  1 */
conveyorBelt.subscribe();

/** Level 2  */
fruits.subscribe(fruit => toConveyorBelt(fruit));

/** Level 3 */
fruits.pipe(
    distinct()
).subscribe(fruit => toConveyorBelt(fruit));

/** Leve 4 */
fruits.pipe(
    take(2)
).subscribe(fruit => toConveyorBelt(fruit));

/** Level 5 */
fruits.pipe(
    filter(fruit => !fruit.includes('old'))
).subscribe(fruit => toConveyorBelt(fruit));

/** Level 6 */
fruits.pipe(
    map((fruit) => {
        if (fruit.includes('dirty')) {
            let arr  = fruit.split('-');
            let item = arr[1];
            return item
        }
        return fruit;
    })
)

/** Level 7 */
fruits.pipe(
    filter(fruit => !fruit.includes('old')),
    map((fruit) => {
        if (fruit.includes('dirty')) {
            let arr = fruit.split('-');
            let item = arr[1];
            return item;
        }
        return fruit;
    }),
    take(2)

).subscribe(fruit => toConveyorBelt(fruit));

/** Level 8 */
fruits.pipe(
	distinctUntilChanged()
).subscribe(fruit => toConveyorBelt(fruit));

/** Level 8 */
fruits.pipe(
	skip(2)
).subscribe(fruit => toConveyorBelt(fruit));

/** Level 10   */
fruits.pipe(
    map((fruit) => {
       if (fruit.includes('dirty')) {
           let arr = fruit.split('-');
           let item = arr[1];
           return item;
       }
       return fruit;
    }),
    skip(2),
    take(1)
   ).subscribe(fruit => toConveyorBelt(fruit));

/** Level 11 */
merge(
    apples, bananas
).pipe(
    filter(fruit => !fruit.includes('old'))
).subscribe(fruit => toConveyorBelt(fruit));

/** Level 12 */
fruits.pipe(
	takeLast(3)
).subscribe(fruit => toConveyorBelt(fruit));

/** Level 13  */
fruits.pipe(
	skipLast(2)
).subscribe(fruit => toConveyorBelt(fruit));

/** Levele 14 */
const freshApples = apples.pipe(
    skipLast(2)
);
const freshBananas = bananas.pipe(
	skip(2)
);
merge(freshApples, freshBananas)
.pipe(
     map((fruit) => {
        if (fruit.includes('dirty')) {
            let arr = fruit.split('-');
            let item = arr[1];
            return item;
        }
        return fruit;
    })
).subscribe(fruit => toConveyorBelt(fruit));

/** Level 15 */
zip(apples, bananas)
.pipe(
	concatMap(([apple, banana]) => [apple, banana])
).subscribe(fruit => toConveyorBelt(fruit));

/** Level 16 */
fruits.pipe(
	repeat(3)
).subscribe(fruit => toConveyorBelt(fruit));