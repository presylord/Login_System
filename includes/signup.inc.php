<?php

if (!isset($_POST["submit"])) {

    // Get Form Data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdrep = $_POST["pwdrepeat"];
    $email = $_POST["email"];

    // Instantiate SignupContr Class
    include "../classes/dbh.classes.php";
    include "../classes/signup_model.classes.php";
    include "../classes/signup_contr.classes.php";

    $newUser = new Signup_contr($uid, $pwd, $pwdrep, $email);


    // Run Error handlers and User Signup
    $newUser->signupUser();

    // Back to front page
    header("location: ../index.php?error=none");
}
