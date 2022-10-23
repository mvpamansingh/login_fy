<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div id="container">
            <div id="formcontainer">
                <img id="img1" src="https://images.pexels.com/photos/414645/pexels-photo-414645.jpeg?cs=srgb&dl=background-beverage-brown-414645.jpg&fm=jpg">
                <a href="#"><img id="cross" src="https://image.flaticon.com/icons/svg/148/148766.svg"></a>
                <p id="text">Login to your Account</p>
                <input id="email" type="email" type="tel" placeholder="Email / Phone">
                <input id="password" type="password" placeholder="Password">
                <input id="check" type="checkbox">
                <p id="text1">Remember Me</p>
                <a id="forget" href="#">Forget Password ?</a>
                <button id="login" type="submit">Log In</button>
                <hr id="hrline1">
                <p id="text2">or login with</p>
                <hr id="hrline2">
                <button id="facebook"><img id="facebook1" src="https://image.flaticon.com/icons/svg/174/174848.svg">Facebook</button>
                <button id="google"><img id="google1" src="https://image.flaticon.com/icons/svg/281/281764.svg">Google</button>
                <p id="text3">Not a Member?</p>
                <a id="signup" href="#">Signup Now</a>
            </div>
        </div>
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
</body>
</html>