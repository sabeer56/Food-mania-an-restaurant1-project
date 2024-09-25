<?php

$db_server="localhost";
$db_user="root";
$db_pass="";
$db_port="3307";
$db_name="foodapi";
$conn="";

try{
    $conn=mysqli_connect($db_server,$db_user,$db_pass,$db_name,$db_port);
}
catch(mysqli_sql_exception){
  
}
   
?>
<?php

      if(isset($_POST['submit'])){
        $password = $_POST['password'];
        $username=filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $email=filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
        $hash=password_hash($password,PASSWORD_DEFAULT);
        if(empty($password) || strlen($password) < 8){
         echo "Invalid password";
        }
        elseif(empty($username)){
            echo "enter your username";
        }
        elseif(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Invalid email";
        }
        else{
            $sql="INSERT INTO user (UserName,email,password1)Values('$username','$email','$hash')";
   
try {
    mysqli_query($conn,$sql);
} catch (mysqli_sql_exception) {
   
}
finally{
    mysqli_close($conn);
}

// Perform actions with the received data, such as database insertion or validation

// Return a response (e.g., JSON)
$response = ['status' => 'success', 'message' => 'Data received successfully'];
echo json_encode($response);
        }

      }
?>