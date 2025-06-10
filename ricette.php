<?php
    include './Api/auth.php';
    if (!checkAuth()) {
        header('Location: login.php');
        exit;
    }
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    if(!$conn){
        die("Errore di connessione al database: " . mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ricette</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="ricette.js" defer></script>
    <script src="index.js" defer></script>
    <link rel="stylesheet" href="ricette.css">
</head>
<body>
    <nav id="nav">
        <div class="navbox">
            <img class='logo' src="./Images/LogoTasteLab2.png">
        </div>
        <div class="navbox">
            <a href="home.php" class="navlink">Home</a>
        </div>
        <div class="navbox">
            <a href="ricette.php" class="navlink">Ricette</a>
        </div>
        <div class="navbox">
            <a href="index.php" class="navlink">Info</a>
        </div>
        <div class="navbox">
            <a href="index.php" class="navlink">Supporto</a>
        </div>
        <div class="navbox">
            <a href="profilo.php" class="navlink">Profilo</a>
        </div>
        <div class="navbox">
            <a href='logout.php' class="navlink">Log out </a>
        </div>
        <div class="navbox">
            <img class='logo' src="./Images/LogoTasteLab2.png">
        </div>
    </nav>

    <div id='main'>
        <header>
            <h1><?php echo $_SESSION['username']?>, scegli i tuoi piatti preferiti</h1>
        </header>
        <main id='content'>
            <div id='container'>

            </div>
            <div id='choose'>
                <button id="like">Like</button>
                <button id="dislike">Nope</button>
            </div>
        </main>
    </div>
</body>
</html>