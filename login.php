<DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" type="text/css" href ="navbar.css"/>
        <link rel = "stylesheet" type = "text/css" href = "forms.css"/>
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
    <form id="login" action="./admin.php">
        <div class = "admin">
            <h1>Admin Login</h1>
        </div>
    <form id ="form" action="admin.php">
        <div class ="forminput">
        <input class ="input-field" type ="password" name ="password" placeholder = "Password" required/>
        </div>

    <div class = "submit">
        <button type = "submit" form = "form"> Log In </button>
    </div>
    </form>
    <?php
    if (isset($_GET['password']) && $_GET['password'] === "letMEin2020")
    {
        header("Location: ./admin.php");}

    if (isset($_GET['password'])){
        echo "<p>Incorrect Password</p>";
    }
    ?>
    </body>
    </html>

