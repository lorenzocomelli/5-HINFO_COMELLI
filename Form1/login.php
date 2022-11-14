<html>
<head>
    <title>
        LOGIN
    </title>
</head>
<body>
<?php
$user=$_POST["username"];
$pwd=$_POST["password"];
//if($user!="lollo" || $pwd!="1234") 
//echo "Benvebuto $user $pwd";

if($user!="lollo" || $pwd!="1234") 
{
    echo "ATTENZIONE: Username o password errate.<br>Acceaso negato!";
} 
else {
    echo "Benvenuto " . $user .  " nella tua area RISERVATA";
}
?>
</body>
</html>

