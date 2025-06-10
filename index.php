<?php
    session_start();    
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>My Website</title>
    <link rel="stylesheet" href="./index.css">
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
            <a href='register.php' class="navlink">Registrati </a>
        </div>
        <div class="navbox">
            <a href='login.php' class="navlink">Accedi </a>
        </div>
        <div class="navbox">
            <img class='logo' src="./Images/LogoTasteLab2.png">
        </div>


    </nav>

    <div id="text" >
        <h1 id="titolo">TasteLab </h1>

        <h3 id="sottotitolo">Laboratorio di sapori e Ricette combinabili</h3>

        <h3 id="descrizione"> Scopri come combinare i tuoi ingredienti preferiti per creare ricette uniche e deliziose. </h2>
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


<?php
    
?>
   