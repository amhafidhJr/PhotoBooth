
<!-- Header-->
<header id="header" class="header">

    <div class="header-menu">

        <div class="col-sm-7">
           

        <div class="col-sm-5">
            

            

        </div>
    </div>

</header><!-- /header -->
<!-- Header-->

<div class="breadcrumbs">
    
</div>

<div class="content mt-3">

    <div class="col-sm-12">
        
    </div>


    
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

        
            <div class="col-md-12">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#photo"><i class="fa fa-plus"></i>&nbsp; Add Photos </button>
</div>
            <div class="card-body">
                                       
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Booked Flight List</strong>
                    </div>
                    
                    <div class="card-body">
                        <table  id="flight-list" class="table table-bordered">
                            <thead>
                            <tr>
                          <th scope="col">#</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Date Uploaded</th>
                          <th scope="col">Action</th>
                        </tr>
                            </thead>
                            <tbody>
                            <?php 
                            require_once("../includes/connection.php");
                            
                            $userID = $_SESSION["userID"];

                            $sqlQuery = "SELECT * FROM photos_table WHERE user_ID = $userID";
                            $statement = $conn->prepare($sqlQuery);
                            $statement->execute();
                            $result = $statement->fetchAll();

                            if($result == true) {
                              foreach ($result as $photo) {
                                  $imageID = $photo[0];
                                  $image = $photo[2];
                                  $date_uploaded = $photo[3];
                              ?>
                            
                        <tr>
                          <th scope="row">1</th>
                          <td><?php echo $image; ?></td>
                          <td><?php echo $date_uploaded; ?></td>
                          <td>
                                <a href="" type="button" class="btn btn-outline-warning btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="../includes/deletePhoto.php?photoID=<?php echo $imageID; ?>" type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                          </td>
                        </tr>
                        <?php
                          }
                            }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->


</div><!-- /#right-panel -->

<!-- Right Panel -->




<!-- Modal -->
<div class="modal fade" id="photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Photo form</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form method="POST" action="../includes/addPhoto.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="my-input">Choose Photo</label>
    <input type="file" name="images" class="form-control" placeholder="">
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<input type="submit" value="Add Photo" name="addPhoto_btn" class="btn btn-danger">
</div>
</form>
</div>
</div>
</div>