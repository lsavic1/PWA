<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="stil.css" />
    <title>administracija</title>
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
        session_start();
        include 'connect.php';
        error_reporting(E_ERROR | E_PARSE);
        $password = $_POST['pass'];
        $_SESSION['login']=false;
        $query="SELECT * FROM korisnik WHERE korisnicko_ime='".$_POST['username']."'";
        if(isset($_POST['submit'])){
            $result = mysqli_query($dbc, $query) or die('Error querying databese.');
            while($row = mysqli_fetch_array($result)){
                if($row['lozinka']==password_verify($password,$row['lozinka'])){
                    $_SESSION['login']=true;
                }
            }
        }
        if($_SESSION['login']){
            echo '<script>window.location.href = "administracija.php";</script>';
        }else{
        ?>
        <form method="POST">
            <label class="center">Korisničko ime</label>
            <br>
            <input class="center" type="text" name="username">
            <br>
            <label class="center">Lozinka</label>
            <br>
            <input class="center" type="password" name="pass">
            <br>
            <input class="center" type="submit" name="submit" value="Pošalji">
        </form>
        <br><br>
        <a class="center" href="registracija.php">REGISTRACIJA</a>
        
        <?php
        }
        ?>
    </main>

    

<footer>
    <p>Luka Savić, lsavic1@tvz.hr, 2022.</p>
</footer>
</body>

</html>