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

$photosSql = 'SELECT * FROM `Photos` WHERE id = '.$_GET['id'].'';
$photos = $connection->query($photosSql);

while ($row = mysqli_fetch_array($photos))
{
    $photoid = (int)$row['id'];
    $photoName = $row['name'];
    $price = $row['price'];
}
    if (!isset($_GET['confirmed'])):?>
        <form id="order" action="./order.php">
    <h1><?php echo $photoName ?></h1>

        <h2>PhotoID  <?php echo $photoid ?></h2>

        <h3>£<?php echo $price; ?></h3>

        <div class ="forminput">
            <input class="input-field" type="text" name="username" placeholder="Name" pattern = "[a-zA-Z\s]+" required value="<?php echo isset($_GET['username']) ? $_GET['username'] : null ?>" />
            <input class="input-field" type="number" name="phone" placeholder="Phone number (11 Digits Long)" required pattern=".{11}" value="<?php echo isset($_GET['phone']) ? $_GET['phone'] : null ?>" />
            <input class="input-field" type="email" name="email" placeholder="Email" required value="<?php echo isset($_GET['email']) ? $_GET['email'] : null ?>" />
            <input class="input-field" type="text" name="address" placeholder="Postal Address" required value="<?php echo isset($_GET['address']) ? $_GET['address'] : null ?>" />
        </div>
    <input type="hidden" name="id" value="<?php echo $photoid; ?>" />
    <input type="hidden" name="confirmed" value="1" />

        <div class ="buttonone">
        <button type = "submit" form = "order">Order</button>
        </div>
    </form>
        <div class = "buttontwo">
            <a href="gallery.php"><button>Back to Gallery</button></a>
        </div>

<?php endif?>

<?php if ((isset($_GET['confirmed'])) && (int)$_GET['confirmed'] === 1):?>
    <form>
        <h2 class="header title"> Order Confirmed </h2>
    </form>

    <div class ="submit">
            <a href="gallery.php"><button>Back to Gallery</button></a>
        </div>
    </form>
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