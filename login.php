<?php

//This page is login page using php language 

session_start(); //This is a session start

include('connection.php'); //This including in connection.php this file is means connect to mysql database 

$error = ""; // error message initially null 

if (isset($_SESSION['username'])) {
    header('location: index.php');
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM register WHERE username = '$username' and password = '$password'";
    //This is query to retrieve datas in mysql database 
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    if ($num > 0) {
        $_SESSION['username'] = $row['username']; //👇👇👇👇
        $_SESSION['password'] = $row['password']; //This is a created in session variables 
        header('location: index.php'); //after redirect index.php file
    } else {
        $error = "Username and password doesn't match"; //This is a error message create
    }
}

?>

    <?php //This is html and css and javascript codes ?>

<!Doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Login</title>
</head>

<body>

    <div style="height: 100vh;" class="d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <form action="" method="post">
                <h4 class="mb-3">Login</h4>
                <div class="mb-3">
                    <input required class="form-control" type="text" name="username" placeholder="User Name">
                </div>
                <div class="mb-3">
                    <input required class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div>
                    <p>get new account <a href="registration.php">Sign Up</a></p>
                </div>
                <div class="g-recaptcha" data-sitekey="6LdPODUpAAAAAA_9ZH_UGGE182Si9ezQv-Y6i5s5"></div>
                <div class="pt-3">
                <input class="btn btn-primary" value="Login" type="submit" name="login" id="login">
                </div>
            </form>

            <div class="pt-3 text-danger">
                <?php echo $error; //This is a error printing place ?> 
            </div>
        </div>
</body>

</html>

<script>
    $(document).on('click', '#login', function() {
        var response = grecaptcha.getResponse();
        if (response.length == 0) {
        alert("Please verify you are not a robot");
            return false;
        }
    });
    
</script>



<?php //✅login.php file is completed ✅ ?>
