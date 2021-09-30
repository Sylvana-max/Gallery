<?php include("includes/init.php"); ?>
<?php if(!$session->is_signed_in()){header("Location: login.php");} ?>
<?php

if(empty($_GET['id'])){
    header("comments.php");
}

$comment = Comment::find_by_id($_GET['id']);

if($comment){
    $comment->delete();
    $session->message("The comment with {$comment->id} has been deleted");
    header("comments.php");
}
else{
    header("comments.php");
}


