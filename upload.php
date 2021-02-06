<h2>Uppg 7 - Filhantering</h2>


        <!--<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>-->

<!--
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$filnamn = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);
        //move_uploaded_file($target_file, $tmp_name);
        //echo $filnamn . "\n";
        
        echo "Filen är en bild - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Filen är inte en bild. <br>";
        $uploadOk = 0;
    }
}

if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "JPG") {
    echo "Endast JPG, JPEG, PNG & GIF filer är tillåtna.";
    $uploadOk = 0;

}
//$dir = "/images/";

// Sort in ascending order - this is default

if ($uploadOk == 1) {
    $a = scandir($target_dir);

// Sort in descending order
    $b = scandir($target_dir, 1);

    print_r($a);
    print_r($b);

    $image = $_FILES["file"]["name"]; /* Displaying Image*/
    $img = "upload/" . $image;
    //echo '<img src="' . $img . '">';
print("<p>Filen du vill ladda heter " . $filnamn);
    echo "<img src=\"$target_file\">";
    //echo $target_file;
}
?>
-->

<?php
if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    $filNamn = $_FILES['file']['name'];
    $filStorlek = $_FILES['file']['size'];
    $filTyp = $_FILES['file']['type'];
    $filTmpName = $_FILES['file']['tmp_name'];
    $filError = $_FILES['file']['error'];

    $filExt = explode('.', $filNamn);
    $filActualExt = strtolower(end($filExt));

    $tillatna = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($filActualExt, $tillatna)) {
        if ($filError === 0) {
            if ($filStorlek < 500000) {
                $filNamnNew = uniqid('', true).".".$filActualExt;
                $filDestination = 'uploads/'.$filNamnNew;
                move_uploaded_file($filTmpName, $filDestination);
                header("Location: index.php?uploadsuccess");

            } else {
                echo "Din fil är för stor!";
            }

        } else {
            echo "Det fanns ett problem med att ladda upp din fil!";
        }

    } else {
        echo "Du kan inte ladda upp denna typ av fil!";
    }
}
?>


        </article>