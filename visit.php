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
        <a href = "gallery.php">Gallery</a>
        <a class = "active" href = "visit.php">Visit Us</a>
        <a href = "login.php">Admin</a>
    </ul>
</div>

<?php
$host = "devweb2020.cis.strath.ac.uk";
$username = "gwb18170";
$password = "Voom3AhngaiM";
$connection = new mysqli($host,$username,$password,$username);

?>

<?php if (!isset($_GET['confirmed'])):?>
<form id="booking" action="./visit.php">
    <p><input class="input-field" type="text" name="username" placeholder="Name" pattern = "[a-zA-Z]{1,}" required value="<?php echo isset($_GET['username']) ? $_GET['username'] : null ?>" /></p>
    <p><input class="input-field" type="tel" name="phone" placeholder="Phone number" required pattern=".{11}" value="<?php echo isset($_GET['phone']) ? $_GET['phone'] : null ?>" /></p>
    <p><input class="input-field" type="text" name="address" placeholder="Postal Address" required value="<?php echo isset($_GET['address']) ? $_GET['address'] : null ?>" /></p>
    <p><input class="input-field" type="datetime-local" name="date/time" placeholder="Date and Time" required value="<?php echo isset($_GET['date']) ? $_GET['date'] : null ?>" /></p>
    <input type="hidden" name="confirmed" value="1" />

    <button type = "submit" form = "booking">Book Appointment</button>
</form>
<?php endif?>

<?php if ((isset($_GET['confirmed'])) && (int)$_GET['confirmed'] === 1):?>
<h2 class="header title"> Booking Confirmed </h2>
<a href="visit.php"><button>Back</button></a>
<?php
    if (isset($_GET['username']) && isset($_GET['phone']) && isset($_GET['address']) && isset($_GET['date/time']))

    $username = (string)$_GET['username'];
    $phone = (string)$_GET['phone'];
    $address = (string)$_GET['address'];
    $date = (string)date('Y-m-d H:i:s', strtotime($_GET['date/time']));

    $bookingSql = "INSERT INTO `Visits` (`name`, `phone`, `address`, `date/time`) VALUES ('$username', '$phone', '$address', '$date')";
    if (!mysqli_query($connection, $bookingSql))
    {
        echo "Error: " . $bookingSql . "<br>" . mysqli_error($connection);
    }
?>
<?php endif?>
</body>
</html>