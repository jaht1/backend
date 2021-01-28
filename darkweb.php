<?php session_start();?>


<!DOCTYPE html>
<html lang="en">

<body>
    <?php
print("<p>Här är innehållet av din session: </p>");
print_r($_SESSION);
print("<br>Användaren: " . $_SESSION['user']);

//TOODO: visa en text endast för $_SESSION['user] =="jenna"
if ($_SESSION['user'] == 'jenna') {
    print("<p>Mitt lösenord är superhemlis</p>");
}
//TODO2:annars styr användaren till login sidan (index.php)
else {
    print("<p> Gå bort! Försök int</p>");
}

//Gör fler sidor med t.ex. "välkommen tillbaka"-text
?>
</body>
</html>