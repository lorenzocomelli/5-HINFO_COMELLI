<!DOCTYPE html>
<html>
    <head>
        <title>
            LOGIN
        </title>
        <link rel="stylesheet" href="Stile.css">
    </head>
    <body>
        <!--<p class="benvenuto"> BENVENUTO </p>-->
        <?php
         // definire le variabili e impostarle su valori vuoti
         $nameErr = $emailErr = $genderErr = $websiteErr = "";
         $name = $email = $gender = $comment = $website = "";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
               $nameErr = "Campo obbligatorio";
            }else {
               $name = test_input($_POST["name"]);
            }
            
            if (empty($_POST["email"])) {
               $emailErr = "Campo obbligatorio";
            }else {
               $email = test_input($_POST["email"]);
               
               // controllare se l'indirizzo e-mail è corretto
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Formato mail non valido"; 
               }
            }
            
            if (empty($_POST["gender"])) {
               $genderErr = "Campo obbligatorio";
            }else {
               $gender = test_input($_POST["gender"]);
            }
         }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
        ?>
                <h1><center><p style="color:cornflowerblue">BENVENUTO</p></center></h1>
        <div class="login-box">
            <h2>Login</h2>
            <form action=<?=$_SERVER['PHP_SELF']?> method="POST">
            <div class="user-box">
                    <input type="text" name="name" placeholder="Name" > <span class = "error"> <?php echo $nameErr;?></span>
                </div><br>
                <div class="user-box">
                    <input type="text" name="cognome" placeholder="Cognome"> <span class = "error"> <?php echo $nameErr;?></span>
                </div><br>
                <div class="user-box">
                    <input type="text" name="email" placeholder="Email"> <span class = "error"> <?php echo $emailErr;?></span>
                </div><br>
                <div class="user-box">
                    <input type="password" name="password" placeholder="Password"> <span class = "error"> <?php echo $nameErr;?></span>
                </div><br>
                <div class="user-box">
                    <input type="date" name="data" value="" max="2004-12-31"> <span class = "error"> <?php echo $nameErr;?></span>
                </div><br>
                    <center><input type="submit" name="submit" value="LOGIN" class="provaLogin"></center>
            </form>
        </div>
    </body>
</html>