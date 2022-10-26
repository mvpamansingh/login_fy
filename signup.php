<!DOCTYPE html>
<html>
<head>
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
<body>
<form>
<div class="formContainer">
<h1>Sign Up Form</h1>
<hr>
<label for="email"><b>Email</b></label>
<input type="text" placeholder="Enter Email" name="email" required>
<label for="password"><b>Password</b></label>
<input type="password" placeholder="Enter Password" name="password" required>
<label for="repeatPassword"><b>Repeat Password</b></label>
<input type="password" placeholder="Repeat Password" name="repeatPassword"
required>
<label>
<input type="checkbox" checked="checked" name="remember" style="marginbottom: 15px"> Remember me
</label>
<p>By creating an account you agree to our <a href="#"
style="color:dodgerblue">Terms & Privacy</a><p>
<div>
<button type="button" class="cancel">Cancel</button>
<button type="submit" class="signup">Sign Up</button>
</div>
</div>
</form>
</body>
</html>

<?php
require "DataBase.php";
$db = new DataBase();
// Given password
$password = $_POST['password'];

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
if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
    if ($db->dbConnect()) {
        if ($db->signUp("users", $_POST['fullname'], $_POST['email'], $_POST['username'], $_POST['password'])) {
            echo "Sign Up Success";
        } else echo "Sign up Failed";
    } else echo "Error: Database connection";
} else echo "All fields are required";
?>
