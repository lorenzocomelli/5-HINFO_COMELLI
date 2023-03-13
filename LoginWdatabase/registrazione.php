<?php
    // Definizione delle costanti per la connessione al database
    define('DB_SERVER', 'localhost');
    define('DB_NAME', 'login1_comelli');
    define('DB_USER', 'login');
    define('DB_PASSWORD', 'marco93');
    // Dichiarazione delle variabili per lo username e la password inseriti dall'utente
    $username = $password = "";
?>

<html>
<head>
        <title>
            REGISTRAZIONE
        </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php
        if(!isset($_POST['submit']))
        {
        
         ?>
        <div class="login-box">
            <h2>Sign Up</h2>
            <form action=<?=$_SERVER['PHP_SELF']?> method="POST">
                <div class="user-box">
                    <input type="text" name="username" >
                    <label>Username</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" >
                    <label>Password</label>
                </div>
                <div class="user-box">
                    <input type="text" name="email">
                    <label>Email</label>
                </div>
                <div class="user-box">
                    <input type="text" name="telefono">
                    <label>Telefono</label>
                </div>
                   <center> <input type="submit" name="submit" value="LOGIN" class="provaLogin"></center>
            </form>
        <?php
            } else{ 

                $_SESSION['username'] = $_POST['username'];
                    
                    try {
                        $pdo = new PDO("mysql:host=".DB_SERVER."; dbname=".DB_NAME, DB_USER, DB_PASSWORD); 
                        
                        // Recupera i dati dal form
                        $username=$_POST['username'];
                        $password=$_POST['password'];
                        $email=$_POST['email'];
                        $telefono=$_POST['telefono'];
                        
                        // Esegue l'inserimento nella tabella utenti
                        $stmt = $pdo->prepare("INSERT INTO users (username, pwd, email, numero) VALUES (:username, :password, :email, :telefono)");
                        $stmt->bindParam(':username', $username);
                        $stmt->bindParam(':password', $password);
                        $stmt->bindParam(':email', $email);
                        $stmt->bindParam(':telefono', $telefono);
                        
                        $stmt->execute();

                        $pdo = null;

                        if ($username != null || $password != null || $email != null || $telefono != null) {
                            echo "<center>Registrazione avvenuta con successo"; 
                            echo '<br><a href="login.php">Login</a></center>';
                        } else {
                            echo "Errore durante la registrazione";
                        }

                        

                        }catch(PDOException $e) {
                            die("Connessione fallita: " . $e->getMessage());
                        }
                    }
                        ?>
                        
        
    </body>
</html>