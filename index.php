<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body class="d-flex align-items-center" style="height: 50vh">
    <section class="container d-flex justify-content-center align-items-center" style="width:1000px">

        <div class="mx-5">
            <h4>SIGN UP</h4>
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="uid" class="form-control mb-3" placeholder="Username">
                <input type="password" class="form-control mb-3" name="pwd" placeholder="Password">
                <input type="password" class="form-control mb-3" name="pwdrepeat" placeholder="Repeat Password">
                <input type="email" class="form-control mb-3" name="email" placeholder="E-mail">
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </form>
        </div>
        <div class="mx-5">
            <h4>LOGIN</h4>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="uid" class="form-control mb-3" placeholder="Username">
                <input type="password" class="form-control mb-3" name="pwd" placeholder="Password">

                <button type="submit" class="btn btn-primary">Login</button>
                <?php
                if (isset($_SESSION["userid"])) {
                    echo "<a href='includes/logout.inc.php' role='button' class='btn btn-secondary'>Logout</a>";
                }
                ?>
            </form>
            <?php
            if (isset($_SESSION["userid"])) {
                echo "<p>you are logged in!</p>";
            }
            ?>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>