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

$photosSql = 'SELECT * FROM `Photos` WHERE id = '.$_GET['id'].'';
$photos = $connection->query($photosSql);
?>

<link rel = "stylesheet" type="text/css" href ="table.css"/>
<?php
while ($row = mysqli_fetch_array($photos))
{
    $element =
        '
                                <h1 class="header outline"> '.$row['name'].' </h1>
                                <p>Price: £'.$row['price'].' </p>
                                <p>Size: '.$row['width'].'mm'.' x '.$row['height'].'mm </p>
                                <p> Date it was completed: '.$row['CompletionDate'].' </p>
                                <p> '.$row['description'].' </p>
                                <a href="gallery.php"><button>Back</button></a>
                                <a href="order.php?id='.$row['id'].'"><button>Order</button></a>
        ';

    echo $element;
}?>

</form>
</body>
</html>