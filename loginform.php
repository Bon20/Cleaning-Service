<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="cleaning_servicedb";

$conn=mysqli_connect($server_name,$username,$password,$database_name);

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql_query = "SELECT*FROM admin_db WHERE user_email = '".$email."' AND pass = '".$pass."' limit 1 ";
    $res = mysqli_query($conn,$sql_query);

    if(mysqli_num_rows($res)==1) {
        header("Location: http://localhost/Cleaning-Service/admin.php#"); 
    }
    else {
        echo "Incorrect";
        exit();
    }
}
?>
<html>
    <head>
        <title>
            Login Form
        </title>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="forlogin.css">
        
    </head>
<body>
<div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="username" class="form-control" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="pass" id="password" class="form-control" placeholder="Enter password" required>
                            </div>
                                <button type="submit" name ="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>