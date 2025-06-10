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
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>My Website</title>
    <link rel="stylesheet" href="home.css">
    <script src="home.js" defer> </script> 
    <script src="index.js" defer> </script>
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

    <div id="text" >
        <h1 id="titolo">TasteLab </h1>
        <h3 id="sottotitolo">Laboratorio di sapori e Ricette combinabili</h3>
    </div>

    <div id='main'>
        <form id="search-form" method="post" action="home.php">
            <input type="text" name="q" id="search-bar" placeholder="Cerca ricette o ingredienti..." autocomplete="off">
            <button id='search-button' type="submit">Cerca</button>
        </form>

        <div id='info-container'>

        </div>
    </div>

    <footer>
      <nav>
        <div class="footer-container">
          <div class="footer-col">
            <strong>AZIENDA</strong>
            <p>Chi siamo</p>
            <p>Lavora con noi</p>
          </div>
          <div class="footer-col">
            <strong>CATEGORIE</strong>
            <p>Ingredienti</p>
            <p>Ricette</p>
            <p>Specialità</p>
          </div>
          <div class="footer-col">
            <strong>LINK UTILI</strong>
            <p>Assistenza</p>
            <p>App per cellulare</p>
            <p>Informazioni legali</p>
          </div>
        </div>
      </nav>
    </footer>



    

</body>


</html>




