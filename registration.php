<?php
//This page is Registration form

session_start();

include('connection.php');

$error = "";
$captcha = "";

if (isset($_SESSION['username'])) {
    header('location: login.php');
}

if (isset($_POST['btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM register WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num > 0) {
        $error = "Username already exist";
    } else {
        $sql = "INSERT INTO register (username, password) VALUES ('$username', '$password')";
        mysqli_query($conn, $sql);
        header('location: login.php');
    }
}


?>

<!Doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Sign Up</title>
</head>

<body>
    <div style="height: 100vh;" class="d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <form action="" method="post">
                <h4 class="mb-3">Sign Up</h4>
                <div class="mb-3">
                    <input required class="form-control" type="text" name="username" placeholder="User Name">
                </div>
                <div class="mb-3">
                    <input required class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div>
                    <p>you have already a account <a href="login.php">Login page</a></p>
                </div>
                <div class="g-recaptcha" data-sitekey="6LdPODUpAAAAAA_9ZH_UGGE182Si9ezQv-Y6i5s5"></div>
                <div class="pt-3">
                <input class="btn btn-primary" value="Sign Up" type="submit" name="btn" id="btn">
                </div>
            </form>

            <div class="text-danger pt-3">
                <?php echo $error; ?>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    $(document).on('click', '#btn', function() {
        var response = grecaptcha.getResponse();
        if (response.length == 0) {
        alert("Please verify you are not a robot");
            return false;
        }
    });
</script>
