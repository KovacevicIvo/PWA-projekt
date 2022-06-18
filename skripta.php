<?php
    $spremi = 0;
    if(isset($_POST["spremi"])){
        $spremi = 1;
    }
    if(isset($_POST["posalji"])){
        $naslov = $_POST["naslov"];
        $opis = $_POST["opis"];
        $sadrzaj = $_POST["sadrzaj"];
        $kategorija = $_POST["kategorija"];
        $slika = $_POST["slika"];
        $kategorija = strtoupper($kategorija);
        $datum = date('Y-m-d');
    }
    include 'connect.php';
    if($dbc){
        $query = "INSERT INTO vijesti (naslov,opis,sadrzaj,slika,kategorija,datum,arhiva) VALUES ('$naslov','$opis','$sadrzaj','$slika','$kategorija','$datum','$spremi');";
        $result = mysqli_query($dbc, $query);
    }
    mysqli_close($dbc);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Članak</title>
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
            <section>
                <?php
                    echo "<img src='slike/$slika'>";
                ?>
                <h1>
                    <?php
                        echo $naslov;
                    ?>
                </h1>
                <p class="datum">
                    <?php
                        echo $datum;
                    ?>
                </p>
                <p">
                    <?php
                        echo $opis;
                    ?>
                </p>
                <p>
                    <?php
                        echo $sadrzaj;
                    ?>
                </p>
            </section>
        <footer>
            <p>Ivo Kovačević, 2022.</p>
            <p>ikovacevi@tvz.hr</p>
        </footer>
    </body>
</html>