<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$connect = mysqli_connect($host, $username, $password, $dbname);
$message="";
$message2="";
if (isset($_POST['signup'])) {
    $fullname = $_POST['fullname'];
    $Email = strtolower($_POST['Email']);
    $password = $_POST['password'];

{
    if ($connect) 
    {
        $check_email = "SELECT Email FROM users WHERE Email = '$Email'";
        $result_check = $connect->query($check_email);

        if ($result_check->num_rows > 0) {
            $message = "Email already exists";
        }
         else
         {
            $sql = "INSERT INTO users (fullname, Email, password) VALUES ('$fullname', '$Email', '$password')";
            $result = $connect->query($sql);
            
            $message2 = "Dear $fullname,\n\nThank you for registering with CreDiTecTo. We're excited to have you on board!";
            echo '<script>
                    setTimeout(function(){
                        window.location.href = "index.php";
                    }, 1500);
                 </script>';
        } 
    } 
    
    else {
        $message=" Sign_up failed";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        nav {
            background-color: #eee;
            padding: 10px;
            text-align: center;
        }

        nav a {
            margin: 0 10px;
            text-decoration: none;
            color: #333;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .banner {
            background-color: #3498db;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .login-container {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        #messages1 {
            color: #e74c3c;
            margin-top: 10px;
        }
        #mess {
    color: #81ce0e;
    margin-top: 10px;
    text-align: center;
    font-style: italic;
}
    </style>
</head>
<body>
    <header>
        <h1>Welcome to CreDiTecTo</h1>
        <p>Explore the Digital world with us</p>
    </header>

    <div class="login-container">
        <h2>Create an Account</h2>
        <form action="" method="post" onsubmit="return validate()">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="fullname" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="Email" >

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" >

            <label for="c_password">Confirm Password:</label>
            <input type="password" id="c_password" name="c_password" >

            <button type="submit" name="signup">Sign up</button>
            <div id="messages1"><?php echo $message; ?></div>
            <div id="mess"><?php echo $message2; ?></div>
        </form>
    </div>
    <div style="text-align: center;">
        <h3>Alredy have an account?</h3>
        <button type="button" onclick="login()">Login</button>
    </div><br><br>




    <footer>
        <p>&copy; 2023 CreDiTecTo. All Rights Reserved.</p>
    </footer>

    <script>
        function login(){
       window.location.href = 'index.php';
        }
     function validate() 
{
            var Email = document.getElementById('email').value;
            var pass = document.getElementById('password').value;
            var c_pass = document.getElementById('c_password').value;

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
                } if(c_pass !== pass){
                    document.getElementById('messages1').innerHTML = 'Confirm password does not match';
                    return false;
                }


            }
    
    
}
    </script>
</body>
</html>


