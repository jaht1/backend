<?php
session_start();
include "functions.php"
?>
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
        <?php include "navbar.php"?>

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
print("<p>Det är nu månad nummer: " . $monthnum . "</p>");
print("<p>Vilket betyder att det nu är " . $manad[$monthnum] . "</p>");

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

    if (is_numeric($dag) && is_numeric($manad) && is_numeric($ar)) {
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
    } else {
        echo "<p style='color:red;''>Checka inmatningen. Det ser ut som att du angett något annat än siffror.</p>";
    }
}
?>


        </article>

        <article>
            <h2>Uppgift 4</h2>
            <form action="index.php" method="get">
                Användarnamn: <input type="text" name="username"><br>
                E-mail: <input type="text" name="email"><br>
                <input type="submit">
            </form>

            <?php

$subject = "Bekräftelse email";

function password_generate($chars)
{
    $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($data), 0, $chars);
}
$pswrd = password_generate(10);

$txt = "Välkommen " . $_GET['username'] .
    "!\nHär är ditt lösenord: \n" . $pswrd;
if (isset($_REQUEST['username']) && isset($_REQUEST['email'])) {
    //Uppg 4 skicka confirmation mail
    $username = test_input($_GET['username']);
    print("<p>" . $username . "</p>");

    if (filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
        mail($_GET['email'], $subject, $txt);
        echo ("<p>Vi har skickat ett lösenord åt dig till adressen " . $_GET['email'] . "</p>");
    } else {
        echo ("<p style='color:red;'>" . $_GET['email'] . " är inte en giltig email adress </p>");
    }

}
?>

        </article>


        <article>
            <h2>Uppgift 5 - Cookie</h2>
            <?php

//Ge användaren en cookie
$cookie_name = "username";
$cookie_value = "jahti";
setcookie($cookie_name, $cookie_value, time() + (86400 * 2), "/");
$dt = date("d.m.Y");


$firstVisit = "";
//kolla ifall användaren har en cookie
if (isset($_COOKIE["username"])) {
    //print("<p>Välkommen igen " . $cookie_value . "!</p>");
    
    /*$elapsedTime = time()-$_COOKIE[" firstVisitTime" ];
    $elapsedTimeMinutes = (int) ($elapsedTime / 60);
    $elapsedTimeSeconds = $elapsedTime % 60;*/
    print("<p>Välkommen tillbaka!</p>");
    //print("<p>Ditt första besök var " . $dt . "</p>");
}
else {
    print("Hej nya besökare!");
    $firstVisit = date("d.m.Y");
    //setcookie(" firstVisitTime" , time(), time() + 60 * 60 * 24 * 365," /" ," " );
}

//Extrapoäng-delen fattas
?>

        </article>

        <article>
        <h2>Uppgift 6 - Spara användardata på servern</h2>
        <!---2. ändra method till post-->
        <form action="index.php" method="post">
                Login: <input type="text" name="login"><br>
                Password: <input type="text" name="password"><br>
                <input type="submit">
            </form>
<?php

//todo: checka om det är samma user

//test_input hindrar script etc
//1. ändra get till post
$login = test_input($_REQUEST['login']);
$password = test_input($_REQUEST['password']);
$_SESSION['user'] = $login;

if ($login =="jenna"){
//$_SESSION['user'] = "jenna";
print("<p>Endast jenna har tillgång till dark web </p>");
print("<a href='darkweb.php'>DARK WEB</a>");
}
else{
print("<p>Inga hemlisar för skurkar </p>");
print("<a href='visitor.php'>sidan för gäster</a><br>");
//print("du har inte tillgång till <a href='darkweb.php'>DARK WEB</a>");
}
?>
        </article>
        <article>
        <h2>Uppg 7 - Filhantering</h2>
        <!---<p>Lägg till ett filnamn:</p>
        <form action="index.php" method="get">
        Filnamn: <input type="text" name="filnamn"><br>
        <input type="submit">
        </form>-->

        <form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:<br>
  <input type="file" name="fileToUpload" id="fileToUpload"><br>
  <input type="submit" value="Upload Image" name="submit">
</form>
<?php

?>
        </article>


<article>
<h2>Uppgift 8 </h2>
<?php
$myfile = fopen("besok.log", "a+") or die("Unable to open file!");
fwrite($myfile, $login . " var här den " . date("d.m.Y") . " kl. " . date("H:i:s") );
fwrite($myfile, "\nbesökarens ip-adress: " . $_SERVER['REMOTE_ADDR'] . "\n\n");
fclose($myfile);

print("<a href='besok.log'>besök log</a>");
?>

</article>

<article>
<h2>Uppgift 9</h2>

</article>

    </div>
</body>

<!-- Script kan köras efter att sidan laddats in -->
<script src="script.js"></script>

</html>