<!DOCTYPE html>
<html>
    <head>
        <title>
            LOGIN
        </title>
        <link rel="stylesheet" href="Stile.css">
    </head>
    <body>
        
        <?php
        
        // definire le variabili e impostarle su valori vuoti
         $nomeErr = $emailErr = $cognErr = $pwdErr = $dataErr = $addressErr = "*";
         $nome = $email = $cogn = $pwd = $address = "";
         
        function checkName(&$nome,&$nomeErr){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["nome"])) {
                   $nomeErr = "Campo obbligatorio";
                }else {
                   $nome = test_input($_POST["nome"]);

                   if (!preg_match("/^[a-zA-Z]{2,15}$/", $nome)) {
                    $nomeErr = "Nome non valido.";
                  } else {
                    $nomeErr = "Nome valido";
                  }
                }
            }
        }

        function checkSurname(&$cogn,&$cognErr){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["cognome"])) {
                   $cognErr = "Campo obbligatorio";
                }else {
                   $cogn = test_input($_POST["cognome"]);

                   if (!preg_match("/^[a-zA-Z]{2,15}$/", $cogn)) {
                    $cognErr = "Cognome non valido.";
                  } else {
                    $cognErr = "Cognome valido";
                  }
                }
            }
        }

        
        function checkEmail(&$email,&$emailErr){
        if($_SERVER["REQUEST_METHOD"] == "POST")
            if (empty($_POST["email"])) {
               $emailErr = "Campo obbligatorio";
            }else {
               $email = test_input($_POST["email"]);
               
               // controllare se l'indirizzo e-mail è corretto
               if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,6}$/", $email)) {
                    $emailErr = "Email valida";
                } else {
                    $emailErr = "Email non valida";
                }
            }
        }

        function checkPassword(&$pwd,&$pwdErr){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["password"])) {
                   $pwdErr = "Campo obbligatorio";
                }else {
                   $pwd = test_input($_POST["password"]);

                   if (!preg_match("/^[a-zA-Z0-9._-]{8,15}$/", $pwd)) {
                    $pwdErr = "Password non valida";
                  } else {
                    $pwdErr = "Password valida";
                  }
                }
            }
        }

        function checkData(&$dataErr){
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
                if (empty($_POST["data"])) {
                   $dataErr = "Campo obbligatorio";
                }else {
                   $dataErr = "";
                }
        }

        function checkAddress(&$address,&$addressErr){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty($_POST["indirizzo"])){
                    $addressErr = "Campo Obbligatorio";
                }else{
                    $address = test_input($_POST["indirizzo"]);

                    if (!preg_match("/^[a-zA-Z0-9' ]{2,100}+$/", $address)) {
                        $addressErr = "Indirzzo non valido";
                      } else {
                        $addressErr = "Indirizzo valido";
                      }
                }
            }
        }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }

         if(isset($_POST["submit"]))
         {
            checkName($nome,$nomeErr,$_POST["nome"]);
            checkSurname($cogn,$cognErr,$_POST["cognome"]);
            checkEmail($email,$emailErr,$_POST["email"]);
            checkPassword($pwd,$pwdErr,$_POST["password"]);
            checkData($dataErr,$_POST["data"]);
            checkAddress($address,$addressErr,$_POST["indirizzo"]);
         }
        ?>
                <h1><center><p style="color:cornflowerblue">BENVENUTO</p></center></h1>
        <div class="login-box">
            <h2>Login</h2>
            <form action=<?=$_SERVER['PHP_SELF']?> method="POST">
            <div class="user-box">
                    <input type="text" name="nome" placeholder="Nome" > <span class = "error"> <?php echo $nomeErr;?></span>
                </div><br>
                <div class="user-box">
                    <input type="text" name="cognome" placeholder="Cognome"> <span class = "error"> <?php echo $cognErr;?></span>
                </div><br>
                <div class="user-box">
                    <input type="text" name="email" placeholder="Email"> <span class = "error"> <?php echo $emailErr;?></span>
                </div><br>
                <div class="user-box">
                    <input type="password" name="password" placeholder="Password"> <span class = "error"> <?php echo $pwdErr;?></span>
                </div><br>
                <div class="user-box">
                    <input type="date" name="data" value="" max="2004-12-31"> <span class = "error"> <?php echo $dataErr;?></span>
                </div><br>
                <div class="user-box">
                    <input type="text" name="indirizzo" placeholder="Indirizzo"> <span class = "error"> <?php echo $addressErr;?></span>
                </div><br>
                    <center><input type="submit" name="submit" value="LOGIN" class="provaLogin"></center>
            </form>
        </div>
    </body>
</html>
