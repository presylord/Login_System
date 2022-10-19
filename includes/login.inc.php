<?php

if (!isset($_POST["submit"])) {

    // Get Form Data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];


    // Instantiate LoginContr Class
    include "../classes/dbh.classes.php";
    include "../classes/login_model.classes.php";
    include "../classes/login_contr.classes.php";

    $loginUser = new Login_contr($uid, $pwd);


    // Run Error handlers and User Login
    $loginUser->loginUser();

    // Back to front page
    header("location: ../index.php?status=loginSuccessful");
}
