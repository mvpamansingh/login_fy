<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
body{
   font-family: 'Segoe UI', 'Tahoma', 'Verdana', 'sans-serif';
   background-image: "https://wallpaperaccess.com/full/2314983.jpg";
}

*{box-sizing: border-box}
input[type=text], input[type=password] {
   width: 100%;
   font-size: 28px;
   padding: 15px;
   margin: 5px 0 22px 0;
   display: inline-block;
   border: none;
   background: #f1f1f1;
}
label{
   font-size: 15px;
}
input[type=text]:focus, input[type=password]:focus {
   background-color: #ddd;
   outline: none;
}
hr {
   border: 1px solid #f1f1f1;
   margin-bottom: 25px;
   padding: 12px;
}
button {
   font-size: 18px;
   font-weight: bold;
   background-color: rgb(10, 119, 13);
   color: white;
   padding: 14px 20px;
   margin: 8px 0;
   border: none;
   cursor: pointer;
   padding: 20px;
   box-shadow: 4px 3px;
   border-radius: 20px;
   border: none;
   outline: none;
   width: 100%;
   opacity: 0.9;
}
button:hover {
   opacity:1;
   padding: 20px;
   box-shadow: 4px 3px;
   border-radius: 20px;
   border: none;
   outline: none;
}
.cancel {
   padding: 14px 20px;
   background-color: #ff3d2f;
}
.formContainer {
   padding: 16px;
   margin: 10px;
}
.formContainer p{
   font-size: 28px;
   margin: 15px;
}
</style>
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

// Validate password strength
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
}else{
    echo 'Strong password.';
}
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
