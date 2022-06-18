<?php
    $kategorija=$_GET["id"];
    include 'connect.php';
    $query = "SELECT * FROM vijesti WHERE kategorija='". $kategorija ."' ORDER BY datum DESC";
    $result = mysqli_query($dbc, $query);
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $kategorija?></title>
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
        <section class="podnaslov">
            <h2 class="<?php echo $kategorija ?>"><?php echo $kategorija?></h2>
        </section>
        <?php
            define('UPLPATH', 'slike/');
            $i=0;
            while($row = mysqli_fetch_array($result)){
                if($i%3 == 0){
                    $query = "SELECT * FROM vijesti WHERE kategorija='". $kategorija ."' ORDER BY datum DESC LIMIT ".$i.",3";
                    $result1 = mysqli_query($dbc, $query);
                    echo ' <section class="vijesti">';
                    while($row = mysqli_fetch_array($result1)) {
                        $id = $row["id"];
                        echo '<article class="artikl1">';
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
                        $i++;   
                    } 
                }
                echo ' </section>';
            }
        ?>
        <footer>
            <p>Ivo Kovačević, 2022.</p>
            <p>ikovacevi@tvz.hr</p>
        </footer>
    </body>
</html>