<?php
$username = $_POST("username");
$password = $_POST("password");
$email = $_POST("email");
if(!empty($username) || !empty($password) || !empty($email)) {
    
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "akshatha12345";
    $dbname = "drivesmart";
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if(mysqli_connect_error()){
        die("Connect error (". mysqli_connect_errno() .")". mysqli_connect_error());
    }
    else{
        $SELECT = "SELECT email From drivesmart1 Where email = ? Limit 1";
        $INSERT = "INSERT Into drivesmart1 (username, password, email) values(?, ?, ?)";
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        if ($rnum==0) {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssssii", $username, $password, $gender, $email, $phoneCode, $phone);
            $stmt->execute();
            echo "New record inserted sucessfully";
            } else {
            echo "Someone already register using this email";
            }
            $stmt->close();
            $conn->close();
    }
} else {
        echo "All field are required";
        die();
}
?>