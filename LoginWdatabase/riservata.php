<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riservata</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    if(isset($_SESSION['id'])) {
?>
    <center><p><h1>Benevenuto <?php echo $_SESSION['username']; ?></h1></p>
        <br>
        <br>
        <p>Benvenuto nella tua pagina riservata.</p>
    <a href="index.php">Vai alla home del sito</a><br>
    <a href="logout.php">Logout</a></center>
<?php   
    } else {
?>
    <center><p><h2>Fare prima il login</h2></p><br>

    <a href="index.php">Vai alla home del sito</a><br>
    <a href="login.php">Login</a>
    </center>
<?php
    }
?>
</body>
</html>