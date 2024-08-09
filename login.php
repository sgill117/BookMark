<?php

$invalid = false;

if  ($_SERVER["REQUEST_METHOD"] === "POST"){

    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM user
                     WHERE email = '%s' ", $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

   if($user){
        if ( password_verify($_POST['password'], $user["password_hash"]) ){
            
            session_start();
            
            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];
            
            header("Location:index.php");
            exit;
        }
   }
   $invalid = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do list application</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container">
        <form method="post">
            <h1>BookMark</h1>

            <?php if($invalid): ?>
                <em>Invalid login </em>
            <?php endif; ?>

            <div class="input-box">

                <input type="text" name="email" placeholder="Email"  required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="signup.html">Register</a></p>
            </div>

        </form>
    </div>
    
</body>
</html>