<?php include("includes/init.php"); ?>
<?php if(!$session->is_signed_in()){header("Location: login.php");} ?>
<?php

if(empty($_GET['id'])){
    header("users.php");
}

$user = User::find_by_id($_GET['id']);

if($user){
    $session->message("The user {$user->id} has been deleted successfully");
    $user->delete_photo();
    header("users.php");
}
else{
    header("users.php");
}


