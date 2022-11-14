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
        if(!isset($_POST['submit']))
        { ?>
                <h1><center><p style="color:cornflowerblue">BENVENUTO</p></center></h1>
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
                <!--<div class="provaLogin">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>-->
                    <input type="submit" name="submit" value="LOGIN" class="provaLogin">
                <!--</div>-->
            </form>
        
        <?php 
        } 
        else
        {
            $user=$_POST["username"];
            $pwd=$_POST["password"];
            //if($user!="lollo" || $pwd!="1234") 
            //echo "Benvebuto $user $pwd";

            if($user!="lollo" || $pwd!="1234") 
            {
                echo "<h5>ATTENZIONE: Username o password errate.<br>Acceaso negato!</h5>";
            } 
            else {
                echo "<h5>Benvenuto " . $user .  " nella tua area RISERVATA</h5>";
            }
        }
            ?>
        </div>
    </body>
</html>