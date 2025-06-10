<?php
    include './Api/auth.php';
    if (checkAuth()) {
        header('Location: home.php');
        exit;
    }

    if(!empty($_POST["user_name"]) && !empty($_POST["user_password"]) )
    {
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        if (!$conn) {
            die('Connection failed: ' . mysqli_connect_error());
        }

        $nome_utente = mysqli_real_escape_string($conn, $_POST['user_name']);
        $password = mysqli_real_escape_string($conn, $_POST['user_password']);

        
        $query = "SELECT * FROM Utente WHERE Username = '".$nome_utente."'";
       
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        while($row = mysqli_fetch_assoc($res)){
            if(password_verify($password, $row['Password']) ){
                $_SESSION['username'] = $_POST['user_name'];
                $_SESSION['password'] = $_POST['user_password'];
                echo "<h1> Benvenuto $nome_utente </h1>";
                header("Location: home.php");
                mysqli_free_result($res);  
                mysqli_close($conn);
                exit;
            }
        }
        $error = "Nome utente e/o password errati.";
    }else if (isset($_POST["user_name"]) || isset($_POST["user_password"])) {
        // Se solo uno dei due è impostato
        $error = "Inserisci username e password.";
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Website</title>
    <link rel="stylesheet" href="login.css">
    <script src="login.js" defer> </script> 
</head>

<body>
    <h1 id="titolo">TasteLab</h1>
    <h3 id="sottotitolo">Per continuare, accedi a TasteLab.</h3>
    <?php 
        if(isset($error)) {
            echo "<p class='error'>$error</p>";
        }
    ?>
    <section id='main'>
    <form id="myForm" name='login' action="login.php" method="post">
        <div class="username">
            <label class=label for='user_name'>Nome Utente</label>
            <input class="input" type="text" id="textInput" name="user_name" <?php if(isset($_POST["user_name"])){echo "value=".$_POST["user_name"];} ?>>
        </div>
        <div class="password">
            <label class='label' for='user_password'>Password</label>
            <input class="input" type="password" id="passwordInput" name="user_password" <?php if(isset($_POST["user_password"])){echo "value=".$_POST["user_password"];} ?>> 
        </div>
        <button id="submit" type="submit">ACCEDI</button>
    </form>
        <div id="register">
            <p >Non hai un account? <a id='register-link' href="register.php">ISCRIVITI</a></p>
        </div>
    </section>

</body>

</html>

   