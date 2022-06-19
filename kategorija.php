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
    <title><?php echo $id;?></title>
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

        <section class="sport">
        <?php
            $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='".$id."' LIMIT 4";
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
                echo '<br>';
                echo '<hr>';
                echo '<br>';
        }?>
        </section>
    </main>

<footer>
    <p>Luka Savić, lsavic1@tvz.hr, 2022.</p>
</footer>
</body>

</html>