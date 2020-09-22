<!-- 
   Design by Tolib Abdurakhmonov
   E-mail: t.abdurakhmonov@mail.ru
   Tel: +998915126363
   Copyright 

-->


<?php

//start session
session_start();
$_SESSION["message"]="";
$c="";

// connection database
include_once 'db.php';

?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
    <title> Login </title>
</head>
<body>
<form action="login.php", method="POST">
<h2>LOGIN</h2>
<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
         <?php } 
         elseif (isset($_GET['success'])){ ?>
         <p class="success"><?php echo $_GET['success']; ?></p>
         <?php } ?>
    
    <input type="text", name="username", placeholder="Username or E-mail" <?php echo "value='$c'"; ?> required>
    <br>
    <input type="password", name="password", placeholder="Password" required>
    
    <br>
    <br>

     <a href="signup.php">Sign Up</a>
    <button type="submit", name="login-submit">Login</button>
   
    


</form>
</body>
</html>
