<?php

$db = mysqli_connect("localhost", "root", "", "blog-php");


if ($db) {
} else {
    die("Connection Error" . mysqli_error($db));
}
