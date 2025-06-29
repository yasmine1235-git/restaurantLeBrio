 <?php
	$conn = new mysqli("localhost","root","","adminpanel");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
?>