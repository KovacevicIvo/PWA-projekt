<?php
    $id=$_GET["id"];
    include 'connect.php';
    if($dbc){
        $query = "SELECT * FROM vijesti WHERE id = '$id'";
    }
    $result = mysqli_query($dbc, $query);
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
        <?php
            define('UPLPATH', 'slike/');
            while($row = mysqli_fetch_array($result)) {  
                echo '    <section>';
                echo '        <img src="' . UPLPATH . $row['slika'] . '">';
                echo '        <h1>';
                echo              $row["naslov"];
                echo '        </h1>';
                echo '        <p class="datum">';
                echo              $row['datum'];
                echo '        </p>';
                echo '        <p>';
                echo              $row["opis"];
                echo '        </p>';
                echo '        <p>';
                echo              $row["sadrzaj"];
                echo '        </p>';
                echo '    </section>';
            }
        ?>
        <footer>
            <p>Ivo Kovačević, 2022.</p>
            <p>ikovacevi@tvz.hr</p>
        </footer>
    </body>
</html>