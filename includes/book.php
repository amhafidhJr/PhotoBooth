<?php 
    require_once("connection.php");
    session_start();
    

    try {

        if(isset($_POST['book_btn'])) {

                    $photographer_ID = $_POST['id'];
                    $name = $_POST['fullname'];
                    $email = $_POST['email'];
                    $mobile = $_POST['phone'];
                    $date = $_POST['date'];
                    $time = $_POST['time'];
                    $address = $_POST['address'];
                    $service = $_POST['services'];
                    $status = "requested";

                    if($service == "Birthday") {
                        $price = 20000;
                    }
                    elseif ($service == "Wedding") {
                        $price = 30000;
                    }
                    elseif ($service == "Maulidi") {
                        $price = 30000;
                    }
                    elseif ($service == "Graduation") {
                        $price = 35000;
                    }
                  
            
    
                    $postSqlQuery = "INSERT INTO booking_table VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                    $statement = $conn->prepare($postSqlQuery);
                    $result = $statement->execute(array(null, $photographer_ID, $name, $email, $mobile, $date, $time, $address, $service,$price,$status));

                        if($result == true) {

                            $selectIdQuery = "SELECT * FROM booking_table";
                            $statementID = $conn->prepare($selectIdQuery);
                            $statementID->execute();
                            $result = $statementID->fetchAll();

                ?>
                <script>
                    alert("Book Request Sent");
                    window.location.href="../index.php";
                </script>
                <?php
            }

            else {
                ?>
                <script>
                    alert("Book Request was not Sent");
                </script>
                <?php
            }
            }
        } 
    catch (PDOException $e) {
        echo 'Error: ' .$e->getMessage();
    }
