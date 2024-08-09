<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user 
              WHERE id = {$_SESSION["user_id"]}";
    
    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMark</title>
    <link rel="stylesheet" href="style2.css"> 
</head>
<body>
    <div class="phpcode">
    <?php if ( isset($user)): ?>
        <h3>Welcome <?= htmlspecialchars($user["name"]) ?></h3>

        <p><a href="logout.php">Logout</a></p>
    <?php else: ?>
        <p><a href="login.php">Login</a> or <a href="signup.html">Sign up</a></p>
    <?php endif; ?>

    </div>

    <div class="input-box">
        <input type="text" id="userInput" placeholder="Book Title" required>
        <button data-modal-target="#modal" type="submit">Add</button>
    </div>

    <div id="modal" class=pop-up >
        <h3 id="popupHeader">Default Header</h3>
        <textarea placeholder="Enter your review" required></textarea>
        <button data-close-button>Finish</button>

    </div>

    <script src=script.js></script>

   

   

    
</body>
</html>
