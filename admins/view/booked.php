
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
            
            <div class="card-body">
                                       
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Booked List</strong>
                    </div>
                    
                    <div class="card-body">
                        <table  id="flight-list" class="table table-bordered">
                            <thead>
                            <tr>
                          <th scope="col">#</th>
                          <th scope="col">Client Name</th>
                          <th scope="col">Mobile Number</th>
                          <th scope="col">Address</th>
                          <th scope="col">Date</th>
                          <th scope="col">Time</th>
                          <th scope="col">Price</th>
                          <th scope="col">Services</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>

                        </tr>
                            </thead>
                            <tbody>
                            <?php 
                            require_once("../includes/connection.php");
                            
                            $userID = $_SESSION["userID"];

                            $sqlQuery = "SELECT * FROM booking_table WHERE photographer_id = $userID";
                            $statement = $conn->prepare($sqlQuery);
                            $statement->execute();
                            $result = $statement->fetchAll();

                            if($result == true) {
                              
                              
                              foreach ($result as $photo) {
                                  $booking_ID = $photo["booking_ID"];
                                  $date = $photo["date"];
                                  $address = $photo["address"];
                                  $price = $photo["price"];
                                  $time = $photo["time"];
                                  $service = $photo["service"];
                                  $name = $photo['customer_fullname'];
                                  $mobile = $photo['phone'];
                                  $status = $photo['status'];
                              ?>
                        <tr>
                          <th scope="row">1</th>
                          <td><?php echo $name; ?></td>
                          <td><?php echo $mobile; ?></td>
                          <td><?php echo $address; ?></td>
                          <td><?php echo $date; ?></td>
                          <td><?php echo $time; ?></td>
                          <td><?php echo $price; ?></td>
                          <td><?php echo $service; ?></td>
                          <td><?php echo $status; ?></td>
                          <td>
                                <a href="../includes/acceptBook.php?bookingID=<?php echo $booking_ID; ?>" type="button" class="btn btn-outline-warning btn-sm"><i class="fa fa-check" aria-hidden="true"></i></a>
                                <a href="../includes/denyBook.php?bookingID=<?php echo $booking_ID; ?>" type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></a>
                         </td>
                        </tr>
                      <?php }} ?>
      
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


