<?php
  // Inizializza la sessione
  session_start();
  require 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<?php
    if(isset($_SESSION['logIn']) || !empty($_SESSION['logIn']) ) {
?>
    <center><p><h2>Hai già fatto il login</h2></p><br>

    <a href="index.php">Vai alla home del sito</a><br>
    <a href="reserve.php">Vai all'area riservata del sito</a></center>
<?php
    } else {
  // Variabili errore
  $usernameEr = $passwordEr = '';

  // Variabili dati
  $username = $password = '';

  $coutUs = $coutPs = '';

  if(isset($_POST['submit'])) {
    // Funzioni
    $coutUs = checkUsername($username, $usernameEr, $_POST['username']);
    $coutPs = checkPassword($password, $passwordEr, $_POST['password']);

    if($coutUs == 1 && $coutPs == 1) {
      if($_POST['username'] == 'Lollo') {
        $usernameEr = '';
        if($_POST['password'] == 'Cinese_34') {
          $passwordEr = '';
          $_SESSION['username'] = $_POST['username'];
          $_SESSION['logIn'] = 'true';
          header('Refresh:0; reserve.php');
          exit;
        } else {
          $passwordEr = "Password sbagliata.";
        }
      } else {
        $usernameEr = "Username sbagliato.";
      }
    }
  }
?>
<center><form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="username" type="testo" class="titoletto">Username</label><br>
  <input type="text" id="username" name="username" value="<?php echo $username; ?>" placeholder="Inserisci un username" class="tasto">
  <span class="errore">
    <font color="red"><?php echo $usernameEr; ?></font>
  </span><br><br>

  <label for="password" type="testo" class="titoletto">Password</label><br>
  <input type="password" id="password" name="password" value="<?php echo $password; ?>" placeholder="Inserisci la password" class="tasto">
  <span class="errore">
    <font color="red"><?php echo $passwordEr; ?></font>
  </span><br><br>

  <input type="submit" name="submit" value="Login"><br><br>

  <center><a href="index.php">Vai alla home del sito</a><br></center>
</form></center>
<?php
    }
?>
</body>
</html>