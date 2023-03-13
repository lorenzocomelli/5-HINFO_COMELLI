<?php
    session_start();
    // Definizione delle costanti per la connessione al database
    define('DB_SERVER', 'localhost');
    define('DB_NAME', 'login1_comelli');
    define('DB_USER', 'login');
    define('DB_PASSWORD', 'marco93');
    // Dichiarazione delle variabili per lo username e la password inseriti dall'utente
    $username = $password = "";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            LOGIN
        </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
        
        if(!isset($_POST['submit']))
        {
            
         ?>
                <h1><center><p style="color:cornflowerblue">ACCEDI</p></center></h1>
        <div class="login-box">
            <h2>Login</h2>
            <form action=<?=$_SERVER['PHP_SELF']?> method="POST">
                <div class="user-box">
                    <input type="text" name="username" >
                    <label>Username</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" >
                    <label>Password</label>
                </div>
                   <center> <input type="submit" name="submit" value="LOGIN" class="provaLogin"></center>
                   <br><center>"Non hai un account?"<a href="registrazione.php">Sign Up</a></center>
            </form>
        
        <?php 
        }  else{ 
            $username=$_POST['username'];
            $password=$_POST['password'];
            $_SESSION['username'] = $_POST['username'];
                
                try {
                    $pdo = new PDO("mysql:host=".DB_SERVER."; dbname=".DB_NAME, DB_USER, DB_PASSWORD); 
                    // Preparazione della query di selezione
                    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = '$username' AND pwd = '$password'");

                    // Bind dei parametri
                    /*$stmt->bindParam(':username', $username);
                    $stmt->bindParam(':pwd', $password);*/

                    // Esecuzione della query
                    $stmt->execute();

                    // Controllo se vi sono risultati
                    if ($stmt->rowCount() > 0) {
                        $_SESSION['id']=1;
                        echo "<br><center>".$username. " benvenuto. Per entrare nella tua pagina riserva cliccare --->  ";
                        echo '<a href="riservata.php">Riservata</a></center><br>';
                    } 
                    else {
                        echo '<br><center>Non hai un account?<a href="login.php">Torna al login</a></center>';
                    }

                    $pdo = null; // Chiudi la connessione al database
                } catch (PDOException $e) {
                    // Gestione dell'eccezione
                    echo "Errore di esecuzione della query: " . $e->getMessage();
                    exit;
                }
            }     
                ?>

        </div>
    </body>
</html>