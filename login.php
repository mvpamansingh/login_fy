<?php
require "DataBase.php";
$db = new DataBase();
$username = $_POST["username"];
$password  = $_POST["password"];
if (isset($username) && isset($password)) {
    if ($db->dbConnect()) {
        if ($db->logIn("users", $username, $password)) {
            echo "Login Success";
        } else echo "Username or Password wrong";
    } else echo "Error: Database connection";
} else echo "All fields are required";
?>