<?php
include 'connect.php';
define('UPLPATH', 'img/');
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="stil.css" />
    <title>clanak</title>
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
        <?php
                $query = "SELECT * FROM vijesti WHERE arhiva=0 AND id='".$id."' LIMIT 1";
                $result = mysqli_query($dbc, $query);
                $i=0;
                while($row = mysqli_fetch_array($result)) {
                    echo '<h1 class="center">'.$row['naslov'].'</h1>';
                    echo '<br>';
                    echo '<h5 class="center">'.$row['sazetak'].'</h5>';
                    echo '<br>';
                    echo '<h7 class="center">'.$row['datum'].'</h7>';
                    echo '<br>';
                    echo '<img class="center" src="' . UPLPATH . $row['slika'] . '" alt="">';
                    echo '<br>';
                    echo '<p class="usko">'.$row['tekst'].'<p>';
                    echo '<br>';
                }
        ?>
    </main>

<footer>
    <p>Luka Savić, lsavic1@tvz.hr, 2022.</p>
</footer>
</body>

</html>