<?php


  $servername="localhost";
  $username="root";
 $password="Test@1234";
 $login= $_POST["name"]; 
 $password=$_POST["pwd"];
 
 echo "hi";
 echo $login;
 echo $password;
// Creating a connection
$conn = new mysqli("localhost", "root", "Test@1234");
$db=mysqli_select_db($conn,"geekdatas");
$query="insert into user values ('$login','$password')";
$query_run=mysqli_query($conn,$query);

// Check connection
if ($conn->connect_error) {
   die("Connection failure: " 
      . $conn->connect_error);
}
 //Creating a database named geekdata
 header("Location:library.php");
$conn->close();
?>





