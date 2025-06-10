<?php
    include './Api/auth.php';
    if (!checkAuth()) {
        header('Location: login.php');
        exit;
    }
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="profilo.css">
    <script src="profilo.js" defer></script>
</head>
<body>
    <div id='main'>
        <div id='header'>
            <div id='img-title'>
                <img class='logo' src="./Images/LogoTasteLab2.png">
                <h1 id='titolo'>TasteLab</h1>
            </div>
            <div id='links'>
                <button id='bottonePreferiti' class='head-link'>PREFERITI</button>
                <a  class='head-link' href='ricette.php'>RICETTE</a>
                <a  class='head-link' href='home.php'> HOME </a>
                <a  id='logout' href='logout.php'>LOGOUT</a>
            </div>
        </div>

        <div id='welcome'>
            <h1>Ciao <?php echo $_SESSION['username'] ?>, benvenuto. </h1>
        </div>

        <div id='preferiti'>

        </div>
    </div>
</body>
</html>




