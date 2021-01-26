<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<body>
    <?php
    print("<p>här är innehållet av din session: </p>");
    print_r($_SESSION);
    ?>
</body>
</html>