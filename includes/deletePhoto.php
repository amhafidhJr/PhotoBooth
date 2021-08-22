<?php
require_once("connection.php");
session_start();
?>
<?php
if(isset($_GET['delete']))
{                                         
$query = "select * from photos_table where photo_ID = ".$_GET['photoID'];
$Statement=$conn->prepare($query);
$Statement->execute();
$row=$Statement->fetchAll(PDO::FETCH_ASSOC);
}
?>

<?php
	$query = "delete from photos_table where photo_ID =". $_GET['photoID'];
    $Statement=$conn->prepare($query);
    $Statement->execute();
    header('location:../admins/photo.php');
?>