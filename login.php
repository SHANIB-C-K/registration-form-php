<?php

session_start();

include('connection.php');

$error = "";

if (isset($_SESSION['username'])) {
    header('location: index.php');
}

if (isset($_POST['btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM register WHERE username = '$username' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    if ($num > 0) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        header('location: index.php');
    } else {
        $error = "Username and password doesn't match";
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Task Manager | Login</title>
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
                <input class="btn btn-primary" value="Login" type="submit" name="btn">
            </form>

            <div class="pt-3 text-danger">
                <?php echo $error; ?>
            </div>
        </div>
</body>

</html>