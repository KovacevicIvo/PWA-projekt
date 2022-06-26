<?php
    include 'connect.php';
    if($dbc){
        $query = "SELECT * FROM vijesti";
    }
    $result = mysqli_query($dbc, $query);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Administracija</title>
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
            while($row = mysqli_fetch_array($result)){
                $id = $row["id"];
                echo '
                    <form action="" method="post" enctype="multipart/form-data">
                        <br>
                        <label for="naslov">Naslov:</label><br>
                        <input type="text" name="naslov"  value="'.$row['naslov'].'"><br><br>

                        <label for="opis">Kratki sadržaj vijesti:</label><br>
                        <textarea name="opis" cols="50" rows="10" >'.$row['opis'].'</textarea><br><br>

                        <label for="sadrzaj">Sadržaj vijesti:</label><br>
                        <textarea name="sadrzaj" cols="50" rows="20" >'.$row['sadrzaj'].'</textarea><br><br>

                        <label for="kategorija">Odaberite kategoriju:</label><br>
                        <select name="kategorija">
                            <option value="" disabled selected>Kategorija</option>
                            <option value="Glazba">Glazba</option>
                            <option value="Sport">Sport</option>
                        </select><br><br>

                        <label for="slika">Odaberite sliku:</label>
                        <input type="file" name="slika" accept="image/*" value="'.$row['slika'].'"><br><br>

                        <input type="checkbox" name="prikaz">
                        <label for="prikaz">Prikaži na stranici</label><br><br>

                        <button type="reset" value="Poništi">Poništi</button>
                        <button type="submit" value="Update" name="update">Izmjeni</button>
                        <button type="submit" name="delete" value="Izbriši">Izbriši</button>
                        <input type="hidden" name="id" value="'.$row['id'].'">
                    </form>
                    <br><hr><br>';
            }
        ?>
        <?php
            if(isset($_POST['delete'])){
                $id = $_POST["id"];
                $query = "DELETE FROM vijesti WHERE id=$id ";
                $result = mysqli_query($dbc, $query);
            }
            if(isset($_POST["update"])){
                $id = $_POST["id"];
                $prikaz = 0;
                if(isset($_POST["prikaz"])){
                    $prikaz = 1;
                }
                $naslov = $_POST["naslov"];
                $opis = $_POST["opis"];
                $sadrzaj = $_POST["sadrzaj"];
                $kategorija = $_POST["kategorija"];
                $slika=$_FILES["slika"]["name"];
                $temp_direktorij = 'slike/' . $slika;
                move_uploaded_file($_FILES["slika"]["tmp_name"], $temp_direktorij);
                $kategorija = strtoupper($kategorija);
                $datum = date('Y-m-d');
                $query = "UPDATE vijesti SET Naslov='$naslov' ,opis='$opis',sadrzaj='$sadrzaj',slika='$slika',kategorija='$kategorija',datum='$datum',arhiva='$prikaz' WHERE id=$id";
                $result = mysqli_query($dbc, $query);
            }
            mysqli_close($dbc);
        ?>
        <footer>
            <p>Ivo Kovačević, 2022.</p>
            <p>ikovacevi@tvz.hr</p>
        </footer>
    </body>
</html>