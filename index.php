<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jennas & Sophias PHP projekt 1</title>
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
        </article>

        <?php
        // Uppg 1 - Superglobals KLART
        //phpinfo(); // Sök här efter uppg 1 info
        
        print("<p>användarnamnet: " . $_SERVER['REMOTE_USER'] . "</p>");
        $serverPort = $_SERVER['SERVER_PORT'];
        // Konkatenering med punkt, märk att PHP kod producerar HTML resurser
        print("<p>Servern snurrar på port :" . $serverPort . "</p>" );
        print("<p>Serverns ip-adress: " . $_SERVER['REMOTE_ADDR'] . "</p>");
        print("<p>Din ip-adress: " . $_SERVER['REMOTE_ADDR'] . "</p>");

        $version = apache_get_version();
        print("<p> Version av Apache: " . $version . "</p>");
        print("<p> PHP versionen: " . phpversion() . "</p>");
        ?>

        <article>
            <h1>Uppg 2</h1>
            <p>Thesourmango kodar vidare</p>
            <p>och kommer strax att glömma pull inna push!</p>
        </article>
    </div>
</body>

<!-- Script kan köras efter att sidan laddats in -->
<script src="script.js"></script>

</html>
