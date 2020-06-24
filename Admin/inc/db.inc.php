<?php

$db = mysqli_connect("localhost","root","","blog");


if($db){

} else {
    die("Connection Error". mysqli_error($db));
}