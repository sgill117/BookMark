<?php

if(empty($_POST["name"])){
    die("Name is required");
}

if( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ){
    die("Email is not valid");

}

if( strlen($_POST["password"]) < 8 ){
    die("Password must be at least 8 characters");
}

if ($_POST["password"] !== $_POST["confirm_password"] ){
    die("Passwords do not match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name, email, password_hash)
        VALUES (?, ?, ?) ";
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql) ){
    die("SQL Error: " . $mysqli->error );
}

$stmt->bind_param("sss", $_POST["name"], $_POST["email"], $password_hash);

if ($stmt->execute() ){
    header( "Location: login.php");
    exit;
}else{
    die("error");
}

?>