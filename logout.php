<?php

    session_start();
    unset($_SESSION['un']);
    unset($_SESSION['ln']);
    header("location:index.php");

?>