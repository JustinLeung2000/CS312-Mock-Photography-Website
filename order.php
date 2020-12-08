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

while ($row = mysqli_fetch_array($photos))
{
    $photoid = (int)$row['id'];
    $photoName = $row['name'];
    $price = $row['price'];
}
    if (!isset($_GET['confirmed'])):?>
    <h2 class="header title"> #<?php echo $photoid ?> • <span class="outline"> £<?php echo $price; ?> </span></h2>
    <h1 class="header title"> <?php echo $photoName ?> </h1>
    <form id="order" action="./order.php">
  <p><input class="input-field" type="text" name="username" placeholder="Name" pattern = "[a-zA-Z]{1,}" required value="<?php echo isset($_GET['username']) ? $_GET['username'] : null ?>" /></p>
    <p><input class="input-field" type="tel" name="phone" placeholder="Phone number" required pattern=".{11}" value="<?php echo isset($_GET['phone']) ? $_GET['phone'] : null ?>" /></p>
        <p><input class="input-field" type="email" name="email" placeholder="Email" required value="<?php echo isset($_GET['email']) ? $_GET['email'] : null ?>" /></p>
            <p><input class="input-field" type="text" name="address" placeholder="Postal Address" required value="<?php echo isset($_GET['address']) ? $_GET['address'] : null ?>" /></p>
    <input type="hidden" name="id" value="<?php echo $photoid; ?>" />
    <input type="hidden" name="confirmed" value="1" />

        <a href="gallery.php"><button>Back</button></a>
        <button type = "submit" form = "order">Order</button>
</form>
<?php endif?>

<?php if ((isset($_GET['confirmed'])) && (int)$_GET['confirmed'] === 1):?>
    <h2 class="header title"> Order Confirmed </h2>
    <a href="gallery.php"><button>Back</button></a>
<?php
    if (isset($_GET['username']) && isset($_GET['email']) && isset($_GET['phone']) && isset($_GET['address']))

    $username = (string)$_GET['username'];
    $email = (string)$_GET['email'];
    $phone = (string)$_GET['phone'];
    $address = (string)$_GET['address'];

    $addOrder = "INSERT INTO `Orders` (`name`,`email`,`phone`,`address`,`photo_id`,`photo_name`) 
                        VALUES ('$username','$email','$phone','$address','$photoid','$photoName')";
    if (!mysqli_query($connection, $addOrder))
    {
        echo "Error: " . $addOrder . "<br>" . mysqli_error($connection);
    }
?>

<?php endif?>
</body>
</html>