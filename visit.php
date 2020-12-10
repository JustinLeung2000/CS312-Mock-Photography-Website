<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" type="text/css" href ="navbar.css"/>
    <link rel = "stylesheet" type = "text/css" href = "forms.css"/>

    <title>Cara's Photography</title>
</head>
<style> body { background-image: url("img/mountainbg.jpg");
        background-size:cover;
        background-repeat: no-repeat;
        }
</style>
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



<?php
if (!isset($_GET['confirmed'])):?>
<form id="visit" action="./visit.php">
    <h1> Track and Trace Form</h1>

    <div class ="forminput">
        <div class = "visitText">
            <p> Having moved to Glasgow recently, I have opened an exhibit for anyone to come visit my work in person. There you will see my work in higher quality and some works that I have not yet uploaded</p>
            <p style = "color:red"> NOTE: Due to Covid-19 protocol, only limited visitors are allowed and track and trace information will be needed for those who wish to visit</p>
        </div>
        <input class="input-field" type="text" name="visitorname" placeholder="Name" pattern = "[a-zA-Z\s]+" required value="<?php echo isset($_GET['visitorname']) ? $_GET['visitorname'] : null ?>" />
        <input class="input-field" type="number" name="phone" placeholder="Phone number (11 Digits long)" required pattern=".{11}" value="<?php echo isset($_GET['phone']) ? $_GET['phone'] : null ?>" />
        <input class="input-field" type="text" name="address" placeholder="Postal Address" required value="<?php echo isset($_GET['address']) ? $_GET['address'] : null ?>" />
        <input class="input-field" type="datetime-local" name="date/time" placeholder="Date and Time" required value="<?php echo isset($_GET['date/time']) ? $_GET['date/time'] : null ?>" />
    </div>
    <input type="hidden" name="confirmed" value="1" />

    <div class ="submit">
        <button type = "submit" form = "visit">Book Visit</button>
    </div>
</form>

<?php endif?>

<?php if ((isset($_GET['confirmed'])) && (int)$_GET['confirmed'] === 1):?>
<form>
<h2 class="header title"> Visit Confirmed </h2>
    <div class ="submit">
<a href="visit.php"><button>Back</button></a>
    </div>
</form>
<?php
if (isset($_GET['visitorname']) && isset($_GET['phone']) && isset($_GET['address']) && isset($_GET['date/time']))

$visitorname = (string)$_GET['visitorname'];
$phone = (string)$_GET['phone'];
$address = (string)$_GET['address'];
$date = (string)date('Y-m-d H:i:s', strtotime($_GET['date/time']));

$addBooking = "INSERT INTO `Visits` (`name`,`phone`,`address`,`date/time`) VALUES ('$visitorname','$phone','$address','$date')";
if (!mysqli_query($connection, $addBooking))
{
echo "Error: " . $addBooking . "<br>" . mysqli_error($connection);
}
?>

<?php endif?>

</body>
</html>