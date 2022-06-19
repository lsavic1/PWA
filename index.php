<?php
include 'connect.php';
define('UPLPATH', 'img/');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="stil.css" />
    <title>index</title>
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
        <ul>
            <li><img src="img/bullet.png" alt="" />
                <h2>SVIJET</h2>
            </li>
        </ul>
        <br>
        <div class="sredina">
            <?php
                $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='svijet' LIMIT 4";
                $result = mysqli_query($dbc, $query);
                $i=0;
                while($row = mysqli_fetch_array($result)) {
                    echo '<a href="clanak.php?id='.$row['id'].'">';
                    echo '<article>';
                    echo '<img src="' . UPLPATH . $row['slika'] . '" alt="">';
                    echo '<h5>'.$row['naslov'].'</h5>';
                    echo '<h3>'.$row['sazetak'].'</h3>';
                    echo '<h7>'.$row['datum'].'</h7>';
                    echo '</article>';
                    echo '</a>';
                }
            ?>
        </div>
        <br>
        <hr><br>
        <ul>
            <li><img src="img/bullet.png" alt="" />
                <h2>SPORT</h2>
            </li>
        </ul>
        <br>
        <div class="sredina">
        <?php
                $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='sport' LIMIT 4";
                $result = mysqli_query($dbc, $query);
                $i=0;
                while($row = mysqli_fetch_array($result)) {
                    echo '<a href="clanak.php?id='.$row['id'].'">';
                    echo '<article>';
                    echo '<img src="' . UPLPATH . $row['slika'] . '" alt="">';
                    echo '<h5>'.$row['naslov'].'</h5>';
                    echo '<h3>'.$row['sazetak'].'</h3>';
                    echo '<h7>'.$row['datum'].'</h7>';
                    echo '</article>';
                    echo '</a>';
                }
            ?>
        </div>
        <br>
        <hr>
    </main>

    <footer>
        <p>Luka Savić, lsavic1@tvz.hr, 2022.</p>
    </footer>
</body>

</html>