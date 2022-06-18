<?php
    include 'connect.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registracija</title>
        <meta charset="UTF-8">
		<meta name="keywords" content="Projekt"/>
        <meta name="author" content="Ivo Kovačević">
        <meta name="description" content="0246095157">
        <link rel="stylesheet" href="style.css">
    </head>
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
    <body>
        <form class="login" method="POST">
            <h1>Registriracija</h1>
            <label for="title">Ime:</label><br>
            <input type="text" name="ime" id="ime" class="unos"><br>
            <span id="porukaIme" class="error"></span><br>

            <label for="title">Prezime:</label><br>
            <input type="text" name="prezime" id="prezime" class="unos"><br>
            <span id="porukaPrezime" class="error"></span><br>

            <label for="title">Korisničko ime:</label><br>
            <input type="text" name="username" id="username" class="unos"><br>
            <span id="porukaUsername" class="error"></span><br>

            <label for="title">Lozinka:</label><br>
            <input type="password" name="password" id="password" class="unos"><br>
            <span id="porukaPass" class="error"></span><br>

            <label for="title">Ponovite lozinku:</label><br>
            <input type="password" name="password1" id="password1" class="unos"><br>
            <span id="porukaPpass" class="error"></span><br>

            <button type="submit" value="registracija" id="registracija" name="registracija">Registrirajte se</button>
        </form>
        <?php
            if($dbc){
                if(isset($_POST["registracija"])){
                    $ime = $_POST['ime'];
                    $prezime = $_POST['prezime'];
                    $username = $_POST['username'];
                    $lozinka = $_POST['password'];
                    $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
                    $razina = 0;
                    $registriranKorisnik = 0;
                    $sql = "SELECT username FROM korisnik WHERE username = ?";
                    $stmt = mysqli_stmt_init($dbc);
                    if (mysqli_stmt_prepare($stmt, $sql)) {
                        mysqli_stmt_bind_param($stmt, 's', $username);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                    }
                    if(mysqli_stmt_num_rows($stmt) > 0){
                        echo 'Korisničko ime već postoji!';
                    }else{
                        $sql = "INSERT INTO korisnik (ime, prezime, username, pass, razina)VALUES (?, ?, ?, ?, ?)";
                        $stmt = mysqli_stmt_init($dbc);
                        if (mysqli_stmt_prepare($stmt, $sql)) {
                            mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina);
                            mysqli_stmt_execute($stmt);
                            $registriranKorisnik = 1;
                        }
                    }
                    if($registriranKorisnik == 1) {
                        echo '<form><p>Korisnik je uspješno registriran!</p></form>';
                        header("Location: login.php");
                        exit();
                    }
                }
            }
        ?>
        <script type="text/javascript">
            document.getElementById("registracija").onclick = function(event) {
            
                var slanjeForme = true;
                
                var poljeIme = document.getElementById("ime");
                var ime = document.getElementById("ime").value;
                if (ime.length == 0) {
                    slanjeForme = false;
                    poljeIme.style.border="1px dashed red";
                    document.getElementById("porukaIme").innerHTML="<br>Unesite ime!<br>";
                } else {
                    poljeIme.style.border="1px solid green";
                    document.getElementById("porukaIme").innerHTML="";
                }

                var poljePrezime = document.getElementById("prezime");
                var prezime = document.getElementById("prezime").value;
                if (prezime.length == 0) {
                    slanjeForme = false;
                    poljePrezime.style.border="1px dashed red";
                    document.getElementById("porukaPrezime").innerHTML="<br>Unesite Prezime!<br>";
                } else {
                    poljePrezime.style.border="1px solid green";
                    document.getElementById("porukaPrezime").innerHTML="";
                }
                
                var poljeUsername = document.getElementById("username");
                var username = document.getElementById("username").value;
                if (username.length == 0) {
                    slanjeForme = false;
                    poljeUsername.style.border="1px dashed red";
                    document.getElementById("porukaUsername").innerHTML="<br>Unesite korisničko ime!<br>";
                } else {
                    poljeUsername.style.border="1px solid green";
                    document.getElementById("porukaUsername").innerHTML="";
                }
                
                var poljePass = document.getElementById("password");
                var pass = document.getElementById("password").value;
                var poljePassRep = document.getElementById("password1");
                var passRep = document.getElementById("password1").value;
                if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
                    slanjeForme = false;
                    poljePass.style.border="1px dashed red";
                    poljePassRep.style.border="1px dashed red";
                    document.getElementById("porukaPass").innerHTML="";
                    document.getElementById("porukaPpass").innerHTML="<br>Lozinke nisu iste!<br>";
                } else {
                    poljePass.style.border="1px solid green";
                    poljePassRep.style.border="1px solid green";
                    document.getElementById("porukaPass").innerHTML="";
                    document.getElementById("porukaPpass").innerHTML="";
                }

                if (slanjeForme != true) {
                    event.preventDefault();
                }
            };
        </script>
        <footer class="zaglavlje">
            <p>Ivo Kovačević, 2022.</p>
            <p>ikovacevi@tvz.hr</p>
        </footer>
    </body>
</html>