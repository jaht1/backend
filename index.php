<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dennis JS Demo</title>
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
            <p>Jag ändrar samma paragraf som thesourmango</p>
        </article>

        <?php
        print(3+6);
        // Uppg 1 - Superglobals
        // phpinfo(); // Sök här efter uppg 1 info
        print($_SERVER['REMOTE_USER']);
        $serverPort = $_SERVER['SERVER_PORT'];
        // Konkatenering med punkt, märk att PHP kod producerar HTML resurser
        print("<p>Servern snurrar på port :" . $serverPort . "</p>" );
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
