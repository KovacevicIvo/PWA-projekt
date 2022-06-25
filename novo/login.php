<?php
    include 'connect.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
		<meta name="keywords" content="Projekt"/>
        <meta name="author" content="Ivo Kovačević">
        <meta name="description" content="0246095157">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header> 
            <img src="slike/sopitas.png" alt="" class="logo">  
            <nav>
                <div><a href="index.php">POČETNA</a></div>
                <div><a href="kategorija.php?id=Glazba">GLAZBA</a></div>
                <div><a href="kategorija.php?id=Sport">SPORT</a></div>
                <div><a href="login.php">ADMINISTRACIJA</a></div>
                <div><a href="unos.php">UNOS</a></div>
            </nav>
        </header>
        <form class="login" method="POST">
            <h1>Prijava</h1>
            <label for="username">Korisničko ime</label><br>

            <input name="username" type="text" required class="unos"/><br>
            <label for="pass">Lozinka</label><br>

            <input name="pass" type="password" required class="unos"/><br><br>
            <button type="submit" value="prijava" id="prijava" name="prijava">Prijavite se</button>
        </form>
        <?php
            session_start();
            if($dbc){
                if (isset($_POST['prijava'])) {
                    if (isset($_POST['prijava'])) {
                        $user = $_POST["username"];
                        $pass = $_POST["pass"];
                        $query = "SELECT username, pass, razina FROM korisnik WHERE username = ?;";
                        $stmt = mysqli_stmt_init($dbc);
                        if (mysqli_stmt_prepare($stmt, $query)) {
                            mysqli_stmt_bind_param($stmt, 's', $user);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);
                            mysqli_stmt_bind_result($stmt, $username, $hash,$lvl);
                            mysqli_stmt_fetch($stmt);
                            if (password_verify($pass,$hash) && mysqli_stmt_num_rows($stmt) > 0) {
                                if($lvl == 1) {
                                    header("Location: administracija.php");
                                    exit();
                                }
                                else {
                                    echo "<form><p>$username, nemate dovoljna prava za pristup ovoj stranici.</p></form>";
                                }
                            } else {
                                echo '<form>Ne postoji korisnik s unesenim podatcima</form><br>';
                            }
                            mysqli_stmt_close($stmt);
                        }
                    }
                }
            }
            echo '<form><a href="registracija.php">Registrirajte se</a></form>';
        ?>
        <footer class="zaglavlje">
            <p>Ivo Kovačević, 2022.</p>
            <p>ikovacevi@tvz.hr</p>
        </footer>
    </body>
</html>
