<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Backend</title>
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
        <h1>Uppg 1</h1>
        <?php
        // Uppg 1 - Superglobals KLART
        //phpinfo(); // Sök här efter uppg 1 info
        
        print("<p>användarnamnet: " . $_SERVER['REMOTE_USER'] . "</p>");
        $serverPort = $_SERVER['SERVER_PORT'];
        // Konkatenering med punkt, märk att PHP kod producerar HTML resurser
        print("<p>Host namn: " . gethostname() . "</p>");
        print("<p>Servern snurrar på port :" . $serverPort . "</p>" );
        print("<p>Serverns ip-adress: " . $_SERVER['SERVER_ADDR'] . "</p>");
        print("<p>Din ip-adress: " . $_SERVER['REMOTE_ADDR'] . "</p>");

        $version = apache_get_version();
        print("<p> Version av Apache: " . $version . "</p>");
        print("<p> PHP versionen: " . phpversion() . "</p>");
        ?>
        </article>

        <article>
            <h1>Uppg 2</h1>
        <?php
        print("<p>Idag är det den " . date("d/m/Y") . "</p>");
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

        print("<p>Det är nu " . $manad[$monthnum] . "</p>");


        //Kolla cookies på egen hand
        ?>
        </article>
    </div>
</body>

<!-- Script kan köras efter att sidan laddats in -->
<script src="script.js"></script>

</html>
