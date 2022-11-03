<?php
/**
- Praktikum DBWT. Autoren:
- Nour, Shakouj,3531635
- Andreas Welly Octavianus, 3541951
*/

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
    $minStars = $_GET[GET_PARAM_MIN_STARS];
    foreach ($ratings as $rating) {
        if ($rating['stars'] >= $minStars) {
            $showRatings[] = $rating;
        }
    }
} else {
    $showRatings = $ratings;
}

function calcMeanStars(array $ratings) : float{
    $sum = 0;
    foreach ($ratings as $rating) {
        $sum += $rating['stars'] / count($ratings);
    }
    return $sum;
}

?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8"/>
        <title>Gericht: <?php echo $meal['name']; ?></title>
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

        <h1>Gericht: <?php echo $meal['name']; ?></h1>
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
        <p>Allergens:</p>
        <ul>
            <li><?php echo$allergens[$meal['allergens'][0]]; ?></li>
            <li><?php echo$allergens[$meal['allergens'][1]]; ?></li>
        </ul>
        <h1>Bewertungen (Insgesamt: <?php echo calcMeanStars($ratings); ?>)</h1>
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
        <table class="rating">
            <thead>
            <tr>
                <td>Text</td>
                <td>Sterne</td>
                <td>Author</td>
            </tr>
            </thead>
            <tbody>
            <?php
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