<?php
include "inc/db.inc.php";
session_start();
ob_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $replyID = $_POST['replyID'];
    $postID = $_POST['postID'];
    $fullname = $_SESSION['fullnamee'];

    $replyBody = mysqli_real_escape_string($db, $_POST['reply']);

    $sql = "INSERT INTO comments(reply_id, fullname, cmnt_description,    post_id,    cmnt_status    ,cmnt_date    ) VALUES('$replyID','$fullname','$replyBody','$postID','1', now())";

    $fireSql = mysqli_query($db, $sql);

    if ($fireSql) {
        header("Location: single.php?post=$postID&reply=$replyID");
    } else {
        header("Location: single.php?post=$postID&msg=replyFailed");
    }
}

ob_end_flush();
