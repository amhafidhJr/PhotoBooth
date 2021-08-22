<?php

	session_start();
	$userID = $_SESSION["userID"];

	if(!empty($userID)) {

		require_once('menu/header.php'); 
        require_once('menu/menu.php'); 
        require_once('view/home.php');
        require_once('menu/footer.php');

	}
	else {
		?>
		<script type="text/javascript">
			// window.location.href = "index.php";
		</script>
		<?php
	}
   
?>