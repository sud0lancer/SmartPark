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
                $query=mysqli_query($conn,"SELECT * FROM loginuser WHERE userid='".$uid."' AND password='".$pass."'");
                $numrows=mysqli_num_rows($query);  
                    if($numrows!=0){  
                        while($row=mysqli_fetch_assoc($query)){  
                        $dbusername=$row['userid'];  
                        $dbpassword=$row['password'];  
                        }
                        if($uid == $dbusername && $pass == $dbpassword){  
                        session_start();  
                        $_SESSION['sess_user']=$uid;  
                      
                        /* Redirect browser */  
                        header("Location: http://localhost/dup/mainpage.html");  
                        }  
                    }
                    else {  
                    echo "Invalid username or password!";  
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

