<?php session_start();?>


<!DOCTYPE html>
<html lang="en">

<body>
    <?php
print("<p>Här är innehållet av din session: </p>");
print_r($_SESSION);
print("<br>Användaren: " . $_SESSION['user']);
//print("<br>Hej " . $_SESSION['user'] . "!");

/*if (isset($_COOKIE["username"])) {
    //print("<p>Välkommen igen " . $cookie_value . "!</p>");
    print("<p>Välkommen tillbaka " . $_SESSION['user'] ."!</p>");
    //print("<p>Ditt första besök var " . $dt . "</p>");
}
else {
    print("Hej nya besökare!");
}*/
?>
</body>
</html>