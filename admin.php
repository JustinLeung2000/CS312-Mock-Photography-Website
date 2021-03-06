<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" type="text/css" href ="navbar.css"/>
    <link rel = "stylesheet" type = "text/css" href = "forms.css"/>
    <link rel = "stylesheet" type="text/css" href ="table.css"/>
    <title>Cara's Photography</title>
</head>

<style> body { background-image: url("img/lochbg.jpg");
        background-size:cover;
        background-repeat: no-repeat;
    }
</style>

<body>
<div class = "navigationBar">
    <ul>
        <a href = "index.html">Home</a>
        <a href = "gallery.php">Gallery</a>
        <a href = "visit.php">Visit Us</a>
        <a class = "active" href = "login.php">Admin</a>
    </ul>
</div>

<?php
$host = "devweb2020.cis.strath.ac.uk";
$username = "gwb18170";
$password = "Voom3AhngaiM";
$connection = new mysqli($host,$username,$password,$username);

$ordersSql = "SELECT * FROM `Orders`";
$orders = $connection->query($ordersSql);

$visitsSql = "SELECT * FROM `Visits`";
$visits = $connection->query($visitsSql)
?>

<form>
    <h1> Orders: </h1>
<?php if ((int)$orders->num_rows > 0): ?>
<table>
    <thead>
        <tr>
            <th> Order Id </th>
            <th> Name </th>
            <th> Email </th>
            <th> Phone </th>
            <th> Address </th>
            <th> Photo Id </th>
            <th> Photo Name</th>
        </tr>
    </thead>

    <tbody>
    <?php while($row = mysqli_fetch_assoc($orders)): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['phone'];?></td>
        <td><?php echo $row['address'];?></td>
        <td><?php echo $row['photo_id'];?></td>
        <td><?php echo $row['photo_name'];?></td>
    </tr>
    <?php endwhile?>
    </tbody>
</table>
<?php endif;

if ((int)$orders->num_rows === 0): ?>
<h2> There are no pending orders</h2>
<?php endif;?>
</form>
<form>
    <h1> Appointments: </h1>
<?php if ((int)$visits->num_rows > 0): ?>
    <table>
        <thead>
        <tr>
            <th> Visit Id </th>
            <th> Name </th>
            <th> Phone </th>
            <th> Address </th>
            <th> Date and Time</ th>

        </tr>
        </thead>

        <tbody>
        <?php while($row = mysqli_fetch_assoc($visits)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><?php echo $row['address'];?></td>
                <td><?php echo $row['date/time'];?></td>
            </tr>
        <?php endwhile?>
        </tbody>
    </table>
<?php endif;

if ((int)$visits->num_rows === 0): ?>
    <h2> There are no appointments</h2>
<?php endif;?>
</form>
<div class = "buttontwo">
    <a href="login.php"><button>Log Out</button></a>
</div>
</form>

</body>
</html>