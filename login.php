<DOCTYPE html>
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
            <a href = "visit.php">Visit Us</a>
            <a class = "active" href = "login.php">Admin</a>
        </ul>
    </div>

    <form id ="form" action="admin.php">
        <input class ="input-field" type ="password" name ="password" placeholder ="Password" required/>
    </form>
    <div class = "button">
        <button type = "submit" form = "form"> Log In </button>
    </div>

    <?php
    if (isset($_GET['password']) && $_GET['password'] === "letMEin2020")
    {
        header("Location: ./admin.php");
    }
    ?>
    </body>
    </html>

