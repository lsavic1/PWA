<?php
error_reporting(E_ERROR | E_PARSE);
include 'connect.php';
$picture = $_FILES['slika']['name'];
$title=$_POST['naslov'];
$about=$_POST['sazetak'];
$content=$_POST['tekst'];
$category=$_POST['kategorija'];
$date=date('d.m.Y.');
if(isset($_POST['arhiva'])){
$archive=1;
}else{
$archive=0;
}
$target_dir = 'img/'.$picture;
move_uploaded_file($_FILES["slika"]["tmp_name"], $target_dir);
$query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija,
arhiva ) VALUES ('$date', '$title', '$about', '$content', '$picture',
'$category', '$archive')";
if(isset($_POST['submit'])){
$result = mysqli_query($dbc, $query) or die('Error querying databese.');}
mysqli_close($dbc);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="stil.css" />
    <title>unos</title>
</head>

<body>
    <header>
        <img src="img/debate.png" alt="" />
        <br>
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="kategorija.php?id=svijet">SVIJET</a></li>
            <li><a href="kategorija.php?id=sport">SPORT</li>
            <li><a href="administracija2.php">ADMINISTRACIJA</a></li>
            <li><a href="unos.php">UNOS</a></li>
        </ul>
    </header>

    <main>
        <form enctype="multipart/form-data" method="POST">
            <label>Naslov vijesti</label>
            <br>
            <input type="text" name="naslov" id="naslov">
            <br>
            <span id="porukaNaslov"></span>
            <br>

            <label>Kratki sadržaj vijesti (do 100 znakova)</label>
            <br>
            <textarea name="sazetak" id="sazetak"></textarea>
            <br>
            <span id="porukaSazetak"></span>
            <br>

            <label>Sadržaj vijesti</label>
            <br>
            <textarea name="tekst" id="tekst"></textarea>
            <br>
            <span id="porukaTekst"></span>
            <br>

            <label>Slika</label>
            <br>
            <input type="file" accept="image/jpg,image/png,image/gif" name="slika" id="slika">
            <br>
            <span id="porukaSlika"></span>
            <br>

            <label>Kategorija vijesti</label>
            <br>
            <select name="kategorija">
                <option value="Svijet">Svijet</option>
                <option value="Sport">Sport</option>
                <option value="Biznis">Biznis</option>
                <option value="Kultura">Kultura</option>
            </select>
            <br><br>

            <label>Spremiti u arhivu</label>
            <br>
            <input type="checkbox" name="arhiva">
            <br><br>

            <input type="submit" name="submit" value="Pošalji" id="submit">
        </form>
    </main>

    <script type="text/javascript">
        document.getElementById("submit").onclick = function(event){
            var slanjeforme=true;

            var poljeNaslov=document.getElementById("naslov");
            if(poljeNaslov.value.length < 5 || poljeNaslov.value.length > 30){
                slanjeforme=false;
                poljeNaslov.style.border="1px dashed red";
                document.getElementById("porukaNaslov").innerHTML="Naslov vijesti mora imati između 5 i 30 znakova!<br>";
            }

            var poljeSazetak = document.getElementById("sazetak");
            if(poljeSazetak.value.length < 10 || poljeSazetak.value.length > 100){
                slanjeforme=false;
                poljeSazetak.style.border="1px dashed red";
                document.getElementById("porukaSazetak").innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova!<br>";
            }

            var poljeTekst = document.getElementById("tekst");
            if(poljeTekst.value.length==0){
                slanjeforme=false;
                poljeTekst.style.border="1px dashed red";
                document.getElementById("porukaTekst").innerHTML="Sadržaj mora biti unesen!<br>";
            }

            var poljeSlika = document.getElementById("slika");
            if(poljeSlika.value.length==0){
                slanjeForme = false;
                poljeSlika.style.border="1px dashed red";
                document.getElementById("porukaSlika").innerHTML="Slika mora biti unesena!<br>";
            }

            if(slanjeforme!=true){
                event.preventDefault();
            }
        };
    </script>

    <footer>
        <p>Luka Savić, lsavic1@tvz.hr, 2022.</p>
    </footer>
</body>

</html>