<?php include("includes/init.php"); ?>
<?php if(!$session->is_signed_in()){header("Location: login.php");} ?>
<?php

if(empty($_GET['id'])){
    header("photos.php");
}

$photo = Photo::find_by_id($_GET['id']);

if($photo){
    $photo->delete_photo();
    $session->message("The {$photo->filename} has been deleted");
    header("photos.php");
}
else{
    header("photos.php");
}


