<!-- 
   Design by Tolib Abdurakhmonov
   E-mail: t.abdurakhmonov@mail.ru
   Tel: +998915126363
   Copyright 

-->



<?php

$a="";
$b="";

include_once 'db.php';



if (isset($_POST['signup-submit'])){
    $uid = $_POST['uid'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwd1 = $_POST['pwd1'];
    $a = $_POST['uid'];
    $b = $_POST['email'];
    

    if (empty($uid) || empty($email) || empty($pwd) || empty($pwd1)) {
        header("Location: signup.php?error=All field are required");
        exit();
        }
        elseif (empty($uid)) {
            header("Location: signup.php?error=Enter username!");
            exit();
        }
        elseif (empty($email)) {
            header("Location: signup.php?error=Enter e-mail!");
            exit();
        }
        elseif (empty($pwd)) {
            header("Location: signup.php?error=Enter password!");
            exit();
        }
        elseif (empty($pwd1)) {
            header("Location: signup.php?error=Confirm yor password!");
            exit();
        }
         elseif(!preg_match("/^[a-zA-Z0-9]*$/",$uid)) {
            header("Location: signup.php?error=Username should consist of a-z, A-Z, numbers and symbols");
            exit();
        }
        elseif (strlen($pwd) < 6 && strlen($pwd1) < 6) {
            header("Location: signup.php?error=Password should be 6 characters at least!");
            exit();
        }
        elseif($pwd !== $pwd1){
            header("Location: signup.php?error=Password in not confirmed!");
            exit();
        }
        else {
            $sql_u = "SELECT * FROM users WHERE user_uid='$uid'";
  	        $sql_e = "SELECT * FROM users WHERE user_email='$email'";
  	        $res_u = mysqli_query($conn, $sql_u);
  	        $res_e = mysqli_query($conn, $sql_e);

  	        if (mysqli_num_rows($res_u) > 0 && mysqli_num_rows($res_e) > 0) {
                header("Location: signup.php?error=These e-mail and username has already taken!");
                exit(); 	
            }
            elseif (mysqli_num_rows($res_u) > 0) {
                header("Location: signup.php?error=This username has already taken!");
                exit();
            }
            elseif(mysqli_num_rows($res_e) > 0){
                header("Location: signup.php?error=This e-mail is already exist!");
                exit();
            }
            else {
                $sql = "INSERT INTO users (user_email, user_uid, user_pwd) VALUES ('$email', '$uid', '$pwd');";
                mysqli_query($conn, $sql);
                header("Location: index.php?success=Registered successfully! You can log into your account.");
  	        }
          
        }
           
        
    }



?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
    <title> Sign Up </title>
</head>
<body>
<form action="signup.php", method="POST">
<h2>SIGN UP</h2>
<?php if (isset($_GET['error'])) { ?>
             <p class="error"><?php echo $_GET['error']
            ?></p>
         <?php } 
         elseif (isset($_GET['success'])){ ?>
         <p class="success"><?php echo $_GET['success']; ?></p>
         <?php } ?>
    <input type="email", name="email", placeholder="E-mail" <?php echo "value='$a'"; ?> required>
    
    <input type="text", name="uid", placeholder="Username" <?php echo "value='$b'"; ?> required>
    
    <input type="password", name="pwd", placeholder="Password" required>
    
    <input type="password", name="pwd1", placeholder="Confirm password" required>
    <br>
    <br>

     
    <button type="submit", name="signup-submit">Sign Up</button>
   
    


</form>
</body>
</html>










