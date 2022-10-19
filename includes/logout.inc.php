<?php

session_start();
session_unset();
session_destroy();

// Back to front page
header("location: ../index.php?status=LoggedOut");
