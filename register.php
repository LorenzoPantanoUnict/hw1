<?php
    include './Api/auth.php';
    if (checkAuth()) {
        header('Location: home.php');
        exit;
    }
    if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password-confirm'])){
        $error = array();
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        if (!$conn) {
            die('Connection failed: ' . mysqli_connect_error());
        }
        #USERNAME
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $query = "SELECT Username FROM Utente WHERE username = '$username'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $error[] = "Username già utilizzato";
        }
        #PASSWORD
        if (strlen($_POST["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        } 
        #PASSWORD-CONFIRM
        if (strcmp($_POST["password"], $_POST["password-confirm"]) != 0) {
            $error[] = "Le password non coincidono";
        }
        # EMAIL
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $res = mysqli_query($conn, "SELECT email FROM Utente WHERE email = '$email'");
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Email già utilizzata";
            }
        }
        # REGISTRAZIONE NEL DATABASE
        if (count($error) == 0) {            

            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO Utente(Username, Password, email) VALUES('$username', '$password', '$email')";
            
            if (mysqli_query($conn, $query)) {
                $_SESSION["username"] = $_POST["username"];
                mysqli_close($conn);
                header("Location: home.php");
                exit;
            } else {
                $error[] = "Errore di connessione al Database";
            }
        }
        mysqli_close($conn);
    }else if (isset($_POST["username"])) {
        $error = array("Riempi tutti i campi");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="register.css">
    <script src="register.js" defer></script>
</head>
<body>
    <div id='main'>
        <h1 id='titolo'>Tastelab</h1>
        <h3 id='sotto-titolo'>Per continuare iscriviti</h3>
        <form id='register-form' action="register.php" method="post">
            <div class='username'>
                <label class='label' for="username">Nome Utente</label><br>
                <input type="text" id="username" name="username" <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>>
            </div>
            <div class='email'>
                <label class='label'  for="email">Email</label><br>
                <input type="email" id="email" name="email" <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>>
            </div>
            <div class='password'>
                <label class='label'  for="password">Password</label><br>
                <input type="password" id="password" name="password" <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
            </div>
            <div class='confirm_password'>
                <label class='label'  for="password-confirm">Conferma Password</label><br>
                <input type="password" id="password-confirm" name="password-confirm" <?php if(isset($_POST["password-confirm"])){echo "value=".$_POST["password-confirm"];} ?>>
            </div>
            <div class='submit'>
                <input id='submit' type="submit" value="Register">
            </div>
            <?php if(isset($error)) {
                    foreach($error as $err) {
                        echo "<div class='errorj'><span>".$err."</span></div>";
                    }
                  } ?>
        </form>
        <div id="login">
            <p class='signup'>Hai già un account? <a id='login-link' href="login.php">ACCEDI</a></p>
        </div>
    </div>
</body>
</html>