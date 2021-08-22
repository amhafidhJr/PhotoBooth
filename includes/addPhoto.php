<?php 
    require_once("connection.php");
    session_start();
    $userID = $_SESSION["userID"];

    try {
        if(isset($_POST['addPhoto_btn'])) {


            $date = date('Y-m-d');
           
           //imageUpload
              $folder ="../uploads/";
              $image = $_FILES['images']['name'];
              $path = $folder . $image ;
              $target_file=$folder.basename($_FILES["images"]["name"]);
              move_uploaded_file( $_FILES['images'] ['tmp_name'], $path);
    
            $postSqlQuery = "INSERT INTO photos_table VALUES (?,?,?,?)";
            $statement = $conn->prepare($postSqlQuery);
            $result = $statement->execute(array(null, $userID, $image, $date));

            if($result == true) {
                ?>
                <script>
                    alert("Photo Added Successfully");
                    window.location.href="../admins/photo.php";
                </script>
                <?php
            }

            else {
                ?>
                <script>
                    alert("Photo not Added Successfully");
                </script>
                <?php
            }
        }
    } 
    catch (PDOException $e) {
        echo 'Error: ' .$e->getMessage();
    }
