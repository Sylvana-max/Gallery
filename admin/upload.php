<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){header("Location: login.php");} ?>

<?php
$message = "";
if(isset($_FILES['file'])){
    $user = new user();
    $user->title = $_POST['title'];
    $user->set_file($_FILES['file']);

    if($user->save()){
        $message = "user uploaded successfully";
    }else{
        $message = join("<br>", $user->errors);
    }
}
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
                    <h1 class="page-header">
                       
                        <small>Upload your pictures here</small>
                    </h1>

                    <div class="row">

                    <div class="col-md=6">
                        <?php echo $message; ?>
                    <form action="upload.php" method="post" enctype="multipart/form-data">

                        <div class="form-group col-md=6">

                            <input type="text" name="title" class="form-control">

                        </div>

                        <div class="form-group">

                            <input type="file" name="file">

                        </div>

                        <input type="submit" name="submit">
                    </form>
                    </div>
                    </div><!-- end of row -->

                    <div class="row">

                        <div class="col-lg-12">

                            <form action="upload.php" class="dropzone">

                            </form>

                        </div>

                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

