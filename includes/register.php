<?php 
    require_once("connection.php");

    try {
        
        if(isset($_POST['register'])) {

            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $desc = $_POST['desc'];


            //imageUpload
              $folder ="../uploads/profile/";
              $image = $_FILES['image']['name'];
              $path = $folder . $image ;
              $target_file=$folder.basename($_FILES["image"]["name"]);
              move_uploaded_file( $_FILES['image'] ['tmp_name'], $path);



 $selectIdQuery = "SELECT * FROM photographer_table where email = '$email'";
                            $statementID = $conn->prepare($selectIdQuery);
                            $statementID->execute();
                            $result = $statementID->fetchAll();

                            if($result == true) {
                              ?>
                              <script>
                                            alert("user already exist, Please Choose another email");
                                           window.location.href = "../signu-up.php";
                                        </script>
                                <?php
                            }
                            else {
                              $SqlQuery = "INSERT INTO photographer_table VALUES (?,?,?,?,?,?)";
                     $statement = $conn->prepare($SqlQuery);
                     $result = $statement->execute(array(null, $fullname, $email, $phone, $desc, $image));

                     if($result == true) {
                            $selectIdQuery = "SELECT * FROM photographer_table";
                            $statementID = $conn->prepare($selectIdQuery);
                            $statementID->execute();
                            $result = $statementID->fetchAll();

                            if($result == true) {
                                foreach ($result as $row) {
                                    $user_id = $row[0];
                                }

                                  $sqlLoginInsert = "INSERT INTO login VALUES (?,?,?,?)";
                                  $statementLogin = $conn->prepare($sqlLoginInsert);
                                  $resultLogin = $statementLogin->execute(array(null, $user_id, $email, $password));

                                    if($resultLogin == true) {
                                        ?>
                                        <script>
                                            alert("Registered Successefully");
                                           window.location.href = "../login.php";
                                        </script>
                                        <?php
                                    }
                            }
                    }
                            }
}
                     


    } catch (PDOException $e) {
        echo "Error: " .$e->getMessage();
    }
?>