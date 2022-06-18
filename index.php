<?php
    include 'connect.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Početna</title>
        <meta charset="UTF-8">
		<meta name="keywords" content="Projekt"/>
        <meta name="author" content="Ivo Kovačević">
        <meta name="description" content="0246095157">
        <script src="https://kit.fontawesome.com/b05e340512.js" crossorigin="anonymous"></script>
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
            <h2 class="Glazba">Glazba</h2>
        </section>
        <section class="vijesti">
            <?php
                define('UPLPATH', 'slike/');
                if($dbc){
                    $query = "SELECT * FROM vijesti WHERE arhiva=1 AND kategorija='Glazba' ORDER BY Datum DESC LIMIT 3";
                }
                $result = mysqli_query($dbc, $query);
                while($row = mysqli_fetch_array($result)){
                    $id = $row["id"];
                    echo '<article>';
                    echo '  <a href="clanak.php?id=' . $id . '">';
                    echo '      <div class="slika">';
                    echo '          <img src="' . UPLPATH . $row['slika'] . '">';
                    echo '      </div>';
                    echo '      <h3>';
                    echo            $row['naslov'];
                    echo '      </h3>';
                    echo '      <p>';
                    echo            $row['opis'];
                    echo '      </p>';
                    echo '      <p class="datum">';
                    echo            $row['datum'];
                    echo '      </p>';
                    echo '  </a>';
                    echo '</article>';
                }
            ?>
        </section>
        <section>
            <h2 class="Sport">Sport</h2>
        </section>
        <section class="vijesti">
            <?php
                if($dbc){
                    $query = "SELECT * FROM vijesti WHERE arhiva=1 AND kategorija='Sport' ORDER BY datum DESC LIMIT 3";
                }
                $result = mysqli_query($dbc, $query);
                while($row = mysqli_fetch_array($result)) {
                $id = $row["id"];
                echo '<article>';
                echo '  <a href="clanak.php?id=' . $id . '">';
                echo '      <img src="' . UPLPATH . $row['slika'] . '">';
                echo '      <h3>';
                echo            $row['naslov'];
                echo '      </h3>';
                echo '      <p>';
                echo            $row['opis'];
                echo '      </p>';
                echo '      <p class="datum">';
                echo            $row['datum'];
                echo '      </p> ';
                echo '  </a>';
                echo '</article>';
                }
            ?>
        </section>
        <footer>
            <p>Ivo Kovačević, 2022.</p>
            <p>ikovacevi@tvz.hr</p>
        </footer>
    </body>
</html>
