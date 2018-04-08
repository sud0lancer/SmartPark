<?php
$name = filter_input(INPUT_POST, 'name');
$mobile = filter_input(INPUT_POST, 'mobile');
$uemail = filter_input(INPUT_POST, 'uemail');
$pass = filter_input(INPUT_POST, 'pass');

if (!empty($name)){
	if(!empty($mobile)){
		if(!empty($uemail)){
			if(!empty($pass)){
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
							$var = 16;
							$sql = "INSERT INTO user set name = '$name', mobile = '$mobile', email = '$uemail' ";
							
							if($conn->query($sql)){
								//echo "blah blah blah";
								$postId = mysqli_insert_id($conn);
								$sql2 = "INSERT INTO loginuser set userId = '$postId', password = '$pass' ";
									if($conn2->query($sql2)){
										$var = 1;
											if($var == 1){
												header("Location: http://localhost/dup/credentials.php");
											}
									}
									else{
										echo "Error: ". $sql2 . "<br>" . $conn2->error;
									}
									$conn2->close();										
							
								$var = 1;
								if($var == 1){
									header("Location: http://localhost/dup/credentials.php");
								}
							}
							else{
								echo "Error: ". $sql . "<br>" . $conn->error;
							}
						$conn->close();
						}


			}
			else{
				echo "Password should not be empty!";
				die();
			}

		}
		else{
			echo "Email should not be empty!";
			die();
		}
	}
	else{
		echo "Mobile should not be empty!";
		die();
	}
}
else{
	echo "Name should not be empty!";
	die();
}

?>
