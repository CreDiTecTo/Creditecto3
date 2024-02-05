<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$connect = mysqli_connect($host, $username, $password, $dbname);
$message="";
$mess="";


if (isset($_POST['login'])) 
{
    $Email = strtolower($_POST['Email']);
    $password = $_POST['password'];

    $check_user = "SELECT * FROM users WHERE Email = '$Email'";
    $result_user = $connect->query($check_user);

    if ($result_user->num_rows > 0)
     {
         $check_user="SELECT * FROM users WHERE password = '$password'";
         $result_user = $connect->query($check_user);
         if ($result_user->num_rows > 0){
            $mess= "Login Success";
            echo '<script>
                    setTimeout(function(){
                        window.location.href = "home.html";
                    }, 500);
                 </script>';}
              else {
                $message="Incorrect password"; }
     } 
    else {
        $message="User not found";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CreDiTecTo</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<header style="background-color: #333;color: #fff;padding: 20px;text-align: center;margin-bottom:2cm">
        <h1>Welcome to CreDiTecTo</h1>
        <p>Explore the Digital world with us</p>
        <div style=" text-align: right;margin-right:1cm;">
    <button  onclick="cont()" style="width:3cm;height:1cm;background-color:black;margin-top: 10px;">Contact US</button>
    <button onclick="about()"  style="width:3cm;height:1cm;background-color:black;margin-top: 10px;" >About us</button>
    </div>
    </header>
    
    
      
    <div class="login">
    <div id="messages1"><?php echo $message; ?></div>
    <div id="mess"><?php echo $mess; ?></div>
        <h2>Login to CreDiTecTo</h2>

        <form action="" method="post" onsubmit="return validate()" >
            <label for="email">Email:</label>
            <input type="email" id="email" name="Email" ><br>
    
            <label for="password">Password:</label>
            <input type="password" id="password" name="password"><br>
    
            <button style="width:3cm;" type="submit" name="login">Login</button>
            <div id="messages1"></div>
        </form>
    </div>

    <div class="container">
        <h3>Don't have an account?</h3>
        <button type="button" onclick="sign()">Create a new account</button>
    </div>


    <footer style="background-color: #333;color: #fff;padding: 20px;text-align: center;margin-top:3cm;">
        <p>&copy; 2023 CreDiTecTo. All Rights Reserved.</p>
    </footer>
    <script>
        function sign() {
            window.location.href = 'signup.php';
        }
        function cont(){
        window.location.href ='cont.html';
    }
    function about(){
        window.location.href ='about-us.html';
    }

     function validate() 
{
            var Email = document.getElementById('email').value;
            var pass = document.getElementById('password').value;

            if (Email == "" && pass == "") {
                document.getElementById('messages1').innerHTML = 'Email and password cannot be blank';
                return false;
            }

            if (Email !== "" && pass == "") {
                document.getElementById('messages1').innerHTML = 'Password cannot be blank';
                return false;
            }

            if (Email == "" && pass !== "") {
                document.getElementById('messages1').innerHTML = 'Email cannot be blank';
                return false;
            }

            if (Email !== "" && pass !== "") 
            {
                var l = pass.length;
                if (l < 8) {
                    document.getElementById('messages1').innerHTML = 'Password cannot be less than 8 characters';
                    return false;
                }


            }
    
    
}
    </script>
</body>
</html>
