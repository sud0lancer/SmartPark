<?php
$uid = filter_input(INPUT_POST, 'uid');
$pass = filter_input(INPUT_POST, 'pass');

if (!empty($uid)){
	if(!empty($pass)){
		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "parkingsystem";
	
		//Create Connection
		$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

		if(mysqli_connect_error()){
			die('Connection Error ('. mysqli_connect_errorno() .')' . mysqli_connect_error());
		}
		else{
			$sql = " INSERT INTO loginuser (userid, password)
			values ('$uid','$pass')";
			if($conn->query($sql)){
				echo "<script type='text/javascript'>alert('Login Successful!')</script>";
				//echo "<script>window.location.assign("mainpage.html")</script>";
				$var = 1;
				if($var == 1){
					header("Location: http://localhost/dup/mainpage.html");
				}
			}
			else{
				echo "Error: ". $sql . "<br>" . $conn->error;
			}
		$conn->close();
		}


	}
	else{
		echo "UserID should not be empty!";
		die();
	}
}
else{
	echo "UserID should not be empty!";
	die();
}

?>
