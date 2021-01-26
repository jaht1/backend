<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Backend Projekt 1</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Containern har max bredd 800px -->
    <div id="container">
        <nav>
            <!-- Logo och meny finns i nav -->
            <ul>
                <a id="current" href="home/">Home</a>
                <a href="projekt1/">Projekt 1</a>
                <a href="projekt2/">Projekt 2</a>
            </ul>
        </nav>

        <!-- Artiklar placerar sig snyggt efter varann -->


        <article>
        <h2>Uppg 1 - Användardata</h2>
        <?php
// Uppg 1 - Superglobals KLART
//phpinfo(); // Sök här efter uppg 1 info

print("<p>användarnamnet: " . $_SERVER['REMOTE_USER'] . "</p>");
$serverPort = $_SERVER['SERVER_PORT'];
// Konkatenering med punkt, märk att PHP kod producerar HTML resurser
print("<p>Host namn: " . gethostname() . "</p>");
print("<p>Servern snurrar på port :" . $serverPort . "</p>");
print("<p>Serverns ip-adress: " . $_SERVER['SERVER_ADDR'] . "</p>");
print("<p>Din ip-adress: " . $_SERVER['REMOTE_ADDR'] . "</p>");

$version = apache_get_version();
print("<p> Version av Apache: " . $version . "</p>");
print("<p> PHP versionen: " . phpversion() . "</p>");
?>
        </article>

        <article>
            <h2>Uppg 2</h2>
        <?php
print("<p>Idag är det den " . date("d.m.Y") . "</p>");
print("<p>Klockan är " . date("H:i:s") . "</p>");

// Array för veckodagen på svenska
$veckodag = array("söndag", "måndag", "tisdag", "onsdag", "torsdag", "fredag", "lördag");
//ger dagen som ett nummer
$dagnummer = date('w');
print("</p>Idag är det " . $veckodag[$dagnummer] . "</p>");

//veckonumret
//ger veckodagen som ett nummer
$veckonummer = date('W');
print("<p>Veckonumret är: " . $veckonummer . "</p>");

// Array för månaden på svenska
$manad = array(" ", "januari", "februari", "mars", "april", "maj", "juni", "juli", "augusti", "september", "oktober", "november", "december");
//ger månadens nummer
$monthnum = date("n");
print("<p>Det är nu den " . $monthnum . ":nde månaden </p>");
print("<p>Vilket betyder att det är nu " . $manad[$monthnum] . "</p>");

//Kolla cookies på egen hand
?>

        </article>

        <article>

        <h2>Uppgift 3 </h2>
        <p>Räkna hur lång tid det är till ett datum.
        <form action="index.php" method="get" text-align="center">
             Dag: <input type="text" name="dag"><br>
            Månad: <input type="text" name="manad"><br>
            år: <input type="text" name="ar"><br>

        <input type="submit">
</form>



        <?php
//Läxan är att göra uppgifterna 1-3
//kolla om man tryckt på submit
//Ifall det inte fungerar, prova $GET ist för $REQUEST
if (isset($_REQUEST["dag"]) && isset($_REQUEST["manad"]) && isset($_REQUEST["ar"])) {
    $dag = $_GET["dag"];
    $manad = $_GET["manad"];
    $ar = $_GET["ar"];

    $datum = $dag . "." . $manad . "." . $ar;
    $datum2 = $ar . "-" . $manad . "-" . $dag;

//veckonumret
    $date_string = $datum2;
    $date_int = strtotime($date_string);
    $date_date = date($date_int);
    $week_number = date('W', $date_date);

    $today_day = date('d');
    $today_month = date('m');
    $today_year = date('Y');
    print("<p>Du vill veta hur länge det är till " . $_GET["dag"] . "." . $_GET["manad"] . "." . $ar . "</p>");
    print("<p>Då är det vecka " . $week_number . "</p>");

    $datetime1 = new DateTime();
    $datetime2 = date_create($datum2);

    $interval = date_diff($datetime1, $datetime2);

    if (strtotime($datum2) > time()) {
        echo "<p>Du vill veta tiden mellan idag och ett datum i <b>framtiden</b>. </p>";
        echo "<p>Det är " . $interval->format('%a dagar, %h timmar, %i minuter och %s sekunder') . " tills det.</p>";
    } else {
        echo "<p>Du vill veta tiden mellan idag och ett datum i det <b>förflutna</b>. </p>";
        echo "<p>Det har gått " . $interval->format('%a dagar, %h timmar, %i minuter och %s sekunder') . " sen dess.</p>";
    }
}
?>


        </article>

        <article>
        <h2>Uppgift 4</h2>
    <p>hahahahaahah</p>
        </article>


<article>
<h2>Uppgift 5 - Cookie</h2>
<?php

//Ge användaren en cookie
$cookie_name = "username";
$cookie_value = "jahti";
setcookie($cookie_name, $cookie_value, time() + (86400 * 2), "/");

//kolla ifall användaren har en cookie
if (isset($COOKIE_["username"])) {
    print("<p>Välkommen " . $cookie_value . "!</p>");
}
?>

</article>
    </div>
</body>

<!-- Script kan köras efter att sidan laddats in -->
<script src="script.js"></script>

</html>
