<?php

//This is a main page this program

session_start(); //it is session start

include('connection.php'); //its connecting to connection.php file

$error = ""; //its error variable its initially null

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

$sql = "SELECT * FROM register WHERE username = '{$_SESSION['username']}'";
//its query of data retrieval from MySQL database 
$result = mysqli_query($conn, $sql);
// its query stored in its variable 
$row = mysqli_fetch_assoc($result);
// after fetch values


if (isset($_POST['edit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE `register` SET `username` = '$username',`password` = '$password' WHERE username = '{$_SESSION['username']}'";
    //it is a Update a data in MySQL database query 

    $result = mysqli_query($conn, $sql);
    //after the updated values stored in its variable 

    if ($result) {
        $error = "Edited successfully. Refresh the page to update the value";
        //it is print edited successfull message 
    }
}

?>


<?php //This is html and css and javascript code ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit page</title>
</head>

<body>
    <div class="d-flex justify-content-end align-items-end p-3">
        <a href="logout.php"><input type="button" value="logout" class="btn btn-danger"></a>
    </div>
    <form action="" method="post">
        <fieldset>
            <div style="height: 100vh;" class="d-flex justify-content-center align-items-center">
                <div class="col-md-4">
                    <h3 style="text-align: center; padding-bottom: 30px; color: green;">Welcome <?php echo $row['username']; ?></h3>
                    <form action="" method="post">
                        <h4 class="mb-3">Edit page</h4>
                        <div class="mb-3">
                            <label for="username">Username</label><br>
                            <input required class="form-control" type="text" name="username" value="<?php echo $row['username']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label><br>
                            <input required class="form-control" type="password" name="password" value="<?php echo $row['password']; ?>">
                        </div>
                        <input class="btn btn-primary" value="Edit" type="submit" name="edit">
                    </form>

                    <div class="pt-3 text-success">
                        <?php echo $error; //This is error message printing place ?>
                    </div>
                </div>
        </fieldset>
    </form>
</body>

</html>



<? // ✅Finally this program is completed ✅ ?>
