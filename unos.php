<?php
    include 'connect.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Unos</title>
        <meta charset="UTF-8">
		<meta name="keywords" content="Projekt"/>
        <meta name="author" content="Ivo Kovačević">
        <meta name="description" content="0246095157">
        <link rel="stylesheet" type="text/css"  href="style.css">
        <script type="text/javascript" src="jquery-1.11.0.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        <script src="js/form-validation.js"></script> 
        <meta charset="UTF-8">
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
        <form name="unos" method="POST" action="skripta.php">
            <br>
            <label for="naslov">Naslov:</label><br>
            <input  type="text" name="naslov" id="naslov"><br>
            <span id="porukaNaslov" class="error"></span><br>

            <label for="opis">Kratki sadržaj vijesti:</label><br>
            <textarea name="opis" id="opis" cols="50" rows="10"></textarea><br>
            <span id="porukaOpis" class="error"></span><br>

            <label for="sadrzaj">Sadržaj vijesti: </label><br>
            <textarea name="sadrzaj" id="sadrzaj" cols="50" rows="20"></textarea><br>
            <span id="porukaSadrzaj" class="error"></span><br>

            <label for="kategorija">Odaberite kategoriju:</label><br>
            <select name="kategorija" id="kategorija">
                <option value="" disabled selected>Kategorija</option>
                <option value="Glazba">Glazba</option>
                <option value="Sport">Sport</option>
            </select><br>
            <span id="porukaKategorija" class="error"></span><br>

            <label for="slika">Odaberite sliku:</label>
            <input type="file" name="slika" id="slika" accept="image/*"><br>
            <span id="porukaSlika" class="error"></span><br>

            <input type="checkbox" name="spremi" id="spremi" value="spremi">
            <label for="spremi">Prikaži na stranici</label><br><br>
            
            <input type="reset" name="reset" id="reset" value="Poništi" />
            <input type="submit" name="posalji" id="posalji" value="Posalji" />
        </form>
        <script type="text/javascript">
            document.getElementById("posalji").onclick = function(event) {
                var slanjeForme = true;
                
                var poljeNaslov = document.getElementById("naslov");
                var title = document.getElementById("naslov").value;
                if (title.length < 5 || title.length > 30) {
                    slanjeForme = false;
                    poljeNaslov.style.border="1px solid red";
                    document.getElementById("porukaNaslov").innerHTML="Naslov vjesti mora imati između 5 i 30 znakova<br>";
                }
                
                var poljeOpis = document.getElementById("opis");
                var opis = document.getElementById("opis").value;
                if (opis.length < 10 || opis.length > 100) {
                    slanjeForme = false;
                    poljeOpis.style.border="1px solid red";
                    document.getElementById("porukaOpis").innerHTML="Kratki sadržaj vijesti mora imati između 10 i 100 znakova<br>";
                }
                
                var poljeSadrzaj = document.getElementById("sadrzaj");
                var sadrzaj = document.getElementById("sadrzaj").value;
                if (sadrzaj.length == 0) {
                    slanjeForme = false;
                    poljeSadrzaj.style.border="1px solid red";
                    document.getElementById("porukaSadrzaj").innerHTML="Tekst vijesti ne smije biti prazan<br>";
                }

                var poljeKategorija = document.getElementById("kategorija");
                if(poljeKategorija.selectedIndex == 0) {
                    slanjeForme = false;
                    poljeKategorija.style.border="1px solid red";
                    document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana<br>";
                }

                var poljeSlika = document.getElementById("slika");
                var slika = document.getElementById("slika").value;
                if (slika.length == 0) {
                    slanjeForme = false;
                    poljeSlika.style.border="1px solid red";
                    document.getElementById("porukaSlika").innerHTML="Slika mora biti odabrana<br>";
                }

                if (slanjeForme == false) {
                    event.preventDefault();
                }
            }
        </script>
        <footer>
            <p>Ivo Kovačević, 2022.</p>
            <p>ikovacevi@tvz.hr</p>
        </footer>
    </body>
</html>