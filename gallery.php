<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" type="text/css" href ="navbar.css"/>
    <title>Cara's Photography</title>
</head>
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

<link rel = "stylesheet" type="text/css" href ="table.css"/>
    <?php
    while ($row = mysqli_fetch_array($photos))
    {
        $element =
            '<a href="./details.php?id='.$row['id'].'"><div class="grid-element">
                            <h2 class="title"> '.$row['name'].' </h2>
                            <p> £'.$row['price'].' · '.$row['height'].'mm'.' x '.$row['width'].'mm </p>
                        </div>
                    </div></a>';

        echo $element;
    }
    ?>

    <button style = "float: left;"> Previous Page</button> <?php $prevPhotos = "SELECT * FROM `Photos` LIMIT 12 OFFSET -12"; $photos = $connection -> query($prevPhotos);?>
    <button style = "float: right;"> Next Page</button> <?php $nextPhotos = "SELECT * FROM `Photos` LIMIT 12 OFFSET 12"; $photos = $connection -> query($nextPhotos);?>
</form>
</body>
</html>