
<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once("../includes/connection.php");
require_once("../PHPMailer/src/Exception.php");
require_once("../PHPMailer/src/PHPMailer.php");
require_once("../PHPMailer/src/SMTP.php");


//Load Composer's autoloader
// require_once("../PHPMailer/vendor/autoload.php");
// require 'C:/xampp/php/PEAR/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
 
    session_start();
    $userID = $_SESSION["userID"];

    try {
        


            $id = $_GET['bookingID'];
            $status = "accepted";
           
            $postSqlQuery = "UPDATE booking_table SET status = '$status' WHERE booking_ID = $id";
            $statement = $conn->prepare($postSqlQuery);
            $result = $statement->execute(array($status));

            if($result == true) {
                
                $sqlQuery = "SELECT * FROM booking_table WHERE booking_ID = $id";
                $statement = $conn->prepare($sqlQuery);
                $statement->execute();
                $result = $statement->fetchAll();

                if($result == true) {
                  foreach ($result as $details) {
                      $customer_name = $details[2];
                      $customer_email = $details[3];
                      $event_date = $details[5];
                      $event_time = $details[6];
                      $event_address = $details[7];
                      $event_service = $details[8];
                      $event_price = $details[9];
                  }

                  $msg = "Hello Mr/Mrs ". $customer_name ." We are happly to inform that your request for Photographer has been approved on ". $event_date ." at ". $event_time ." Place will be " .$event_address ."The charge will be " .$event_price;


                  //email
                  //Server settings
            $mail->SMTPOptions = array('ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true));
            $mail->SMTPDebug = 4;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = "sumaituniversity72@gmail.com";                     //SMTP username
            $mail->Password   = 'exam12345';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


                //Recipients
            $mail->setFrom('abdulhalimhafidh5@gmail.com');
            $mail->addAddress($customer_email);     //Add a recipient
                          //Name is optional

                          //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Photographer Approval';
                        $mail->Body    = $msg;
                        
                        if($mail->send()){
                            ?>
                            <script>
                             alert("Approved Successefully");
                            window.location.href = "../admins/booked.php"; 
                             </script> 
                         <?php
                        }
                        else {
                            echo "error: " .$mail->ErrorInfo;;
                        }
            }

            else {
                ?>
                <script>
                    alert("Booking not Accepted Successfully");
                </script>
                <?php
            }

    } }
    catch (PDOException $e) {
        echo 'Error: ' .$e->getMessage();
    }
