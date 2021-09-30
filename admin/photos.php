<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){header("Location: login.php");} ?>

<?php $photos = Photo::find_all(); ?>

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
                        Photos
                        <small></small>
                    </h1>
                    <p class="bg-success">
                        <?php echo $message; ?>
                    </p>
                    <div class="col-md-12">
                         <table class="table table-hover">
                              <thead>
                                  <tr>
                                      <th>Id</th>
                                      <th>photo</th>
                                      <th>Caption</th>
                                      <th>Size</th>
                                      <th>Comments</th>
                                  </tr>

                              </thead>
                              <tbody>
                             <?php foreach ($photos as $photo): ?>
                                <tr>
                                    <td><?php echo $photo->id; ?></td>
                                    <td><img class="admin-user-thumbnail" src="<?php echo $photo->image_path_placeholder(); ?>" alt="">
                                        
                                    <div class="action_links">
                                            <a href="../photo.php?id=<?php echo $photo->id; ?>">View</a>
                                            <a href="edit_photo.php?id=<?php echo $photo->id; ?>">Edit</a>
                                            <a class="delete_link" href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a>
                                        </div>
                                    </td>
                                    <td><?php echo $photo->caption; ?></td>
                                    <td><?php echo $photo->size; ?></td>
                                    <td>
                                        <a href="photo_comment.php?id=<?php echo $photo->id; ?>">
                                        <?php
                                            $comments = Comment::find_comments($photo->id);
                                            echo count($comments); 
                                         ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach;?>

                            </tbody>
                        </table> <!--End of Table-->
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
<?php include("includes/footer.php"); ?>