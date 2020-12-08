<?php include("includes/header.php"); ?>
<?php include("includes/photo_library_modal.php"); ?>
<?php if(!$session->is_signed_in()){header("Location: login.php");} ?>

<?php

// if(empty($_GET['id'])){
//     header("users.php");
// }
// else{

    $user = User::find_by_id($_GET['id']);

    if(isset($_POST['Update'])){
  
         if($user){
            $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            $user->first_name= $_POST['first_name'];
            $user->last_name = $_POST['last_name'];

            if(empty($_FILES['user_image'])){
                $user->save();

                header("users.php");
                $session->message("The user has been updated successfully");
            }
            else{

                $user->set_file($_FILES['user_image']);
                $user->upload_photo();
                $user->save();
                $session->message("The user has been updated successfully");
                //header("edit_user.php?id={$user->id}");
                header("users.php");
            }

            
         }

     }
   // }
?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->

        <?php include("includes/top_nav.php"); ?>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

        <?php include ("includes/side_nav.php"); ?>

        <!-- /.navbar-collapse -->
    </nav>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header col-md-6 col-md-offset-3">
                        <small>User update</small>
                    </h1>

                    <div class="col-md-6 col-md-offset-3">

                        <a href="#" data-toggle="modal"data-target="#photo-modal"><img class="thumbnail img-responsive" src="<?php echo $user->image_path_placeholder(); ?>" alt=""></a>

                    </div>

                <form action="" method="post" enctype="multipart/form-data" >
                    <div class="col-md-6 col-md-offset-3">

                        <div class="form-group">
                        
                            <input type="file" name="user_image">

                        </div>


                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>">
                        </div>

                        <div class="form-group">
                            <label for="first name">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?php echo $user->first_name; ?>">
                        </div>

                        <div class="form-group">
                            <label for="last name">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="<?php echo $user->last_name; ?>">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $user->password; ?>">
                        </div>

                        <div class="form-group">
                            <a id="user-id" class="btn btn-danger" href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a>
                            <input type="submit" name="Update" class="btn btn-primary pull-right" value="Update">
                        </div>

                    </div>
                    </form>







                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>