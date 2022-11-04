<?php
/**
- Praktikum DBWT. Autoren:
- Nour, Shakouj,3531635
- Andreas Welly Octavianus, 3541951
*/
const GET_PARAM_MAX_STARS = 'search_max_stars';
const GET_PARAM_MIN_STARS = 'search_min_stars';
const GET_PARAM_SEARCH_TEXT = 'search_text';

/**
 * List of all allergens.
 */
$allergens = [
    11 => 'Gluten',
    12 => 'Krebstiere',
    13 => 'Eier',
    14 => 'Fisch',
    17 => 'Milch'
];

$meal = [
    'name' => 'Süßkartoffeltaschen mit Frischkäse und Kräutern gefüllt',
    'description' => 'Die Süßkartoffeln werden vorsichtig aufgeschnitten und der Frischkäse eingefüllt.',
    'price_intern' => 2.90,
    'price_extern' => 3.90,
    'allergens' => [11, 13],
    'amount' => 42             // Number of available meals
];

$ratings = [
    [   'text' => 'Die Kartoffel ist einfach klasse. Nur die Fischstäbchen schmecken nach Käse. ',
        'author' => 'Ute U.',
        'stars' => 2 ],
    [   'text' => 'Sehr gut. Immer wieder gerne',
        'author' => 'Gustav G.',
        'stars' => 4 ],
    [   'text' => 'Der Klassiker für den Wochenstart. Frisch wie immer',
        'author' => 'Renate R.',
        'stars' => 4 ],
    [   'text' => 'Kartoffel ist gut. Das Grüne ist mir suspekt.',
        'author' => 'Marta M.',
        'stars' => 3 ]
];
function findminstars(array $ratings): int{
    $min = 10;
    foreach ($ratings as $rating){
        if ($rating['stars'] <= $min){
            $min = $rating['stars'];
        }
    }
    return $min;
}
function findmaxstars(array $ratings): int{
    $max = 0;
    foreach ($ratings as $rating){
        if ($rating['stars'] >= $max){
            $max = $rating['stars'];
        }
    }
    return $max;
}

$showRatings = [];
if (!empty($_GET[GET_PARAM_SEARCH_TEXT])) { //was?
    $searchTerm = $_GET[GET_PARAM_SEARCH_TEXT];
    foreach ($ratings as $rating) {
        if (strpos(strtoupper($rating['text']), strtoupper($searchTerm)) !== false) {
        //($rating['text'] == $searchTerm){
            $showRatings[] = $rating;
        }
    }
} else if (!empty($_GET[GET_PARAM_MIN_STARS])) {
    $minStars = findminstars($ratings);
    foreach ($ratings as $rating) {
        if ($rating['stars'] <= $minStars) {
            $showRatings[] = $rating;
        }
    }
}
else if (!empty($_GET[GET_PARAM_MAX_STARS])) {
    $maxStars = findmaxstars($ratings);
    foreach ($ratings as $rating) {
        if ($rating['stars'] >= $maxStars) {
            $showRatings[] = $rating;
        }
    }
}
else {
    $showRatings = $ratings;
}

function calcMeanStars(array $ratings) : float{
    $sum = 0;
    foreach ($ratings as $rating) {
        $sum += $rating['stars'] / count($ratings);
    }
    return $sum;
}
$lang =['gerichtname'=>['de' =>"Gericht" , 'en' => "Dish"],
    'preise_intern' =>['de'=>"interner Preis", 'en' => "Price for intern"],
    'preise_extern' =>['de'=>"externer Preis", 'en' => "Price for extern"],
    'allergen' => ['de' => "Allergens", 'en'=>"Allergies"],
    'bewertung' => ['de'=>"Bewertungen", 'en'=>"Rating"],
    'stern' => ['de'=>"Stern", 'en'=>"Star"],
];

?>
<!DOCTYPE html>
<html lang="<?php echo $_GET['language'] ?>">
<?php
if(!isset($_GET['language'])){
    $_GET['language']="de";
}
?>
    <head>
        <meta charset="UTF-8"/>
        <title><?php echo $lang['gerichtname'][$_GET['language']]; ?>: <?php echo $meal['name']; ?></title>
        <style>
            * {
                font-family: Arial, serif;
            }
            .rating {
                color: darkgray;
            }
        </style>
    </head>
    <body>

    <div>
        <a href="?language=en">Eng</a>
        <a href="?language=de">DE</a>
    </div>
        <h1><?php echo $lang['gerichtname'][$_GET['language']]; ?>: <?php echo $meal['name']; ?></h1>
        <h2><?php echo $lang['preise_intern'][$_GET['language']]; ?>: <?php echo number_format($meal['price_intern'], 2)?> €
            <br>
            <?php echo $lang['preise_extern'][$_GET['language']]; ?>: <?php echo number_format($meal['price_extern'], 2)?> €
        </h2>
        <form method="get">
            <input type="number" id="check" name="show_desc">
            <label for="show_desc">Beschreibung</label>
        <p><?php
            $check = $_GET['show_desc'] ?? NULL;

            if($check != "0") {
                echo $meal['description'];
            }
            elseif($check == "0"){

            }
            ?></p>
        </form>
        <p><?php echo $lang['allergen'][$_GET['language']]; ?>:</p>
        <ul>
            <li><?php echo$allergens[$meal['allergens'][0]]; ?></li>
            <li><?php echo$allergens[$meal['allergens'][1]]; ?></li>
        </ul>
        <h1><?php echo $lang['bewertung'][$_GET['language']]; ?> (Insgesamt: <?php echo calcMeanStars($ratings); ?>)</h1>
        <form method="get">
            <?php
            if(isset($_GET['search_text'])){
                $search= $_GET['search_text'];
            }
            else{
                $search='';
            }
            ?>
            <label for="search_text">Filter:</label>
            <input id="search_text" type="text" name="search_text" value="<?php echo $search ?>">
            <input type="submit" value="Suchen">
        </form>
        <form method="get">
            <p>Order:</p>
            <button type="submit" name="search_max_stars" value="1">TOP</button>
            <button type="submit"  name="search_min_stars" value="1">FLOPP</button>
        </form>
        <table class="rating">
            <thead>
            <tr>
                <td>Text</td>
                <td><?php echo $lang['stern'][$_GET['language']]; ?></td>
                <td>Author</td>
            </tr>
            </thead>
            <tbody>
            <?php
            $order = $_GET['order'] ?? NULL;
            $order = 0;
            if($order == 'TOP'){
                asort( $Ratings['stars']);
            }
            elseif ($order == 'FLOPP'){
                arsort($showRatings);
            }
            else{

            }
            foreach ($showRatings as $rating) {
                echo "<tr><td class='rating_text'>{$rating['text']}</td>
                      <td class='rating_stars'>{$rating['stars']}</td>
                      <td class='rating_author'>{$rating['author']}</td> 
                      </tr>";
            }
            ?>
            </tbody>
        </table>
    </body>
</html>