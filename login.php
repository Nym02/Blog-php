<?php

include "inc/db.inc.php";
session_start();
ob_start();




if (isset($_POST['login'])) {
    $uemail             = mysqli_real_escape_string($db, $_POST['email']);
    $upassword          = mysqli_real_escape_string($db, $_POST['password']);

    $hashedPass         = sha1($upassword);



    //fetching this.user information from database

    $loginUserQuery = "SELECT * from subscriber WHERE sub_email = '$uemail'";
    $loginUserSql = mysqli_query($db, $loginUserQuery);



    while ($row = mysqli_fetch_array($loginUserSql)) {
        $_SESSION['id']             = $row['sub_id'];
        $_SESSION['fullnamee']       = $row['sub_name'];
        $_SESSION['email']          = $row['sub_email'];
        $_SESSION['password']       = $row['sub_password'];


        if ($uemail == $_SESSION['email'] && $hashedPass == $_SESSION['password']) {
            header("Location: index.php");
        } else if ($uemail != $_SESSION['email'] || $hashedPass != $_SESSION['password']) {
            header("Location: index.php");
        } else {
            header("Location: index.php");
        }
    }
}




ob_end_flush();
