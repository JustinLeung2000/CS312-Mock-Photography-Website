<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" type="text/css" href ="navbar.css"/>
    <link rel = "stylesheet" type = "text/css" href = "forms.css"/>
    <title>Cara's Photography</title>
</head>

<style> body { background-image: url("img/background2.jpg");
        background-size:cover;
        background-repeat: no-repeat;
    }
</style>
<body>
<div class = "navigationBar">
    <ul>
        <a href = "index.html">Home</a>
        <a class = "active" href = "gallery.php">Gallery</a>
        <a href = "visit.php">Visit Us</a>
        <a href = "login.php">Admin</a>
    </ul>
</div>

<?php
$host = "devweb2020.cis.strath.ac.uk";
$username = "gwb18170";
$password = "Voom3AhngaiM";
$connection = new mysqli($host,$username,$password,$username);

$photosSql = "SELECT * FROM `Photos` LIMIT 12";
$photos = $connection->query($photosSql);
?>

<form>

    <?php
    while ($row = mysqli_fetch_array($photos))
    {
         $detailsLink =
                        '<a href="./details.php?id='.$row['id'].'">
                         <p> '.$row['name'].' £'.$row['price'].' · '.$row['height'].'mm'.' x '.$row['width'].'mm </p>
                         </a>';

        echo $detailsLink;
    }
    ?>
</form>
<div class = "submit">
<button style = "float: left;"> Previous Page</button> <?php $prevPhotos = "SELECT * FROM `Photos` LIMIT 12 OFFSET -12"; $photos = $connection -> query($prevPhotos);?>
<button style = "float: right;"> Next Page</button> <?php $nextPhotos = "SELECT * FROM `Photos` LIMIT 12 OFFSET 12"; $photos = $connection -> query($nextPhotos);?>
</div>
</form>
</body>
</html>