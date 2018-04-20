<?php

session_start();
$uid = $_SESSION['sess_user'];

//$uid = filter_input(INPUT_POST, 'uid');
$amount = filter_input(INPUT_POST, 'amount');

if (!empty($uid)){
//	if (!empty($mobile)){
		if(!empty($amount)){
			$host = "localhost";
			$dbusername = "root";
			$dbpassword = "";
			$dbname = "parkingsystem";
			
			//Create Connection
			$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
			$conn2 = new mysqli ($host, $dbusername, $dbpassword, $dbname);

			if(mysqli_connect_error()){
				die('Connection Error ('. mysqli_connect_errorno() .')' . mysqli_connect_error());
			}
			else{
				echo "blah blha";
					$success = "y";
					$type = "creditCard";
					$sql2 = "INSERT into payment set userId = '$uid', amount = '$amount', paymentSuccess = '$success',  type = '$type'";
					if($conn->query($sql2)){
						header("Location: http://localhost/dup/paymentview.php");
					}
			$conn->close();	
					
			}
			
		}
		else{
			echo "Amount should not be empty!";
			die();
		}
//	}
//	else{
//		echo "Mobile should not be empty!";
//		die();
//	}
}
else{
	echo $uid;
	echo "UserID should not be empty!";
	die();
}





?>
