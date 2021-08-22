<?php 

    require_once("connection.php");
    session_start();

    try {
        
        if(isset($_POST['login_btn'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $SqlQuery = "SELECT * FROM login WHERE email = '$email' AND password = '$password'";
            $statement = $conn->prepare($SqlQuery);
            $statement->execute();
            $result = $statement->fetchAll();

            if($result == true){
                foreach($result as $row){
                    $_SESSION["userID"] = $row["user_ID"];
                    $_SESSION["login_id"] = $row["login_id"];
                    $_SESSION["logged"] = TRUE;
                    ?>

                    <script>
                        window.location.href="../admins/home.php";
                    </script>
                    <?php
                }
            }
            else {
                ?>
                <script>
                    alert("Wrong email or Password");
                    window.location.href="../login.php";
                </script>
                <?php
            }
        }


    } catch (PDOException $e) {
        echo "Error: " .$e->getMessage();
    }

?>